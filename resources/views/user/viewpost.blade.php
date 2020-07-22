@extends('admin/header')
@extends('admin/sidebar')

@section('content')
<style type="text/css">
    .bootstrap-tagsinput .tag  {
    margin-right: 2px;
    color: white!important;
    padding: 3px!important;
    border-radius: 82!important;
    border-radius: inherit!important;
    background: #17A2B8!important;

    }
    .modal{
      overflow: auto!important;
    }
    .bootstrap-tagsinput input{
    padding: 3px!important;
   
   width: 100%!important; }
    .bootstrap-tagsinput {
 
   
   width: 100%!important; }
</style>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark"></h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item ">View  Post</li>
               <li class="breadcrumb-item active">View Post</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">

        <div class="col-lg-12">
          <div class="card">
            <div class="card-header">
              <h1 class="card-title">View Post</h1>
            </div>
            <!-- /.card-header -->


            <div class="card-body">
       
              <div class="col-lg-12  alert-success">
     
              </div>
        
      <div class="col-lg-12  alert-danger">

              </div>
        
        <div class="table-responsive">
                <table id="example1" class="table table-bordered table-striped ">
                  <thead class="thead thead-dark">
                    <tr>
                      <th>S#</th>
                      <th>Title</th>
                      <th>Sub Category</th>
                 
                         <th>Parent Category</th>

                               <th>Logo</th>
                       <th>Action</th>
                    </tr>
                  </thead>
                  <tbody id=showdata>

                  
            
                  </tbody>
                </table>
</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
           <h4 class="modal-title">Delete Post</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
     Are You sure you want to delete this Post
     
      </div>
      <div class="modal-footer">
         <button type="button" id="btnDelete" class="btn btn-danger " >Delete</button>
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!----End Delete Modal--->



<!--Edit   Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
        <form id=form1 action="{{url('admin/PostUpdate')}}" method=POST enctype="multipart/form-data">
      <div class="modal-header">
           <h4 class="modal-title">Edit Post</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body" >
    
        <input type="hidden" name="id">
        <div class="row"> 
    
       {{ csrf_field() }}     
       <input type="hidden" name="Post_slug">
       <input type="hidden" name="previousimage">

                      <div class="col-lg-6">
                      <div class="form-group">
                   <label>Select Category </label>

     <select  class="form-control" id="category_id" name=category_id >
               <option value="">
                  Select Category 
                </option>
              @php
                $qr=DB::table('categories')->where('is_deleted',0)->get();
                  @endphp
                @foreach($qr as $q )
               
                <option value="{{$q->id}}">{{$q->category_name}}</option>;
             
              @endforeach
 </select>
                </div>
                    </div>
   <div class="col-lg-6">
                      <div class="form-group">
                   <label>Select Sub Category </label>

     <select  class="form-control" id="subcategory_id" name=subcategory_id >
               <option value="">
                  Select Sub Category 
                </option>
              @php
                $q=DB::table('sub_categories')->where('is_deleted',0)->get();
                  @endphp
                @foreach($q as $q )
               
                <option value="{{$q->id}}">{{$q->name}}</option>;
             
              @endforeach
 </select>
                </div>

                    </div>
                       <div class="col-lg-6">
                      <div class="form-group">
                   <label>Enter Title </label>

   <input type="text" class="form-control" id="title" name=title placeholder="Enter Title">
           
                </div>
                
                    </div>
                           <div class="col-lg-6">
                      <div class="form-group">
                   <label>Enter Slug </label>

   <input type="text" class="form-control" id="slug" name=slug placeholder="Enter Title">
           
                </div>
                
                    </div>
                      <div class="col-lg-6">
                      <div class="form-group">
                   <label>Enter Keywords </label>

   <input type="text" class="form-control" id="keyword" name=keyword placeholder="Enter Kewyword">
           
                </div>
                
                    </div>
                     <div class="col-lg-6">
                      <div class="form-group">
                   <label>Enter Short Desc </label>

   <textarea type="text" class="form-control" id="shortdescription" name=shortdescription placeholder="Enter Short Desc"></textarea>
           
                </div>
                
                    </div>
               

          
              <div class="col-lg-12">
               <div class="table-responsive">
