<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardSettingController extends Controller
{
    public function store()
    {
        $user = Auth::user();
        $categories = Categories::all();

        return view('pages.dashboard-setting', [
            'user' => $user,
            'categories' => $categories,
        ]);
    }

    public function account()
    {
        $user = Auth::user();

        return view('pages.dashboard-account', [
            'user' => $user,
        ]);
    }

    public function update(Request $request, $redirect)
    {
        $data = $request->all();
        $item = Auth::user();

        $item->update($data);

        return redirect()->route($redirect);
    }
}