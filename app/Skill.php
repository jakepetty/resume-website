<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Skill extends Model
{
    //
    use Sortable;
    protected $fillable = ['name', 'start_date', 'end_date', 'is_public'];
    public $sortable = ['name', 'start_date', 'end_date', 'is_public'];
}
