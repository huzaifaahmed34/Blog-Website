<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Mail;
use Validator;
use App\Newsletter;
class Newsletter_Controller extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
     
    }
   public function store(Request $request)
    {
        // Validate the request...

         $validator = Validator::make($request->all(), [
            'email' => 'required|unique:newsletters',
          
            
        ]);


        if ($validator->passes()) {


        $flight = new Newsletter;

        $flight->email = $request->email;

        $flight->save();
           $message='';
$data=array('email'=>$request->email);
     Mail::send('home.welcome',['data'=>$data], function ($m) use ($data) {
            $m->from('wetrioblog@gmail.com','TrioBloggers');

            $m->to($data['email'],'Anonymous')->subject('Thank You For Subscribing ');
        });
        return response()->json(['success'=>'Added new records.']);
    }
    else{
         return response()->json(['error'=>$validator->getMessageBag()->toArray() ]);
    }
}
}