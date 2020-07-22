<?php

namespace App\Model;
use DB;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;

class Contact_model extends Model
{
    
public static function InsertContactUs($request){

        $data=array(
        	'name'=>$request->name,
        	'subject'=>$request->subject,
        	'email'=>$request->email,
        	'message'=>$request->message,
        );
		$qry=DB::table('contact_us')->insert($data);
		if($qry){
			return 1;
		}
		
	}
	


	}

?>