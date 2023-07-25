<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    # enable mass assignment (create() will generate MassAssignmentException and Laravel defaults to disable mass assignment)
    protected $fillable = ['userId', 'itemId', 'rating', 'reviewContent'];
    function item(){
        # need to specifically specify foreign key to review table for belongsTo relationship
        return $this->belongsTo('App\Models\Item', 'itemId');
    }

    function user(){
        return $this->belongsTo('App\Models\User', 'userId');
    }

    use HasFactory;
}
