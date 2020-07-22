<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Validator;
use App\Model\SubCategory_model as m;

class Subcategory extends Controller
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
    public function AddSubCategory()
    {
        return view('user.addsubcategory');
    }
     public function EditSubCategory($id=null)
    {   $data=m::EditSubCategory($id);
        
        return response()->json($data);
    }
      

        public function ShowSubCategory()
    {
        $res=m::ShowSubCategory();
        return response()->json($res);
    }

      public function ViewSubCategory()
    {
      
        return view('user.viewsubcategory');
    }
    
  public function UpdateSubCategory(Request $request)
    {      
$imageName;

        if($request->Subcategory_logo==''){

            $imageName=$request->previousimage;
           
        }
        else{
              @unlink('public/subcategories/'.$request->Subcategory_logo);
 $imageName = time() . '.' . $request->file('Subcategory_logo')->getClientOriginalExtension();

 $request->Subcategory_logo->move(public_path('subcategories'), $imageName);
       
       }

       $res=m::UpdateSubCategory($request,$imageName);
       
              return response()->json(['success'=>'Update record.']);
      
    }



 public function DeleteSubCategory($id)
    {
         $qry=DB::table('sub_categories')->where('id',$id)->first();
            @unlink('public/subcategories/'.$qry->logo);
        $res=m::DeleteSubCategory($id);
     return response()->json(['success'=>'Delete record.']);
    }


      public function InsertSubCategory(Request $request)
    {      $validator = Validator::make($request->all(), [
            'name' => 'required',
              'category_id' => 'required',
                 'logo' => 'bail|required|max:2048',
   
        
        ]);


        if ($validator->passes()) {

 $imageName = time() . '.' . $request->file('logo')->getClientOriginalExtension();


 $request->logo->move(public_path('subcategories'), $imageName);
  $res=m::InsertSubCategory($request,$imageName);
       
            return response()->json(['success'=>'Added new records.']);
        }

else{
        return response()->json(['error'=>$validator->getMessageBag()->toArray() ]);
    }

    }

    
}
