<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Diploma extends Model
{
    //
    use Sortable;
    protected $fillable = [
        'name',
        'location',
        'major',
        'year'
    ];
}
