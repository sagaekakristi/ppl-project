<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreelancerInfo extends Model
{
    // specify table name, primary key
    protected $table = 'freelancer_info';
    protected $primaryKey = 'user_info_id';

    // disable timestamps created_at updated_at
    public $timestamps = false;
}
