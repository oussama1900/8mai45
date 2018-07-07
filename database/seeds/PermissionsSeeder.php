<?php

use App\Permission;
use App\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /**
         * Gives access to forum
         */
        $leadership = Permission::create([
            'name' => 'leadership',
            'display_name' => 'permissions.leadership',
            'description'  => '',
            'removable' => false
        ]);

        /**
         * Promotes a scout
         */
        $promote = Permission::create([
            'name' => 'promote',
            'display_name' => 'permissions.promote',
            'description' => '',
            'removable' => false
        ]);

        /**
         * Gives acces to forum posting
         */
        $forms = Permission::create([
            'name' => 'forms',
            'display_name' => 'permissions.forms',
            'description' => '',
            'removable' => false
        ]);

        /**
         * Permits mensual report management
         */
        $reports = Permission::create([
            'name' => 'reports',
            'display_name' => 'permissions.reports',
            'description' => '',
            'removable' => false
        ]);
        
        /**
         * Permission to post news
         */
        $posts = Permission::create([
            'name' => 'posts',
            'display_name' => 'permissions.posts',
            'description' => '',
            'removable' => false
        ]);

        /**
         * Permits event posting
         */
        $events = Permission::create([
            'name' => 'events',
            'display_name' => 'permissions.events',
            'description' => '',
            'removable' => false
        ]);


        /**
         * Permission to manage all posts
         */
        $posts_all = Permission::create([
            'name' => 'posts',
            'display_name' => 'permissions.posts',
            'description' => '',
            'removable' => false
        ]);

        /**
         * Permission to manage all events
         */
        $events_all = Permission::create([
            'name' => 'events.all',
            'display_name' => 'permissions.eventsAll',
            'description' => '',
            'removable' => false
        ]);

        /**
         * Finance-related tasks:
         *  -) Financial report
         *  -) Finance Management
         *  -) Equipment Management
         */
        $finance = Permission::create([
            'name' => 'finance',
            'display_name' => 'permissions.finance',
            'description' => '',
            'removable' => false
        ]);
        
        /**
         * Recieve Units' Reports
         */
        $unit_reports = Permission::create([
            'name' => 'reports.units',
            'display_name' => 'permissions.reports.units',
            'description' => '',
            'removable' => false
        ]);
        
        /**
         * Recieve All Reports
         */
        $all_reports = Permission::create([
            'name' => 'reports.all',
            'display_name' => 'permissions.reports.all',
            'description' => '',
            'removable' => false
        ]);

        /**
         * Manage Scouts: Add, Edit, Remove, Assign
         * 
         */
        $scouts = Permission::create([
            'name' => 'scouts',
            'display_name' => 'permissions.scouts',
            'desctiption' => '',
            'removable' => false
        ]);
    }
}
