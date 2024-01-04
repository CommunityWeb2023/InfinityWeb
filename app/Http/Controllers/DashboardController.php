<?php

namespace App\Http\Controllers;

use Flyff\Modules\User\Services\UserService;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function __construct(
        private readonly UserService $userService,
    ){}

    public function index()
    {
        return Inertia::render('Dashboard/Index', [
            'users_today' => $this->userService->getLastUsersToday(),
            'users_yesterday' => $this->userService->getLastUserYesterday(),
            'users_avg' => $this->userService->getAvgBetweenUsersTodayAndYesterday(),
        ]);
    }


}
