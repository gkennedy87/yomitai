<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Kyslik\ColumnSortable\Sortable;

class Book extends Model
{
    use Sortable;
    use HasFactory;
  
    protected $guarded = [];

    public $sortable = ['id','title','author'];
}
