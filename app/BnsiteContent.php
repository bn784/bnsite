<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Bnsitecontent extends Model
{
    use Notifiable;


    protected $fillable = [
        'title',
        'content_en',
        'content_ru',
		'content_ua',
    ];
}
