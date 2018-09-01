<?php

use App\Unit;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
class UnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Unit::create([
            'unit_id'   => 'cubs',
            'unit_name' => ' الأشبال'
        ]);

        Unit::create([
            'unit_id'   => 'sct',
            'unit_name' => ' الكشاف'
        ]);

        Unit::create([
            'unit_id'   => 'asct',
            'unit_name' => ' الكشاف المتقدم'
        ]);

        Unit::create([
            'unit_id'   => 'tvlr',
            'unit_name' => ' الجوالة'
        ]);
    }
}