<table class="table table-hovered table-striped mt-4">
<thead class="thead bg-dark">
  <tr>
    <td>Sno</td>
    <td>Tag Name</td>
    <td>Action</td>
  </tr>

</thead> 
<tbody id="showtags">
  
</tbody>
<foot>
  <tr>
  <td></td>
   <td></td>
    <td class="text-right py-1"><input type="button" class="btn btn-info" id=btnaddtag value="Add Tag"></td>
</tr>
</foot>
</table>
       </div>             </div>

  <div class="col-lg-12">
              <label>Enter Description</label>
           
              <textarea type="text" class="form-control textarea" id="description" name=description placeholder="Enter Blog Description" >
              </textarea>
         </div>

        
          </div>
            

     
      </div>

      <div class="modal-footer">
       <input type="submit" id="btnUpdate" class="btn btn-info " value="Update">
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
              </form>
    </div>

  </div>
</div>













<!--Edit  Image  Modal -->
<div id="myModalImage" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
        <form id=form4 action="{{url('admin/PostImageUpdate')}}" method=POST enctype="multipart/form-data">
      <div class="modal-header">
           <h4 class="modal-title">Edit Post Image</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body" >
    
        <input type="hidden" name="imageid">
        <div class="row"> 
    
       {{ csrf_field() }}     
      

                       

           <div class="col-lg-12">
              <label>Enter Post Image</label>
           <input type="file" class="form-control" id="Post_logo" name=Post_logo placeholder="Enter Post Name">
         </div>
             
      </div>
    </div>

      <div class="modal-footer">
       <input type="submit"  class="btn btn-info " value="Update">
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
              </form>
    </div>

  </div>
</div>













<!-- Delete Modal -->
<div id="deleteModalTags" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
           <h4 class="modal-title">Delete Post</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
     Are You sure you want to delete this Post
     
      </div>

      <div class="modal-footer">
         <button type="button" id="btnDeleteTags" class="btn btn-danger " >Delete</button>
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!----End Delete Modal--->



<!--Edit   Modal -->
<div id="myModalTag" class="modal fade" role="dialog">
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
        <form id=form2 action="{{url('admin/TagsUpdate')}}" method=POST enctype="multipart/form-data">
      <div class="modal-header">
           <h4 class="modal-title">Edit Tags</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body" >
    
        <input type="hidden" name="tag_id">
        <div class="row"> 
    
       {{ csrf_field() }}     

                      <div class="col-lg-12">
                      <div class="form-group">
                   <label>Enter Tag Name</label>
<input type="text" name="tag_name" id=tag_name class="form-control">
                </div>
                    </div>


     
      </div>
    </div>
      <div class="modal-footer">
       <input type="button" id="btnUpdateTags" class="btn btn-info " value="Update">
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
              </form>
    </div>

  </div>
</div>

<!--Add   Modal -->
<div id="myModalTagAdd" class="modal fade" role="dialog">
  <div class="modal-dialog ">

    <!-- Modal content-->
    <div class="modal-content">
        <form id=form3 action="{{url('admin/TagsAdd')}}" method=POST enctype="multipart/form-data">
      <div class="modal-header">
           <h4 class="modal-title">Add Tag</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body" >
    
        <div class="row"> 
    
       {{ csrf_field() }}     

                      <div class="col-lg-12">
                      <div class="form-group">
                   <label>Enter Tag Name</label>
<input type="text" name="tag1" id=tag1 class="form-control">
                </div>
                    </div>


     
      </div>
    </div>
      <div class="modal-footer">
       <button type="button" id="btnAddTags" class="btn btn-info ">Add Tag</button>
        <button type="button" class="btn btn-default " data-dismiss="modal">Close</button>
      </div>
              </form>
    </div>

  </div>
</div>





