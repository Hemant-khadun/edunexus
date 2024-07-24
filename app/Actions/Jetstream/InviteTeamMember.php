<?php

namespace App\Actions\Jetstream;

use App\Models\Team;
use App\Models\User;
use Closure;
use Illuminate\Database\Query\Builder;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Laravel\Jetstream\Contracts\InvitesTeamMembers;
use Laravel\Jetstream\Events\InvitingTeamMember;
use Laravel\Jetstream\Jetstream;
use Laravel\Jetstream\Mail\TeamInvitation;
use Laravel\Jetstream\Rules\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class InviteTeamMember implements InvitesTeamMembers
{
    /**
     * Invite a new team member to the given team.
     */
    public function invite(User $user, Team $team, string $email, string $fullname = '', string $role = null): void
    {
        Gate::forUser($user)->authorize('addTeamMember', $team);

        $this->validate($team, $email, $fullname, $role);

        if(empty($role)){
            $role = "Student";
        }
        
        $randomPassword = Str::random(10);

        User::create([
            'name' => $fullname,
            'email' => $email,
            'active' => 1,
            'password' => Hash::make($randomPassword),
        ]);

        InvitingTeamMember::dispatch($team, $email, $role);

        $invitation = $team->teamInvitations()->create([
            'email' => $email,
            'role' => $role,
        ]);
        
        $invitation->team = (object) [];
        $invitation->team->name = $user->personalTeam()->name;

        $invitation->username = $email;
        $invitation->password = $randomPassword;

        Mail::to($email)->send(new TeamInvitation($invitation));
    }

    /**
     * Validate the invite member operation.
     */
    protected function validate(Team $team, string $email,String $fullname ,?string $role): void
    {
        Validator::make([
            'email' => $email,
            'fullname' => $fullname,
            // 'role' => $role,
        ], $this->rules($team), [
            'email.unique' => __('This user has already been invited to the team.'),
        ])->after(
            $this->ensureUserIsNotAlreadyOnTeam($team, $email)
        )->validateWithBag('addTeamMember');
    }

    /**
     * Get the validation rules for inviting a team member.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    protected function rules(Team $team): array
    {
        return array_filter([
            'email' => [
                'required', 'email',
                Rule::unique(Jetstream::teamInvitationModel())->where(function (Builder $query) use ($team) {
                    $query->where('team_id', $team->id);
                }),
            ],
            'fullname' => [
                'required','string'
            ],
            // 'role' => Jetstream::hasRoles()
            //                 ? ['required', 'string', new Role]
            //                 : null,
        ]);
    }

    /**
     * Ensure that the user is not already on the team.
     */
    protected function ensureUserIsNotAlreadyOnTeam(Team $team, string $email): Closure
    {
        return function ($validator) use ($team, $email) {
            $validator->errors()->addIf(
                $team->hasUserWithEmail($email),
                'email',
                __('This user already belongs to the team.')
            );
        };
    }
}
