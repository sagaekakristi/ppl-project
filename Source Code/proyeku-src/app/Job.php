<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    // specify table name, primary key
    protected $table = 'job';
    protected $primaryKey = 'id';

    // disable timestamps created_at updated_at
    public $timestamps = false;
}
