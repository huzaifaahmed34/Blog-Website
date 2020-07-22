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
            <h1 class="m-0 text-dark">WeBLog</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
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
 <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner pt-4 pb-4">
                @php
                $qry=DB::table('newsletters')->count();
                @endphp
                <h3>{{$qry}}</h3>

                <p>Total Subscribers</p>
              </div>
              <div class="icon ">
                <i class="fa fa-users mt-3"></i>
              </div>
             
            </div>
          </div>
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-dark">
              <div class="inner pt-4 pb-4">
                 @php
                $qry=DB::table('posts')->where('is_deleted',0)->count();
                @endphp
                <h3>{{$qry}}</h3>

                <p>Total Posts</p>
              </div>
              <div class="icon ">
                <i class="fa fa-users mt-3"></i>
              </div>
             
            </div>
          </div>
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner pt-4 pb-4">
            @php
                $qry=DB::table('comments')->count();
                @endphp     <h3>{{$qry}}</h3>

                <p>Total Comments</p>
              </div>
              <div class="icon ">
                <i class="fa fa-users mt-3"></i>
              </div>
             
            </div>
          </div>
           <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-primary">
              <div class="inner pt-4 pb-4">
         @php
                $qry=DB::table('contact_us')->where('created_at',date('Y-m-d'))->count();
                @endphp     <h3>{{$qry}}</h3>

                <p>Today Queries</p>
              </div>
              <div class="icon ">
                <i class="fa fa-users mt-3"></i>
              </div>
             
            </div>
          </div>
       
             <!-- ./col -->
       
          </div>

          <!-- ./col -->
</div>

</div>
  
        <!-- /.row -->
      </div>
        <!-- Main row -->
    
              <!-- /.card-header -->
            
              <!-- /.card-body -->
           
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
     @endsection('content')
 

@extends('admin/footer')