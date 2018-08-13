<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth.basic');

Route::get('/scouts/cubs',[

    'uses' =>'ScoutController@getScouts'
])->name('cubs');
Route::get('/scouts/scout',[

    'uses' =>'ScoutController@getScouts'
])->name('scout');
Route::get('/scouts/advanced_scout',[

    'uses' =>'ScoutController@getScouts'
])->name('advanced_scouts');
Route::get('/scouts/traveler',[

    'uses' =>'ScoutController@getScouts'
])->name('traveler');

Route::get('/scouts/captain',[

    'uses' =>'ScoutController@getScouts'
])->name('captain');

Route::get('/getScout/{id}',[

    'uses' =>'ScoutController@getScout'
]);
Route::put('/EditScoutInfo/{id}',[

    'uses' =>'ScoutController@EditScoutInfo'
]);

Route::delete('/deleteScout/{scout_id}',[

    'uses' =>'ScoutController@destroy'
]);
Route::post('/AddNewScout',[

    'uses' =>'ScoutController@AddNewScout'
]);


Route::post('/createOurUnits',[

    'uses' =>'ScoutController@createOurUnits'
]);

Route::get('/Units',[

    'uses' =>'ScoutController@getUnits'
]);

Route::get('/users-accounts',[

    'uses' =>'AccountsController@getUsersAccounts'
]);

Route::post('/addnewaccount',[

    'uses' =>'AccountsController@AddNewAccount'
])->name('new_user');

Route::get('/scouts', function (Request $request) {
    $permissions = $request->user()->captain->role->permissions;
    
})->middleware('auth:api');
