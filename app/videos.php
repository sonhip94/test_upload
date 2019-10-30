<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class videos extends Model
{
    protected $table = "videos";

    protected $fillable = ['name', 'duration', 'jwPlayerId', 'extension', 'user_id'];
    public $timestamps = false;
}
