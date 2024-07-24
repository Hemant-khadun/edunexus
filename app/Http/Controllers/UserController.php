<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Jetstream\Contracts\DeletesUsers;
use Illuminate\Contracts\Auth\StatefulGuard;
use App\Models\User;
use App\Models\CourseWrapper;
use App\Models\Followers;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function deleteUser(Request $request, DeletesUsers $deleter, StatefulGuard $auth)
    {
        // Validate request, authorize user, etc.
        $user = User::findOrFail($request->id);
        $deleter->delete($user);

        return redirect()->route('users')->with('success', 'User deleted successfully!');
        // Redirect or return a response as needed
    }

    // Block a user
    public function blockUser(Int $id)
    {
        try {
            $user = User::findOrFail($id);
            // Set the user's status to 0 (blocked)
            $user->status = 0;
            $user->save();

            // Return a success response or redirect back
            return redirect()->route('users')->with('success', 'User blocked successfully!');

        } catch (\Exception $e) {
            // Handle any exceptions (e.g., user not found)
            return redirect()->route('users')->with('failed', 'Error blocking user');

        }
    }

    // Unblock a user
    public function unblockUser(Int $id)
    {
        try {
            $user = User::findOrFail($id);
            // Set the user's status to 1 (unblocked)
            $user->status = 1;
            $user->save();

            // Return a success response or redirect back
            return redirect()->route('users')->with('success', 'User unblocked successfully!');

        } catch (\Exception $e) {
            // Handle any exceptions (e.g., user not found)
            return redirect()->route('users')->with('failed', 'Error unblocking user');

        }
    }

    // Block a user
    public function acceptUser(Int $id)
    {
        try {
            $user = User::findOrFail($id);
            // Set the user's status to 0 (blocked)
            $user->active = 1;
            $user->save();

            // Return a success response or redirect back
            return redirect()->route('users')->with('success', 'User accepted successfully!');

        } catch (\Exception $e) {
            // Handle any exceptions (e.g., user not found)
            return redirect()->route('users')->with('failed', 'Error accepting the user');

        }
    }

    public function sendRequestFollowUser(Int $id)
    {

        $currentUserId = auth()->user()->id; // Get the currently authenticated user
        $course = CourseWrapper::findOrFail($id); // Find the follower by ID

        $follower = new Followers();
        $follower->follower_id = $currentUserId;
        $follower->course_id = $id;
        $follower->status = 0;
        $follower->save();

        return redirect()->route('learning')->with('success', 'A follow request has been sent to ' . $course->title);
    }

    public function declineFollowUser(Int $courseId)
    {
      
        $follower = Followers::findOrFail($courseId); // Find the follower by ID

        $course = CourseWrapper::where('id', $follower->course_id)->get();

        $follower->delete();

        // Optionally, you can redirect or return a response
        return redirect()->route('followers')->with('failed', 'You removed access for ' . $course[0]->title);
    }

    public function acceptFollowUser(Int $followerId) {
        
        $follower = Followers::findOrFail($followerId); // Find the follower by ID
        $follower->status = 1;
        $follower->save();

        return redirect()->route('followers')->with('success', $follower->user->name. ' can now access '. $follower->course->title);
    }

    public function cancelRequestFollowUser(Int $courseId) {

        $currentUserId = auth()->user()->id; // Get the currently authenticated user
        $course = CourseWrapper::findOrFail($courseId); // Find the follower by ID

        $follower = Followers::where('course_id', $courseId)->where('follower_id', $currentUserId);
        $follower->delete();
        
        // Optionally, you can redirect or return a response
        return redirect()->route('learning')->with('failed', 'You cancelled your enrollment for ' . $course->title);
    }
}
