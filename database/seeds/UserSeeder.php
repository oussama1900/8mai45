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
    //  DB::insert('insert into users (scout_id,email,password) values(?,?,?)',[1,'baraa@gmail.com','$2y$12$wyHF9OkwhzLCOSoNVv1hn.zErZkzc20a8rovf/EA7QzYrtLqT0Su.']);
      DB::table('users')->insert([
                 'scout_id' => 1,
                 'email' =>'baraa@gmail.com',
                 'password' => bcrypt('baraa'),
             ]);
    }
}
