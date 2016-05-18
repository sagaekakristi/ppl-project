<?php
namespace App\Http\Controllers;
use App\Http\Requests;
use Illuminate\Http\Request;
use DB;
class SearchController extends Controller{
    public function search(Request $request){

        $search = $request->search;
        //dump($search);

        $location = $request->location;
        //dump($location);

        $upah_max = $request->upah_max;
        if(is_null($upah_max) || $upah_max===""){
            $upah_max = PHP_INT_MAX;
        } else 
            $upah_max = intval($upah_max);
        //dump($upah_max);

        $upah_min = $request->upah_min;
        if(is_null($upah_min)){
            $upah_min = 0;
        } else 
            $upah_min = intval($upah_min);
        //dump($upah_min);

        $kategori = $request->category;
        //dump($kategori);

        $order = $request->order;
        if(is_null($order) || $order===""){
            $order = "user_info.user_rating";
        }
        //dump($order);

        $catList = DB::table('category')
                        -> select('kategori')
                        -> get();
        //dump($catList);

        $jobs = DB::table('job')
                    -> join('users', 'users.id', '=', 'job.freelancer_info_id')
                    -> join('user_info', 'user_info.user_id', '=', 'users.id')
                    -> join('job_category', 'job_category.job_id', '=', 'job.id')
                    -> join('category', 'category.id', '=', 'job_category.category_id')
                    -> select('users.name', 'user_info.alamat', 'job.judul', 'job.deskripsi', 'job.upah_max', 'job.upah_min', 'job.id', 'user_info.profile_picture_link')
                    -> where('judul', 'LIKE', '%'.$search.'%')
                    -> where('user_info.alamat', 'LIKE', '%'.$location.'%')
                    -> where('job.upah_max', '<=', $upah_max)
                    -> where('job.upah_min', '>=', $upah_min)
                    -> where('category.kategori', 'LIKE', '%'.$kategori.'%')
                    -> orderBy($order)
                    -> paginate(2);
                    //->get();
        //dd($jobs);

        if(count($jobs)==0){
            return View('search')
            ->with('message','unexist')
            ->with('search', $search);
        } else{
            return View('search')
            ->with('jobs', $jobs)
            ->with('search', $search)
            ->with('catList', $catList);
        }
    }
}