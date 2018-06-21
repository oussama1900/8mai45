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
            'display_name' => trans('roles.gov'),
            'description' => '',
            'removable' => false
        ]);

        Role::create([
            'name' => 'vgov',
            'display_name' => trans('roles.vgov'),
            'description' => '',
            'removable' => false
        ]);

        Role::create([
            'name' => 'med',
            'display_name' => trans('roles.med'),
            'description' => '',
            'removable' => false
        ]);

        Role::create([
            'name' => 'vmed',
            'display_name' => trans('roles.vmed'),
            'description' => '',
            'removable' => false
        ]);

        Role::create([
            'name' => 'fin',
            'display_name' => trans('roles.fin'),
            'description' => '',
            'removable' => false
        ]);

        Role::create([
            'name' => 'vfin',
            'display_name' => trans('roles.vfin'),
            'description' => '',
            'removable' => false
        ]);

        Role::create([
            'name' => 'psv',
            'display_name' => trans('roles.psv'),
            'description' => '',
            'removable' => false
        ]);

        Role::create([
            'name' => 'vpsv',
            'display_name' => trans('roles.vpsv'),
            'description' => '',
            'removable' => false
        ]);

        Role::create([
            'name' => 'ucap',
            'display_name' => trans('roles.ucap'),
            'description' => '',
            'removable' => false
        ]);

        Role::create([
            'name' => 'vucp',
            'display_name' => trans('roles.vucp'),
            'description' => '',
            'removable' => false
        ]);

        Role::create([
            'name' => 'capa',
            'display_name' => trans('roles.capa'),
            'description' => '',
            'removable' => false
        ]);

        Role::create([
            'name' => 'trne',
            'display_name' => trans('roles.trne'),
            'description' => '',
            'removable' => false
        ]);
    }
}
