<?php

namespace App\Model;
use DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Session;
class Home_model extends Model
{
    
public static function ShowPost(){
		$qry=DB::table('posts')->where('is_deleted',0)->orderBy('id','desc')->paginate(5);
return $qry;
}
public static function ShowPostDetail($slug,$request){
		$qry=DB::table('posts as p')->select('p.id as id','p.short_desc','p.title','p.keywords','p.description','p.user_id as uid','p.created_at','u.name','u.email','c.category_name','p.subcategory_id','p.category_id','c.category_slug','p.post_logo','c.category_logo','p.post_slug')->where('c.is_deleted',0)->where('p.is_deleted',0)->where('p.post_slug',$slug)->join('categories as c','c.id','=','p.category_id')->join('users as u','u.id','=','p.user_id')->first();
		$id=$qry->id;
		if(!$request->session()->has('blog'.$id)){
			DB::table('posts')->where('id',$id)->increment('post_view_count');
			$request->session()->put('blog'.$id,1);
		}

return $qry;
}
public static function ShowCategoryPost($slug){
		$qry=DB::table('posts as p')->select('p.id as id','p.short_desc','p.title','p.description','p.user_id as uid','p.created_at','u.name','u.email','c.category_name','p.subcategory_id','p.category_id','c.category_slug','p.post_logo','c.category_logo','p.post_slug')->where('c.is_deleted',0)->where('p.is_deleted',0)->where('c.category_slug',$slug)->join('categories as c','c.id','=','p.category_id')->join('users as u','u.id','=','p.user_id')->orderBy('p.id','desc')->paginate(30);
return $qry;
}
public static function ShowSubCategoryPost($slug){
		$qry=DB::table('posts as p')->select('p.id as id','p.title','p.short_desc','p.description','s.name as sname','s.slug','s.logo','p.user_id as uid','p.created_at','u.name','u.email','c.category_name','p.subcategory_id','p.category_id','c.category_slug','p.post_logo','c.category_logo','p.post_slug')->where('c.is_deleted',0)->where('s.is_deleted',0)->where('p.is_deleted',0)->where('s.slug',$slug)->join('categories as c','c.id','=','p.category_id')->join('sub_categories as s','s.id','=','p.subcategory_id')->join('users as u','u.id','=','p.user_id')->orderBy('p.id','desc')->paginate(30);
return $qry;
}
public static function ShowTagsPost($slug){
		$qry=DB::table('post_tag as t')->select('p.id as id','p.title','p.short_desc','p.description','p.user_id as uid','p.created_at','u.name','u.email','t.tag_name','c.category_name','p.subcategory_id','p.category_id','c.category_slug','p.post_logo','c.category_logo','p.post_slug')->where('t.tag_name','like',$slug.'%')->where('c.is_deleted',0)->where('p.is_deleted',0)->join('posts as p','p.id','=','t.post_id')->join('categories as c','c.id','=','p.category_id')->join('users as u','u.id','=','p.user_id')->orderBy('p.id','desc')->paginate(30);
return $qry;

}

public static function ShowSearchPost($slug){
		$qry=DB::table('posts as p')->select('p.id as id','p.title','p.short_desc','p.description','s.name as sname','s.slug','s.logo','p.user_id as uid','p.created_at','u.name','u.email','c.category_name','p.subcategory_id','p.category_id','c.category_slug','p.post_logo','c.category_logo','p.post_slug')->where('c.is_deleted',0)->where('p.is_deleted',0)->where('c.category_name','like','%'.$slug.'%')->orwhere('s.name','like','%'.$slug.'%')->orwhere('p.title','like','%'.$slug.'%')->join('categories as c','c.id','=','p.category_id')->leftjoin('sub_categories as s','s.id','=','p.subcategory_id')->join('users as u','u.id','=','p.user_id')->orderBy('p.id','desc')->paginate(30);
return $qry;

}
	public static function showcomments($request){
	 	$post_id=$request->post_id;
	 	$qry=DB::table('comments')->where('post_id',$post_id)->get();
	 	return $qry;
	}

	public static function addcomments($request){
	 	$post_id=$request->post_id;
	 	$data=array(
	 		'name'=>$request->name,
	 		'message'=>$request->message,
	 		'post_id'=>$post_id
	 	);

	 	$qry=DB::table('comments')->insert($data);
	 	$qry=DB::table('posts')->where('id',$post_id)->increment('post_comment_count');
	 	return 1;
	}

}
?>