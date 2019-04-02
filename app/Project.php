<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Project extends Model
{
    use Sortable;
    protected $fillable = [
        'name', 'description', 'url', 'homepage', 'github_id'
    ];
    protected $sortable = [
        'name', 'description', 'url', 'homepage', 'github_id'
    ];

    public function languages()
    {
        return $this->belongsToMany('App\Language')
            ->withTimestamps();
    }
}
