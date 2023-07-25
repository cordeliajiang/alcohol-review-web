<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    # enable mass assignment (create() will generate MassAssignmentException and Laravel defaults to disable mass assignment)
    protected $fillable = ['name', 'businessName', 'description', 'recommendRetailPrice', 'URL'];

    function reviews(){
        # need to specifically specify foreign key to review table for hasMany relationship
        return $this->hasMany('App\Models\Review', 'itemId');
    }

    function images(){
        return $this->hasMany('App\Models\Image', 'itemId');
    }

    use HasFactory;
}
