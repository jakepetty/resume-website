<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    //
    protected $fillable = ['name', 'title', 'description', 'duties', 'location', 'start_date', 'end_date'];
}
