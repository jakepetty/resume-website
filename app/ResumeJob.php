<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use Kyslik\ColumnSortable\Sortable;

class ResumeJob extends Model
{
    //
    use Sortable;
    protected $fillable = ['name', 'title', 'description', 'duties', 'location', 'start_date', 'end_date'];
    public $sortable = ['name', 'start_date', 'end_date'];
}
