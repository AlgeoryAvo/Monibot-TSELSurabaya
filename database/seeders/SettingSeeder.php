<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $set = [
            'web'   => 'Sortir Barang',
            'keyword'   => 'Sortir Barang',
            'logo'  => 'icon.png',
            'alamat'    => 'Indonesia',
            'telp'    => '081295916567',
            'email'    => 'admin@admin.com',
            'created_at'    => now(),
        ];
        Setting::create($set);

    }
}
