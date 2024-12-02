<?php

namespace App\Http\Controllers;

use Inertia\Inertia;

class DashBoardController extends Controller{
    public function index()
    {
        return Inertia::render('Dashboard/Index', [
            'stats' => $this->getStats()
        ]);
    }

    private function getStats()
    {
        return [
            'totalRevenue' => '$45,231.89',
            'subscriptions' => '+2350',
            'sales' => '+12,234',
            'activeUsers' => '+573',
        ];
    }
}
