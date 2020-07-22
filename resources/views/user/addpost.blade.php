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
              <li class="breadcrumb-item ">Add Post</li>
               <li class="breadcrumb-item active">Add Post</li>
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
              <h1 class="card-title">Add Post</h1>
            </div>
            <!-- /.card-header -->

            <div class="card-body">

            	<div class="col-lg-12  alert-success">
		
            	</div>
         
			<div class="col-lg-12  alert-danger">

            	</div>
        
 
                <form id="form1" action="<?php echo url('admin/InsertPost')?>"   method="POST" enctype="multipart/form-data">


                <div class="row">
 {{ csrf_field() }}                    <!---Form Start-->

                      <div class="col-lg-6">
                      <div class="form-group">
                   <label>Blog Category</label>

              <select  class="form-control" id="category_id" name=category_id placeholder="Enter Category Name" >
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
                 
  <label>Blog Title</label>
              <input   class="form-control title" id="title"  name=title placeholder="Enter Suitable Title" >
          
                </div>
              </div>
               <div class="col-lg-6">
                      
                      <div class="form-group">
                 
  <label>Keyword</label>
              <input   class="form-control title" id="keyword"  name=keyword placeholder="Enter Keywords" >
          
                </div>
              </div>

                     <div class="col-lg-6">
                      
                      <div class="form-group">
                 
  <label>Tags (Enter Tab to add tag)</label>
              <select multiple data-role="tagsinput"  class="form-control tags" id="tags"  name=tags placeholder="Enter Related Tags" >
                ></select> 

                </div>
              </div>
                    <div class="col-lg-6">
                      <div class="form-group">
                   <label>Blog Cover  Image &nbsp;<span style="color:red;" id=imageerror></span></label>

              <input type="file" class="form-control" id="logo" name=Post_logo >

                </div>
                    </div>
          <div class="col-lg-12">
                      <div class="form-group" >
                   <label>Short Description (Meta)<span id="shortdescriptionerror" class="text-danger"></span></label>

              <textarea type="text" class="form-control " id="shortdescription" name=shortdescription>
              </textarea>

                </div>
                    </div>
               <div class="col-lg-12">
                      <div class="form-group" >
                   <label>Blog Description <span id="descriptionerror" class="text-danger"></span></label>

              <textarea type="text" class="form-control textarea" rows=10 id="description" name=description placeholder="Enter Blog Description" value={{@$Post}}>
              </textarea>

                </div>
                    </div>
                
</div>
<div class="row">
                    <div class="col-lg-12 text-right mt-2">
                     <button type="submit" class="btn btn-info  "  value="Add" >
                    Add</button></div>

                </div>


                  </form>

                    <!---End Form-->
            </div>
            <!-- /.card-body -->
          </div>
        </div>
        </div>

      </div>
    </section>
  </div>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script>

  $(function(){
 
  
$('.textarea').summernote();


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
$('#form1').on('submit',function (e) {

  e.preventDefault(e);
	var data=$('#tags').val();
	var url='<?php echo url('admin/InsertPost')?>';

	$.ajax({
		type:'ajax',
		method:'post',
    data:new FormData(this),
       
          contentType:false,
              cache:false,

        processData:false,
		url:url,
		
		async:false,
		success:function(response){

			if(response.success){

$.ajax({
    type:'ajax',
    method:'get',
    data:{'data':data},
    url:'<?php echo url('admin/InsertTags')?>',
    
    async:false,
    success:function(response){

$('input').removeClass('is-invalid');
$('.textarea').html('');
 $('.note-editable').html('');
  $('#descriptionerror').html('');
$('.alert-success').addClass('alert').html('Data Inserted Successfully').fadeIn().delay(4000).fadeOut();
$('#form1')[0].reset();
$('.bootstrap-tagsinput span').remove();
}
});
			}
			if(response.error){

        




if('category_id' in response.error){
  
  $('#category_id').addClass('is-invalid');

      }
      else{
       $('#category_id').removeClass('is-invalid');
      }
      if('title' in response.error){
  
  $('#title').addClass('is-invalid');

      }
      else{
       $('#title').removeClass('is-invalid');
      }
      if('tags' in response.error){
  
  $('.bootstrap-tagsinput').attr('style','border:1px solid red');

      }
      else{
     $('.bootstrap-tagsinput').removeAttr('style','border:1px solid red');
      }
   
      if('Post_logo' in response.error){
  $('#logo').addClass('is-invalid');

      }
      else{
       $('#logo').removeClass('is-invalid');
      }
       if('keyword' in response.error){
  $('#keyword').addClass('is-invalid');

      }
      else{
       $('#keyword').removeClass('is-invalid');
      }
         if('description' in response.error){
  $('#descriptionerror').html('Description Should not be Empty');

      }
      else{
       $('#descriptionerror').html('');
      }
        if('shortdescription' in response.error){
  $('#shortdescriptionerror').html('Description Should not be Empty Or Maximum length Should Not Exceed 300 Characters');

      }
      else{
       $('#shortdescriptionerror').html('');
      }



}

		},
		error:function(){
		$('.alert-danger').addClass('alert').html('Data not Inserted Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
	
		}
	});

});
})
</script>
  
     @endsection('content')
 

@extends('admin/footer')