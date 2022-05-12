<?php

namespace Database\Seeders;

use Domain\Users\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Patricia',
            'surname' => '',
            'email' => 'patricia@mail.com',
            'active' => true,
            'password' => 'perrocopito1', // password

        ]);
    }
}
