<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Project extends Model
{
    use Sortable;
    protected $fillable = [
        'name', 'description', 'url', 'language', 'github_id'
    ];
    protected $sortable = [
        'name', 'description', 'url', 'language', 'github_id'
    ];
}
