<?php

use Illuminate\Database\Seeder;
use App\User;
class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'sahabuddin',
            'email' => 'sahabuddinriyaj984@gmail.com',
            'password' => bcrypt('sa@1032000'),
            'role' => 'administrator'
        ]);
    }
}
