@extends('admin/header')
@extends('admin/sidebar')

@section('content')

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
              <li class="breadcrumb-item ">View  Users</li>
               <li class="breadcrumb-item active">View Users</li>
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
              <h1 class="card-title">View Users</h1>
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
                      <th>Name</th>
                     
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


<!-- Delete Modal -->
<div id="deleteModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
           <h4 class="modal-title">Delete SubCategory</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body">
     Are You sure you want to delete this Subcategory
     
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
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
        <form id=form1 action="{{url('admin/SubCategoryUpdate')}}" method=POST enctype="multipart/form-data">
      <div class="modal-header">
           <h4 class="modal-title">Edit Categories</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
     
      </div>
      <div class="modal-body" >
    
        <input type="hidden" name="id">
        <div class="row"> 
        <div class="col-lg-12" >
       {{ csrf_field() }}     
     
       <input type="hidden" name="previousimage">

                      <div class="col-lg-12">
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
<div class="col-lg-12">
  <label>Enter SubCategory</label>
          <input type="text" class="form-control" id="name" name=name placeholder="Enter SubCategory Name">
           
           </div>
           <div >
              <input type="hidden" name="Subcategory_slug">
           </div>
           <div class="col-lg-12">
  <label>Enter Slug</label>
          <input type="text" class="form-control" id="slug" name=slug placeholder="Enter SubCategory Slug">
           
           </div>
        
           <div class="col-lg-12 mt-2">
              <label>Enter SubCategory Image</label>
           <input type="file" class="form-control" id="Subcategory_logo" name=Subcategory_logo placeholder="Enter SubCategory Name">
         </div>

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


</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<script>
  $(function(){
    show_data();
function show_data(){

    $.ajax({
      type:'ajax',
      method:'get',
 
      url:'<?php echo url('admin/SubCategoryShow')?>',
      async:false,
      dataType:'json',
       
      success:function(res){
        var html='';

      var sno=1;
var i;
 for ( i=0; i <res.length; i++) {

 html+='<tr>'+
            '<td>'+sno+'</td>'+
            '<td>'+res[i].name+'</td>'+
          
            '<td>'+res[i].category_name+'</td>'+
             '<td><img  src="{{asset("public/subcategories/")}}/'+res[i].logo+'"   width=100px height=100px</td>'+
            '<td><a href=javascript:; data='+res[i].id+' class=editdata><i class="fa fa-edit"></i></a> &nbsp;'+
            '<a href=javascript:; data='+res[i].id+'  class="deletedata text-danger"><i class="fa fa-trash"></i></a></td>'+
            '</tr>';
           sno++;
        
};
 $('#showdata').html(html);

        },
        });



      }



$('#showdata').on('click','.editdata',function (e) {

$('#myModal').modal('show'); 
var id=$(this).attr('data');

  var url='<?php echo url('admin/SubCategoryEdit/')?>/'+id+'';

  $.ajax({
    type:'ajax',
    method:'get',

    url:url,
    dataType:'json',
    async:false,
    success:function(response){

$('input[name=id]').val(response.id);

$('input[name=previousimage]').val(response.logo);
$('input[name=slug]').val(response.slug);

$('select[name=category_id]').val(response.category_id);
$('input[name=name]').val(response.name);
    },
    error:function(){
    $('.alert-danger').addClass('alert').html('Data not Found Successfully').fadeIn('slow').delay(4000).fadeOut('slow');
  
    }
  });
})



$('#showdata').on('click','.deletedata',function () {

$('#deleteModal').modal('show'); 

var id=$(this).attr('data');


$('#btnDelete').unbind().click(function(){
  var url='<?php echo url('admin/SubCategoryDelete/')?>/'+id+'';

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

 $('#form1').on('submit',function (e) {
  e.preventDefault();

var id=$('input[name=id]').val();


  var url='{{ url("admin/SubCategoryUpdate")}}';

  $.ajax({
   
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