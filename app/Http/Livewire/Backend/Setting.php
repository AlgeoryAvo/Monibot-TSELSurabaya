<?php

namespace App\Http\Livewire\Backend;

use App\Models\Setting as ModelsSetting;
use Illuminate\Support\Facades\File;
use Livewire\Component;
use Livewire\WithFileUploads;

class Setting extends Component
{

    protected $listeners = ['refreshComponent' => '$refresh'];
    use WithFileUploads;

    public $new_image;
    public $web;
    public $keyword;
    public $alamat;
    public $telp;
    public $email;
    public $yt;
    public $ig;
    public $lat;
    public $lng;
    public $old_image;

    public function mount()
    {
        $setting = ModelsSetting::first();
        $this->web = $setting->web;
        $this->keyword = $setting->keyword;
        $this->alamat = $setting->alamat;
        $this->telp = $setting->telp;
        $this->email = $setting->email;

        $this->old_image = $setting->logo;

    }


    public function render()
    {
        $data = [
            "setting" => ModelsSetting::get(),
        ];
        return view('livewire.backend.setting', $data)->extends('layouts.backend.main', $data)->section('content');
    }


    public function store()
    {
        $setting = ModelsSetting::first();
        $setting->update([
            "web"   => $this->web,
            "keyword"   => $this->keyword,
            "alamat"   => $this->alamat,
            "telp"   => $this->telp,
            "email"   => $this->email,
        ]);
        session()->flash('ubah', 'Website berhasil diperbarui.');
        return redirect()->to('setting-website');
    }

    public function update()
    {
        $setting = ModelsSetting::first();
        $filename = "";
        $destination = public_path('storage\\' . $setting->logo);
        if ($this->new_image != null) {
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $filename = $this->new_image->store('images', 'public');
            $setting->logo = $filename;
            $setting->save();
        }
        session()->flash('successlogo', 'Logo website berhasil diperbarui!');
        return redirect()->to('setting-website');
    }


}
