<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\SubjetcsController;
use App\Http\Controllers\MaterialsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuthLoginController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\TopicsController;
use App\Http\Controllers\AchivementsController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CourseWrapperController;
use App\Livewire\DynamicTopcis;
use App\Livewire\SearchCategory;
use App\Livewire\SearchCourses;
use App\Livewire\SearchSubjects;
use App\Livewire\SearchMaterials;
use App\Livewire\SearchTopics;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/language-switch', [LanguageController::class, 'languageSwitch'])->name('language-switch');

Route::get('/games', function () {
    return view('games');
});

Route::get('/about-us', function () {
    return view('about-us');
});

Route::post('/login', [AuthLoginController::class, 'login'])->name('login');

Route::get('/formula-numbers', function () {
    $game = "fn";
    return view('games.game-manager', compact('game'));
})->name('formula.numbers');

Route::get('/geometry-pals', function () {
    $game = "gp";
    return view('games.game-manager', compact('game'));
})->name('geometry.pals');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/acheivements', [AchivementsController::class, 'index'])->name('acheivements');

    Route::prefix('program')->group(function () {
        Route::get('/', [ProgramController::class, 'index'])->name('program');
        Route::get('/create', [ProgramController::class, 'create'])->name('program.create');
        Route::post('/', [ProgramController::class, 'store'])->name('program.store');
        Route::get('/{id}/edit', [ProgramController::class, 'edit'])->name('program.edit');
        Route::put('/{id}', [ProgramController::class, 'update'])->name('program.update');
        Route::delete('/{id}', [ProgramController::class, 'destroy'])->name('program.destroy');
    });

    Route::prefix('subject')->group(function () {
        Route::get('/', [SubjetcsController::class, 'index'])->name('subject');
        Route::get('/create', [SubjetcsController::class, 'create'])->name('subject.create');
        Route::post('/', [SubjetcsController::class, 'store'])->name('subject.store');
        Route::get('/{id}/edit', [SubjetcsController::class, 'edit'])->name('subject.edit');
        Route::put('/{id}', [SubjetcsController::class, 'update'])->name('subject.update');
        Route::delete('/{id}', [SubjetcsController::class, 'destroy'])->name('subject.destroy');
        Route::get('/search/subjects', SearchSubjects::class);
    });

    Route::prefix('material')->group(function () {
        Route::get('/', [MaterialsController::class, 'index'])->name('material');
        Route::get('/create', [MaterialsController::class, 'create'])->name('material.create');
        Route::post('/', [MaterialsController::class, 'store'])->name('material.store');
        Route::get('/{id}/edit', [MaterialsController::class, 'edit'])->name('material.edit');
        Route::put('/{id}', [MaterialsController::class, 'update'])->name('material.update');
        Route::delete('/{id}', [MaterialsController::class, 'destroy'])->name('material.destroy');
        Route::get('/search/materials', SearchMaterials::class);
    });

    Route::prefix('users')->group(function () {
        Route::get('/', function () {
            return view('backoffice.users.users');
        })->name('users');
        Route::delete('/{id}', [UserController::class, 'deleteUser'])->name('user.destroy');
        Route::put('/block/{id}', [UserController::class, 'blockUser'])->name('user.block');
        Route::put('/unblock/{id}', [UserController::class, 'unblockUser'])->name('user.unblock');
        Route::put('/accept/{id}', [UserController::class, 'acceptUser'])->name('user.accept');
    });
    
    Route::prefix('followers')->group(function () {
        Route::get('/', function () {
            return view('backoffice.users.users');
        })->name('followers');
        Route::put('/accept/{id}', [UserController::class, 'acceptFollowUser'])->name('follower.accept');
        Route::put('/decline/{id}', [UserController::class, 'declineFollowUser'])->name('follower.decline');
        Route::put('/send-request/{id}', [UserController::class, 'sendRequestFollowUser'])->name('follower.send.request');
        Route::put('/cancel-request/{id}', [UserController::class, 'cancelRequestFollowUser'])->name('follower.cancel.request');
   
    });

    Route::prefix('learning')->group(function () {
        Route::get('/{id}/learn', [CoursesController::class, 'learn'])->name('course.learn');

        Route::get('/content/{id}', [CoursesController::class, 'index'])->name('learning.content');
        Route::get('/content/{id}/create', [CoursesController::class, 'create'])->name('content.create');
        Route::post('/content/{id}', [CoursesController::class, 'store'])->name('content.store');
        Route::get('/content/{id}/edit/{wid}', [CoursesController::class, 'edit'])->name('content.edit');
        Route::put('/content/{id}', [CoursesController::class, 'update'])->name('content.update');
        Route::delete('/content/{id}', [CoursesController::class, 'destroy'])->name('content.destroy');
        Route::get('/search/content', SearchCourses::class);

        Route::get('/', [CourseWrapperController::class, 'index'])->name('learning');
        Route::get('/create', [CourseWrapperController::class, 'create'])->name('course.create');
        Route::post('/', [CourseWrapperController::class, 'store'])->name('course.store');
        Route::get('/{id}/edit', [CourseWrapperController::class, 'edit'])->name('course.edit');
        Route::put('/{id}', [CourseWrapperController::class, 'update'])->name('course.update');
        Route::delete('/{id}', [CourseWrapperController::class, 'destroy'])->name('course.destroy');
        // Route::get('/search/courses', SearchMainCourses::class);
    });

    Route::prefix('topic')->group(function () {
        Route::get('/', [TopicsController::class, 'index'])->name('topic');
        Route::get('/create', [TopicsController::class, 'create'])->name('topic.create');
        Route::post('/', [TopicsController::class, 'store'])->name('topic.store');
        Route::get('/{id}/edit', [TopicsController::class, 'edit'])->name('topic.edit');
        Route::put('/{id}', [TopicsController::class, 'update'])->name('topic.update');
        Route::delete('/{id}', [TopicsController::class, 'destroy'])->name('topic.destroy');
        Route::get('/search/topic', SearchTopics::class);
        Route::get('/add/topic', DynamicTopcis::class);
    });

    Route::prefix('category')->group(function () {
        Route::get('/', [CategoryController::class, 'index'])->name('category');
        Route::get('/create', [CategoryController::class, 'create'])->name('category.create');
        Route::post('/', [CategoryController::class, 'store'])->name('category.store');
        Route::get('/{id}/edit', [CategoryController::class, 'edit'])->name('category.edit');
        Route::put('/{id}', [CategoryController::class, 'update'])->name('category.update');
        Route::delete('/{id}', [CategoryController::class, 'destroy'])->name('category.destroy');
        Route::get('/search/category', SearchCategory::class);
    });
});
