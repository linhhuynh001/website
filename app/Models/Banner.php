<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    protected $table = 'banner';
    protected $guarded = [''];
    protected $fillable = [
        'name','slug','avatar','status'
    ];
}
