<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Model\Home_model as m;
class Home extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data=m::ShowPost();
        return view('home.Home',['posts'=>$data]);
    }
    
       public function PopularPost()
    {
        return view('home.popularpost');
    }
     public function AboutUs()
    {
        return view('home.aboutus');
    }

     public function ShowPostDetail($slug,Request $request)
    {   $data=m::ShowPostDetail($slug,$request);

        return view('home.singleblog',['data'=>$data]);
    }
       public function ShowCategoryPost($slug)
    {   $data=m::ShowCategoryPost($slug);

        return view('home.category',['category'=>$data]);
    }
     public function ShowSubCategoryPost($slug)
    {   $data=m::ShowSubCategoryPost($slug);

        return view('home.category',['subcategory'=>$data]);
    }
    

     public function ShowTagsPost($slug)
    {   $data=m::ShowTagsPost($slug);

        return view('home.category',['tags'=>$data]);
    }
         public function ShowSearchPost($slug)
    {   $data=m::ShowSearchPost($slug);

        return view('home.category',['search'=>$data]);
    }
    public function showcomments(Request $request)
    {   $data=m::showcomments($request);

        return response()->json($data);
    }
       public function addcomments(Request $request)
    {   $data=m::addcomments($request);

        return response()->json($data);
    }
    
}