<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>
  $(function(){
    $('.textarea').summernote();
    show_data();
function show_data(){

    $.ajax({
      type:'ajax',
      method:'get',
 
      url:'<?php echo url('admin/PostShow')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
        var html='';

      var sno=1;
var i;
 for ( i=0; i <res.length; i++) {

 html+='<tr>'+
            '<td>'+sno+'</td>'+
            '<td>'+res[i].title+'</td>'+
           '<td>'+res[i].name+'</td>'+
            '<td>'+res[i].category_name+'</td>'+
             '<td><a href=javascript:; data='+res[i].id+'  class=editimage><img src="{{asset("public/Posts/")}}/'+res[i].post_logo+'"  width=100px height=100px></a></td>'+
            '<td><a href=javascript:; data='+res[i].id+' class=editdata><i class="fa fa-edit"></i></a> &nbsp;'+
            '<a href=javascript:; data='+res[i].id+'  class="deletedata text-danger"><i class="fa fa-trash"></i></a></td>'+
            '</tr>';
           sno++;
        
};
 $('#showdata').html(html);

        },
        });



      }

$('#category_id').change(function(){
  var id=$(this).val();
changeCategory(id);
});
  function changeCategory(id){

 var url='<?php echo url('admin/changeCategory/')?>';
 $.ajax({
    type:'ajax',
    method:'get',
data:{'id':id},
    url:url,
    dataType:'json',
    async:false,
    success:function(response){
 
      if(response==''){
     

  $('#subcategory_id').attr('disabled','true');
}
else{
  var html='';
 $('#subcategory_id').removeAttr('disabled','true');
     for(var i=0;i<response.length;i++){

           html+='<option value='+response[i].id+'>'+response[i].name+'</option>';
    }
   
 $('#subcategory_id').html(html);
}
      }
      
});

}

$('#showtags').on('click','.edittags',function(){
$('#myModalTag').modal('show');
var id=$(this).attr('data');
var name=$(this).attr('data1');
var url='<?php echo url('admin/TagEdit/')?>/'+id+'';

$('input[name=tag_id]').val(id);
$('input[name=tag_name]').val(name);

})

$('#showtags').on('click','.deletetags',function(){
$('#deleteModalTags').modal('show');
var id=$(this).attr('data');
var url='<?php echo url('admin/TagDelete/')?>';


$('#btnDeleteTags').unbind().click(function(){

  $.ajax({
    type:'ajax',
    method:'get',
data:{'id':id},
    url:url,
    dataType:'json',
    async:false,
    success:function(response){
$('#deleteModalTags').modal('hide');
showTags();
      }

});
});


})


$('.editimage').click(function(){
$('#myModalImage').modal('show');
var id=$(this).attr('data');

$('input[name=imageid]').val(id);
})

$('#showdata').on('click','.editimage',function(){
$('#myModalImage').modal('show');
var id=$(this).attr('data');

$('input[name=imageid]').val(id);
});


$('#form4').on('submit',function(e){
  e.preventDefault();
var url='<?php echo url('admin/ImageEdit/')?>';
var logo=$('input[name=Post_logo]');
var r='';
if(logo.val()==''){
logo.addClass('is-invalid');
}
else{
  logo.removeClass('is-invalid');
  r='1';
}
if(r=='1'){

  $.ajax({
    type:'ajax',
    method:'post',
 data:new FormData(this),
        
    url:url,
          contentType:false,
              cache:false,

        processData:false,
    async:false,
    success:function(response){
$('#myModalImage').modal('hide');
show_data();
      }

});
}
});





$('#btnaddtag').unbind().click(function(){
  
  $('#myModalTagAdd').modal('show');

  var id=$('input[name=id]').val();

$('#btnAddTags').unbind().click(function(){
  var data=$('#form3').serialize();
var url=$('#form3').attr('action');

  var tag=$('input[name=tag1]').val();

  $.ajax({
    type:'ajax',
    method:'get',
data:{'id':id,'tag1':tag},
    url:url,
    dataType:'json',
    async:false,
    success:function(response){
$('#myModalTagAdd').modal('hide');
showTags();
$('#form3')[0].reset();
      }
    })

});
})

$('#btnUpdateTags').unbind().click(function(){
var data=$('#form2').serialize();
var url=$('#form2').attr('action');


  $.ajax({
    type:'ajax',
    method:'post',
data:data,
    url:url,
    dataType:'json',
    async:false,
    success:function(response){
$('#myModalTag').modal('hide');
showTags();
      }

});
});


$('#showdata').unbind().on('click','.editdata',function (e) {

$('#myModal').modal('show'); 
var id=$(this).attr('data');

  var url='<?php echo url('admin/PostEdit/')?>/'+id+'';

  $.ajax({
    type:'ajax',
    method:'get',

    url:url,
    dataType:'json',
    async:false,
    success:function(response){

$('input[name=id]').val(response.id);

if(response.subcategory_id==null){

  $('#subcategory_id').attr('disabled','true');
}
else{

 $('#subcategory_id').removeAttr('disabled','true');
 changeCategory(response.category_id);
}

$('input[name=keyword]').val(response.keywords);
$('input[name=previousimage]').val(response.post_logo);
$('textarea[name=description]').val(response.description);
$('.card-block').html(response.description);
$('textarea[name=shortdescription]').html(response.short_desc);
$('select[name=category_id]').val(response.category_id);
$('input[name=slug]').val(response.post_slug);
$('input[name=title]').val(response.title);
showTags();
},
    error:function(){
    $('.alert-danger').addClass('alert').html('Data not Found Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
})


function showTags(){
var id=$('input[name=id]').val();
    $.ajax({
    type:'ajax',
    method:'get',
data:{'id':id},
    url:'<?php echo url('admin/ShowTags/')?>',
    dataType:'json',
    async:false,
    success:function(response){
 var html='';
 var sno=0;
    for(var i=0;i<response.length;i++){
      sno++;
html+='<tr class="" ><td>'+sno+'</td>'+
'<td >'+response[i].tag_name+'</td>'+
 '<td><a href=javascript:; data='+response[i].id+' data1='+response[i].tag_name+' class=edittags><i class="fa fa-edit"></i></a> &nbsp;'+
            '<a href=javascript:; data='+response[i].id+'  class="deletetags text-danger"><i class="fa fa-trash"></i></a></td>' 
+'</tr>';
          
    }
   
 $('#showtags').html(html);
      }
    });
}



$('#showdata').on('click','.deletedata',function () {

$('#deleteModal').modal('show'); 

var id=$(this).attr('data');


$('#btnDelete').unbind().click(function(){
  var url='<?php echo url('admin/PostDelete/')?>/'+id+'';

  $.ajax({
    type:'ajax',
    method:'get',

    url:url,
    dataType:'json',
    async:false,
    success:function(response){
   
            $('#deleteModal').modal('hide');
        show_data();
$('.alert-success').addClass('alert').html('Data Deleted Successfully').fadeIn().delay(4000).fadeOut();

    },
    error:function(){
    $('.alert-danger').addClass('alert').html('Data not Found Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
})

});

 $('#form1').unbind().on('submit',function (e) {
  e.preventDefault();

var id=$('input[name=id]').val();

  var url='<?php echo url('admin/PostUpdate')?>';
var data=$('#form1').serialize();

  $.ajax({
   type:'ajax',
    method:'post',

     data:new FormData(this),
        
    url:url,
          contentType:false,
              cache:false,

        processData:false,
 
    async:false,
    success:function(response){
$('#form1')[0].reset();
       
            $('#myModal').modal('hide');
        show_data();

  
$('.alert-success').addClass('alert').html('Data Updated Successfully').fadeIn().delay(4000).fadeOut();


    },
    error:function(){
    $('.alert-danger').addClass('alert').html('Data not Updated Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
  });
  });
</script>

    @endsection('content')
 

@extends('admin/footer')