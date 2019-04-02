<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;
class Tool extends Model
{
    //
    use Sortable;
    protected $fillable = ['name', 'start_date', 'end_date', 'level'];
    public $sortable = ['name', 'start_date', 'end_date', 'level'];
}
