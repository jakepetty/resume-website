<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Skill extends Model
{
    //
    use Sortable;
    protected $fillable = [
        'name',
        'order',
        'years'
    ];
}
