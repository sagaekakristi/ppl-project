<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // specify table name, primary key
    protected $table = 'category';
    protected $primaryKey = 'id';

    // disable timestamps created_at updated_at
    public $timestamps = false;
}
