<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    // specify table name, primary key
    protected $table = 'notification';
    protected $primaryKey = 'id';

    // disable timestamps created_at updated_at
    public $timestamps = true;
}
