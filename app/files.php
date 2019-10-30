<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class files extends Model
{
    protected $table = "files";

    protected $fillable = ['name', 'size', 'description', 'extension', 'user_id'];
    public $timestamps = false;
}
