<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Transactions;

class AdminController extends Controller
{
    public function index()
    {
        $customer = User::count();
        $revenue = Transactions::sum('total_price');
        $transactions = Transactions::count();
        return view('pages.admin.dashboard', [
            'customer' => $customer,
            'revenue' => $revenue,
            'transactions' => $transactions
        ]);
    }
}
