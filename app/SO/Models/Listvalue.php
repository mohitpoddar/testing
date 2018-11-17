<?php

namespace App\SO\Models;

use Illuminate\Database\Eloquent\Model;

class Listvalue extends Model
{
    //Table name
    protected $table = 'listvalues';
    // Primary key
    public $primaryKey = 'id';

    protected $fillable = [
        'type', 'table', 'filed', 'value', 'fulltext',
    ];
}
