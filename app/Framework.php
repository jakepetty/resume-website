<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Framework extends Model
{
    //
    use Sortable;
    protected $fillable = [
        'name',
        'url'
    ];
}
