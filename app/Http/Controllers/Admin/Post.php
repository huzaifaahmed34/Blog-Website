<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Notifications\SubcribeUs;
use App\Newsletter;
use DB;
use Validator;
use App\Model\Post_model as m;

class Post extends Controller
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
    public function AddPost()
    {
        return view('user.addpost');
    }
     public function EditPost($id=null)
    {   $data=m::EditPost($id);
        
        return response()->json($data);
    }
      

        public function ShowPost()
    {
        $res=m::ShowPost();
        return response()->json($res);
    }

      public function ViewPost()
    {
      
        return view('user.viewpost');
    }
    
     public function UpdatePost(Request $request)
    {      


       $res=m::UpdatePost($request);
       
              return response()->json(['success'=>'Update record.']);
      
    }

public function changeCategory(request $request){
     $res=m::changeCategory($request);
     return response()->json($res);
}
public function UpdateTags(request $request){
     $res=m::UpdateTags($request);
     return response()->json($res);
}

public function AddTags(request $request){
     $res=m::AddTags($request);
     return response()->json($res);
}


public function DeleteTags(request $request){
      $qry=DB::table('posts')->where('id',$id)->first();
            @unlink('public/Posts/'.$qry->post_logo);
     $res=m::DeleteTags($request);
     return response()->json($res);
}




public function ShowTags(request $request){
     $res=m::ShowTags($request);
     return response()->json($res);
}

 public function DeletePost($id)
    {
          $qry=DB::table('posts')->where('id',$id)->first();
            @unlink('public/Posts/'.$qry->post_logo);
        $res=m::DeletePost($id);
     return response()->json(['success'=>'Delete record.']);
    }

    public function InsertTags(Request $request)
{
$res=m::InsertTags($request);
       
            return response()->json(['success'=>'Added new records.']);

}

    

  public function ImageEdit(Request $request)
  { 
        
 $imageName = time() . '.' . $request->file('Post_logo')->getClientOriginalExtension();


 $request->Post_logo->move(public_path('Posts'), $imageName);
  $res=m::ImageEdit($request,$imageName);
       
            return response()->json(['success'=>'Added new records.']);
    }
      public function InsertPost(Request $request)


    {      $validator = Validator::make($request->all(), [
            'category_id' => 'required',
             'title' => 'required',
               'keyword' => 'required',
              'tags' => 'required',
               'Post_logo' => 'required',
                'description' => 'required',
            'shortdescription'=>'required|max:300'
            
        ]);


        if ($validator->passes()) {

        
 $imageName = time() . '.' . $request->file('Post_logo')->getClientOriginalExtension();


 $request->Post_logo->move(public_path('Posts'), $imageName);
    $slug=str_slug($request->title, '-');

$count=DB::table('posts')->where('post_slug','like',$slug.'%')->count();
if($count>0){



$slug=$slug.'-'.$count;
}
else{
    $slug=$slug;
}
  $res=m::InsertPost($request,$imageName,$slug);
       
   
            $user = Newsletter::all();

            $details = [
            'title'=>$request->title,

            'shortdescription'=>$request->shortdescription,
                'slug'=>$slug,
 'actionURL' => url('/blog/'.$slug),
  'actionText' => 'View Post',
                
            
        ];
        foreach ($user as $user) {
            # code...
        
        $user->notify(new SubcribeUs($details));
    }
    return response()->json(['success'=>'Added new records.']);
        }

else{
        return response()->json(['error'=>$validator->getMessageBag()->toArray() ]);
    }

    }

    
}
