<?php

use Illuminate\Database\Seeder;
use App\Models\Kelas;

class ClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Kelas::insert([['name' => 'X OTKP 1'], ['name' => 'X OTKP 2'], ['name' => 'X OTKP 3'], ['name' => 'X AKL 1'], ['name' => 'X AKL 2'], ['name' => 'X TKRO 1'], ['name' => 'X TKRO 2'], ['name' => 'X TKRO 3'], ['name' => 'X TKRO 4'], ['name' => 'X TBSM 1'], ['name' => 'X TBSM 2'], ['name' => 'X TIPTL 1'], ['name' => 'X TIPTL 2'], ['name' => 'X RPL 1'], ['name' => 'X RPL 2'], ['name' => 'X RPL 3']]);
    }
}
