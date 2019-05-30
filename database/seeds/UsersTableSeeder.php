<?php

use App\Models\Address;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
                                  'email' => 'admin@qq.com',
                                  'password' => bcrypt('admin'),
                                  'name'     => 'admin',
                              ]);
    }
}
