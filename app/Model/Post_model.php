<?php

namespace App\Model;
use DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Auth;
class Post_model extends Model
{
    
public static function InsertPost($request,$path,$slug){


        $data=array(


        	'category_id'=>$request->category_id,
        	'subcategory_id'=>$request->subcategory_id,
        	'description'=>$request->description,
        	'title'=>$request->title,
        	'keywords'=>$request->keyword,
        	'post_slug'=>$slug,
        	'user_id'=>Auth::user()->id,
        	'post_logo'=>$path,
			'short_desc'=>$request->shortdescription
        );
		$qry=DB::table('posts')->insert($data);


		if($qry){
			return 1;
		}
		
	}

	public static function InsertTags($request){
for($i=0;$i<sizeof($request->data);$i++) {
	# code...
	$id = DB::table('posts')->max('id');

DB::table('post_tag')->insert(['post_id'=>$id,'tag_name'=>$request->data[$i]]);
}
	}


	

	public static function UpdateTags($request){
$id=$request->tag_id;

        $data=array(
        	'tag_name'=>$request->tag_name,
        	
       			'updated_at'=>date('Y-m-d H:i:s')
       		);
		$qry=DB::table('post_tag')->where('id',$id)->update($data);
		if($qry){
			return '1';
		}
}

	

	public static function AddTags($request){

        $data=array(
        	'tag_name'=>$request->tag1,
        	
       			'post_id'=>$request->id
       		);
		$qry=DB::table('post_tag')->insert($data);
		if($qry){
			return '1';
		}
}


	public static function DeleteTags($request){
$id=$request->id;

		$qry=DB::table('post_tag')->where('id',$id)->delete();
		return 1;
}


public static function ImageEdit($request,$path){
$id=$request->imageid;
       $qry=DB::table('posts')->where('id',$id)->first();
            @unlink('public/Posts/'.$qry->post_logo);
	 $data=array(
    'post_logo'=>$path,
       			'updated_at'=>date('Y-m-d H:i:s')
		);
	 	$qry=DB::table('posts')->where('id',$id)->update($data);
	
}
	public static function UpdatePost($request){
$id=$request->id;
	
        $data=array(
       
'short_desc'=>$request->shortdescription,
        	'category_id'=>$request->category_id,
        	'subcategory_id'=>$request->subcategory_id,
        	'description'=>$request->description,
        	'title'=>$request->title,
        	'keywords'=>$request->keyword,
        	'post_slug'=>$request->slug,
       			'updated_at'=>date('Y-m-d H:i:s')
       		);
		$qry=DB::table('posts')->where('id',$id)->update($data);
	
		
	}
		public static function DeletePost($id){

$data=array(
	'is_deleted'=>1,
	'deleted_at'=>date('Y-m-d H:i:s'),);
     
  	$qry=DB::table('posts')->where('id',$id)->update($data);
  	$qr=DB::table('post_tag')->where('post_id',$id)->delete();
		if($qr){
			return '1';
		}
		else{
			return '0';
		}
	}



public static function ShowPost(){

      
		$qry=DB::select('SELECT p.id,p.post_logo,p.keywords,p.post_slug,p.short_desc,p.title,c.category_name,s.name FROM `posts` as p left join sub_categories as s on s.id=p.subcategory_id inner join categories as c where c.id=p.category_id  and p.is_deleted=0 order by p.id desc');
		return $qry;
	}

	public static function ShowTags(Request $request){
	$id=$request->id;
	$qry=DB::table('post_tag')->where('post_id',$id)->get();
	return $qry;
}




	public static function changeCategory(Request $request){
	$id=$request->id;
	$qry=DB::table('sub_categories')->select('id','name')->where('category_id',$id)->where('is_deleted',0)->get();
	return $qry;
}

public static function EditPost($id){

      
		$qry=DB::table('posts')->select('id','title','keywords','category_id','post_slug','subcategory_id','title','description','short_desc','post_logo')->where('id',$id)->where('is_deleted',0)->get()->first();
		return $qry;
	}
	


	}

?>