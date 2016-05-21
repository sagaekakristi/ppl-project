<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    // specify table name, primary key
    protected $table = 'message';
    protected $primaryKey = 'id';

    // disable timestamps created_at updated_at
    public $timestamps = true;
}
