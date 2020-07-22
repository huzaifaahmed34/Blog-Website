<?php

namespace App\Model;
use DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class SubCategory_model extends Model
{
    
public static function InsertSubCategory($request,$path){

$slug=str_slug($request->name, '-');

$count=DB::table('sub_categories')->where('slug',$slug)->count();
if($count>0){

$id=DB::table('sub_categories')->max('id');

$id+=1;
$slug=$slug.'-'.$id;
}
else{
	$slug=$slug;
}

        $data=array(
        	'category_id'=>$request->category_id,
        	'name'=>$request->name,
        	'slug'=>$slug,
        		'logo'=>$path,
        	  'status'=>'Active',
          'is_deleted'=>0,

        );
		$qry=DB::table('sub_categories')->insert($data);
		if($qry){
			return 1;
		}
		
	}
	public static function UpdateSubCategory($request,$path){
$id=$request->id;

      
     
    $data=array(
        	'category_id'=>$request->category_id,
        	'name'=>$request->name,
        	'slug'=>$request->slug,
        		'logo'=>$path,
        	  'updated_at'=>date('Y-m-d H:i:s'),
       
        );
       
 
       		$qry=DB::table('sub_categories')->where('id',$id)->update($data);
		if($qry){
			return '1';
		}
		
	}
		public static function DeleteSubCategory($id){

$data=array('is_deleted'=>1);
     
  	$qry=DB::table('sub_categories')->where('id',$id)->update($data);
		if($qry){
			return '1';
		}
		else{
			return '0';
		}
	}

public static function ShowSubCategory(){

      
		$qry=DB::table('sub_categories as s')->select('s.id as id','s.name','s.category_id','logo','s.slug','c.category_name')->join('categories as c','c.id','=','s.category_id')->where('s.is_deleted',0)->get();
		return $qry;
	}

public static function EditSubCategory($id){

      
		$qry=DB::table('sub_categories')->select('id','name','category_id','logo','slug','category_id')->where('id',$id)->where('is_deleted',0)->get()->first();
		return $qry;
	}
	


	}

?>