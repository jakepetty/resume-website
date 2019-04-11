<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class Education extends Model
{
    //
    use Sortable;
    protected $table = 'educations';
    protected $fillable = ['name', 'major', 'location', 'year'];
    public $sortable = ['name', 'major', 'location', 'year'];
}
