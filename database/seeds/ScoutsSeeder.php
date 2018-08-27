<?php

use App\Scout;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class ScoutsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    DB::table('scouts')->insert([
          'scout_id'   => 1,
          'assurance_num' => '16454',
          'first_name' => 'براء عبد الاله',
          'last_name' => 'مويات',
          'date_of_birth' => '24-12-1996',
          'membership_date' => 'مويات',
          'email' => 'baraa@gmail.com',
          'phone' => '0022266',
          'image'=>''
      ]);
    }
}
