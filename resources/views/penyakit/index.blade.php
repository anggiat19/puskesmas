@extends('layouts.master')

@section('title','penyakit')
@section('content')






  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-6">
            <h1>Penyakit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Penyakit</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="card">
          <div class="card-header">
            <div class="float-right">
                <form action="" method="POST" role="form" id="quickForm">
                    @csrf
                <a href="" type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModalLong">
                    <em class="fas fa-plus"></em>
                   Tambah Data
                   </a>

                           <!-- Modal -->
                           <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                               <div class="modal-content">
                               <div class="modal-header">
                                   <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Penyakit</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                                   </button>
                               </div>
                               <div class="modal-body">

                                <div class="form-group">
                                    <label for="inputClientCompany">Nama Penyakit</label>
                                    <input type="text" id="inputClientCompany" class="form-control" name="nama_penyakit">
                                  </div>





                               </div>
                               <div class="modal-footer">
                                   <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                   <button type="submit" class="btn btn-primary">Save changes</button>
                               </div>
                               </div>
                           </div>
                           </div>
                </form>
            </div>
            <form class="form-inline ml-3">
                <div class="input-group input-group-sm">
                    <input class="form-control form-control-navbar" name="search" type="search" placeholder="Search"
                        aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-navbar" type="submit">
                            <em class="fas fa-search"></em>
                        </button>
                    </div>
                </div>
            </form>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div id="jsGrid1">

                <table class="table table-bordered " >
                    <thead>
                                <tr >
                                    <th style="text-align: center">no</th>
                                    <th style="text-align: center">nama_penyakit</th>


                                    <th style="text-align: center">Aksi</th>
                                </tr>
                    </thead>
                    <tbody>
                                @foreach ($penyakits as $penyakit )
                                <tr>
                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                    <td style="text-align: center">{{ $penyakit->nama_penyakit }}</td>

                                    {{-- <td>

                                        <img src="{{ asset('images/'.$user->image) }}" height="100px" alt="">
                                    </td> --}}


                                    <td style="text-align: center">

                                        <a href="#" class="btn btn-success">Edit</a>
                                        <a href="/penyakit/delete/{{ $penyakit->id }}" class="btn btn-danger">Delete</a>
                                    </td>

                                </tr>

                                @endforeach
                    </tbody>


                            </table>
                            {{ $penyakits->withQueryString()->links() }}
            </div>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>



  </div>
  <!-- /.content-wrapper -->



{{-- <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">User</a></li>
              <li class="breadcrumb-item active">Dashboard </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
    <div class=" card card-body">







    </div>
 --}}

        <!-- Small boxes (Stat box) -->
        {{-- <div class="row">
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>150</h3>

                <p>New Orders</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
              </div>
              <div class="icon">
                <i class="ion ion-stats-bars"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-warning">
              <div class="inner">
                <h3>44</h3>

                <p>User Registrations</p>
              </div>
              <div class="icon">
                <i class="ion ion-person-add"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-6">
            <!-- small box -->
            <div class="small-box bg-danger">
              <div class="inner">
                <h3>65</h3>

                <p>Unique Visitors</p>
              </div>
              <div class="icon">
                <i class="ion ion-pie-graph"></i>
              </div>
              <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div> --}}
        <!-- /.row -->
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-lg-7 connectedSortable">


@endsection
