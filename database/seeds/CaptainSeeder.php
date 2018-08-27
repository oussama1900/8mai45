<?php
use App\Captain;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class CaptainSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    Captain::create([
        'scout_id'   => '1',
        'role' => 'gov',
        'unit' => 'cubs',
    ]);
  }
}
