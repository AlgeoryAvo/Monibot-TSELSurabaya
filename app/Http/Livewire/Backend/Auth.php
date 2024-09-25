<?php

namespace App\Http\Livewire\Backend;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Livewire\Component;

class Auth extends Component
{
    public $email, $password;

    public function check()
    {
        if (FacadesAuth::attempt(['email' => $this->email, 'password' => $this->password])) {
            Request()->session()->regenerate();
            if (auth()->user()->level == 'Operator') {
                return redirect()->intended('operator');
            } elseif (auth()->user()->level == 'Outlet') {
                return redirect()->intended('product');
            } elseif (auth()->user()->level == 'Atasan') {
                return redirect()->intended('dashboard');
            }
        }
        flash()->addWarning('Email atau password yang anda masukkan salah!');
    }

    public function render()
    {
        $data = [
            "setting" => Setting::get(),
        ];
        return view('livewire.backend.auth', $data)->extends('layouts.auth.main', $data)->section('content');

    }
}
