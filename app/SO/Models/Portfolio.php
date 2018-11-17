<?php

namespace App\SO\Models;

use App\SO\Helpers\Uuids as Uuids;
use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    //Table name
    protected $table = 'portfolios';
    // Primary key
    public $primaryKey = 'id';

    public $incrementing = false;

    protected $fillable = [
        'completion_pct', 'owner_id', 'title', 'description', 'due_date', 'closed_date'
    ];
}
