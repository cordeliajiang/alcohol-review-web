<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;

    function item()
    {
        return $this->belongsTo('App\Models\Item', 'itemId');
    }

    function user()
    {
        return $this->belongsTo('App\Models\User', 'userId');
    }
}