<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Project extends Model
{
    //
    use Sortable;
    protected $fillable = [
        'github_id',
        'name',
        'description',
        'url',
        'demo',
        'order'
    ];
}
