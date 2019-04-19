<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Language extends Model
{
    //
    use Sortable;
    protected $fillable = [
        'name',
        'order'
    ];
}
