<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserInfo extends Model
{
    // specify table name, primary key
    protected $table = 'user_info';
    protected $primaryKey = 'user_id';

    // disable timestamps created_at updated_at
    public $timestamps = false;

    protected $fillable = array('user_id', 'tanggal_lahir', 'alamat', 'jenis_kelamin');
}
