<?php

use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'gov',
            'display_name' => 'roles.gov',
            'description' => 'محافظ الفوج',
            'removable' => false
        ]);

        Role::create([
            'name' => 'vgov',
            'display_name' => 'roles.vgov',
            'description' => 'نائب محافظ الفوج',
            'removable' => false
        ]);

        Role::create([
            'name' => 'med',
            'display_name' => 'roles.med',
            'description' => 'مسؤول الاعلام',
            'removable' => false
        ]);

        Role::create([
            'name' => 'vmed',
            'display_name' => 'roles.vmed',
            'description' => 'نائب مسؤول الاعلام',
            'removable' => false
        ]);

        Role::create([
            'name' => 'fin',
            'display_name' => 'roles.fin',
            'description' => 'مسؤول المالية',
            'removable' => false
        ]);

        Role::create([
            'name' => 'vfin',
            'display_name' => 'roles.vfin',
            'description' => 'مسؤول العتاد',
            'removable' => false
        ]);

/*        Role::create([
            'name' => 'psv',
            'display_name' => 'roles.psv',
            'description' => '',
            'removable' => false
        ]);

        Role::create([
            'name' => 'vpsv',
            'display_name' => 'roles.vpsv',
            'description' => '',
            'removable' => false
        ]);*/

        Role::create([
            'name' => 'surv',
            'display_name' => 'roles.surv',
            'description' => 'متابعة البرامج وتنفيذ الخطط',
            'removable' => false,
        ]);
        Role::create([
            'name' => 'csd',
            'display_name' => 'roles.csd',
            'description' => 'خدمة و تنمية المجتمع',
            'removable' => false,
        ]);

        Role::create([
            'name' => 'ucap',
            'display_name' => 'roles.ucap',
            'description' => 'قائد وحدة',
            'removable' => false
        ]);

        Role::create([
            'name' => 'vucp',
            'display_name' => 'roles.vucp',
            'description' => 'نائب قائد وحدة',
            'removable' => false
        ]);

        Role::create([
            'name' => 'capa',
            'display_name' => 'roles.capa',
            'description' => 'قائد مساعد',
            'removable' => false
        ]);

        Role::create([
            'name' => 'trne',
            'display_name' => 'roles.trne',
            'description' => 'قائد متربص',
            'removable' => false
        ]);
    }
}
