<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;
use App\Model\Contact_model as m;
class ContactUs extends Controller
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
        return view('home.contact');
    }

      public function EditContactUs($id=null)
    {   $data=m::EditContactUs($id);
        
        return response()->json($data);
    }
      

        public function ShowContactUs()
    {
        $res=m::ShowContactUs();
        return response()->json($res);
    }

    
     public function UpdateContactUs(Request $request)
    {      

       $res=m::UpdateContactUs($request);
       
              return response()->json(['success'=>'Update record.']);
      
    }


 public function DeleteContactUs($id)
    {
        $res=m::DeleteContactUs($id);
     return response()->json(['success'=>'Delete record.']);
    }


      public function AddContactUs(Request $request)
    {  

   $data = array('name'=>$request->name,'email'=>$request->email,'message'=>$request->message,'subject'=>$request->subject);
               $message='';

     Mail::send('home.emailverification',['data'=>$data], function ($m) use ($data) {
            $m->from($data['email'],$data['name']);

            $m->to('wetrioblog@gmail.com',$data['name'])->subject($data['subject']);
        });

  $res=m::InsertContactUS($request);
  
            return response()->json(['success'=>'Added new records.']);
       

    }
}
