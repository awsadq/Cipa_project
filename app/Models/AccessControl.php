<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessControl extends Model
{
    protected $fillable = ['user_id', 'section', 'access_granted'];
}
