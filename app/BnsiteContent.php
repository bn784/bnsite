<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BnsiteContent extends Model

    use Notifiable;

{
    protected $fillable = [
        'title',
        'content_en',
        'content_ru',
		'content_ua',
    ];
}
