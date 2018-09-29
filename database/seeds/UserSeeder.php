<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('users')->insert([
                 'scout_id' => 1,
                 'email' =>'baraa@gmail.com',
                 'password' => bcrypt('baraa'),
             ]);
    }
}
