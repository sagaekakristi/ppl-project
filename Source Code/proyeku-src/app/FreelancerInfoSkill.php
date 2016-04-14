<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FreelancerInfoSkill extends Model
{
    // specify table name, primary key
    protected $table = 'freelancer_info_skill';
    protected $primaryKey = 'freelancer_info_id';

    // disable timestamps created_at updated_at
    public $timestamps = false;
}
