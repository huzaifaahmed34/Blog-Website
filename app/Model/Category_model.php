<?php

namespace App\Model;
use DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Category_model extends Model
{
    
public static function InsertCategory($request,$path){
	$slug=str_slug($request->category_name, '-');

$count=DB::table('categories')->where('category_slug','like',$slug.'%')->count();
if($count>0){



$slug=$slug.'-'.$count;
}
else{
	$slug=$slug;
}

        $data=array(
        	'category_name'=>$request->category_name,
        	'category_slug'=>$slug,
        	'category_logo'=>$path,
        );
		$qry=DB::table('categories')->insert($data);
		if($qry){
			return 1;
		}
		
	}
	public static function UpdateCategory($request){
$id=$request->id;
$imageName='';
$path;
        if($request->category_logo==''){
$imageName=$request->previousimage;

        }
        else{
        	 @unlink('public/categories/'.$request->previousimage);

 $imageName = time() . '.' . $request->file('category_logo')->getClientOriginalExtension();

 $request->category_logo->move(public_path('categories'), $imageName);

  
          
       }
         $data=array(
        	'category_name'=>$request->name,
        	  	'category_slug'=>$request->slug,
        	'category_logo'=>$imageName,
       			'updated_at'=>date('Y-m-d H:i:s')
       		);

		$qry=DB::table('categories')->where('id',$id)->update($data);
		if($qry){
			return '1';
		}
		
	}
		public static function DeleteCategory($id){

$data=array(
	'is_deleted'=>1,
	'deleted_at'=>date('Y-m-d H:i:s'),);
     
  	$qry=DB::table('categories')->where('id',$id)->update($data);
		if($qry){
			return '1';
		}
		else{
			return '0';
		}
	}

public static function ShowCategory(){

      
$qry=DB::select("select category_logo as logo,id,category_name,category_slug from categories where is_deleted=0");

		return $qry;
	}

public static function EditCategory($id){

      
      
		$qry=DB::table('categories')->select('id','category_name','category_logo as category_logo','category_slug')->where('id',$id)->where('is_deleted',0)->get()->first();
		return $qry;
	}
	


	}

?>