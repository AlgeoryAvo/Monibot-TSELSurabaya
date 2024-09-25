<?php

namespace App\Http\Livewire\Backend;

use App\Models\Product;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        $data = [
            "setting" => Setting::get(),
            'produk'    => Product::get(),
            "outlet" => User::where('level','=','Outlet')->get(),

        ];
        return view('livewire.backend.dashboard', $data)->extends('layouts.backend.main', $data)->section('content');
    }

    public function logout()
    {
        Auth::logout();
        Request()->session()->invalidate();
        Request()->session()->regenerateToken();
        return redirect('/');
    }
}
