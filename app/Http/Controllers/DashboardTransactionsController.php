<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardTransactionsController extends Controller
{
    public function transactions()
    {
        return view('pages.dashboard-transactions');
    }

    public function details()
    {
        return view('pages.dashboard-transactions-details');
    }
}
