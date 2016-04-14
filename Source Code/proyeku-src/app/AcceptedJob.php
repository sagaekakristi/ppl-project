<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AcceptedJob extends Model
{
    // specify table name, primary key
    protected $table = 'accepted_job';
    protected $primaryKey = 'id';

    // disable timestamps created_at updated_at
    public $timestamps = false;
}
