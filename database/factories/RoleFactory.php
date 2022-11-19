<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
       
            'title' => 'administrator',
            'management_access' => 1,
            'user_access' => 1,
            'user_create' => 1,
            'user_edit' => 1,
            'user_view' => 1,
            'user_delete' => 1,
            'role_access' => 1,
            'role_create' => 1,
            'role_edit' => 1,
            'role_view' => 1,
            'role_delete' => 1,
           
           
    ];
});
