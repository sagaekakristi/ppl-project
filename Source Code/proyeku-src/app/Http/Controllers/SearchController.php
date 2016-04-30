<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use DB;

class SearchController extends Controller{

	public function search($search){

        $search = urldecode($search);

        $jobs = DB::table('job')
                    -> join('users', 'users.id', '=', 'job.freelancer_info_id')
                    -> join('user_info', 'user_info.user_id', '=', 'users.id')
                    -> select('users.name', 'user_info.alamat', 'job.judul', 'job.deskripsi', 'job.upah_max', 'job.upah_min', 'job.id')
                    ->  paginate(2);     

        /*
        $jobs = DB::table('job')
        	->where('judul', 'LIKE', '%'.$search.'%')
        	->orderBy('id')
        	->paginate(2);
        */
        
        //$jobs = DB::select("SELECT * FROM `job` WHERE `judul` LIKE '%".$search."%' ORDER BY `id`'");
        
        //$jobs = DB::select('select * FROM job where judul LIKE ?', ['%'.$search.'%']);
        
        /*
        $jobs = DB::table('job')
            ->select('freelancer_info_id', 'judul', 'deskripsi', 'upah_max', 'upah_min')
            ->where('judul', 'like', '%'.$search.'%')
            ->get();
        */

        /*
        $jobs = DB::table(function($query){
            $query  -> select('freelancer_info_id', 'judul', 'deskripsi', 'upah_max', 'upah_min')
                ->where('judul', 'like', '%'.$search.'%');
        }) ->get();
        */

        /*
        untuk sementara pake raw query.
        bakal diganti pake query builder setelah mvp selesai, tapi prioritas tinggi.
        soalnya kalo pake raw query gak aman sama query injection
        */
        /*
        $jobs = DB::select(DB::raw(
            "select freelancer_info_id, judul, deskripsi, upah_max, upah_min, name, alamat
            from
                (select j.freelancer_info_id, j.judul, j.deskripsi, j.upah_max, j.upah_min 
                from job j 
                where judul like '%".$search."%') as c
            join
                (select id, name, alamat 
                from
                    (select id, name
                    from users u
                    where u.id in
                    (select freelancer_info_id from job where judul like '%web%')) as a
                join 
                    (select u.user_id, u.alamat
                    from user_info u
                    where u.user_id in
                    (select freelancer_info_id from job where judul like '%web%')) as b
                on a.id = b.user_id) as d
            on c.freelancer_info_id = d.id"
        ));
        */

        if(count($jobs)==0){
        	return View('search')
        	->with('message','unexist')
        	->with('search', $search);
        } else{
        	return View('search')
        	->with('jobs', $jobs)
        	->with('search', $search);
        }
    }

}