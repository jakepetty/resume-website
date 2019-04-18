<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class CoverLetter extends Model
{
    //
    use Sortable;
    protected $fillable = [
        'name',
        'body'
    ];
}
