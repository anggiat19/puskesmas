@extends('layouts.master')
@section('title','pasien')

@section('content')









  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-6">
            <h1>Pasien</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pasien</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <div class="row">

        <div class="col-3">
            @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
            @if(Session::has('status'))
                    {{-- <div class="alert alert-danger" >
                        {{ Session::get('message') }}
                    </div> --}}
                    @endif
        </div>
    </div>

    <section class="content">
        <div class="card">
          <div class="card-header">
            <div class="float-right">
                {{-- <a href="{{ route('pasien.tambah_data') }}" class="btn btn-success">
                    <em class="fas fa-plus"></em>
                    Tambah Data
                </a> --}}

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

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
                                   <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Pasien</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                                   </button>
                               </div>
                               <div class="modal-body">

                                <div class="form-group">
                                    <label for="inputClientCompany">Kode Pasien</label>
                                    <input type="text" id="inputClientCompany" class="form-control" name="kode_p">
                                  </div>
                                  <div class="form-group">
                                    <label for="inputClientCompany">Nama Pasien</label>
                                    <input type="text" id="inputClientCompany" class="form-control" name="nama_p">
                                  </div>

                                  <div class="form-group">
                                    <label for="inputProjectLeader">Tanggal Lahir</label>
                                    <input type="date" id="inputProjectLeader" class="form-control" name="tgl_lahir_p">
                                  </div>

                                  <div class="form-group">
                                    <label for="inputClientCompany">Nomor Telepon</label>
                                    <input type="text" id="inputClientCompany" class="form-control" name="telp_p">
                                  </div>
                                  <div class="form-group">
                                    <label for="inputDescription">Keluhan</label>
                                    <textarea id="inputDescription" class="form-control" rows="4" name="nama_kel_p"></textarea>
                                  </div>

                                  <div class="form-group">
                                    <label for="inputDescription">Alamat</label>
                                    <textarea id="inputDescription" class="form-control" rows="4" name="alamat_p"></textarea>
                                  </div>

                                  {{-- <label for="inputClientCompany">Jenis Kelamin</label>
                                  <div class="form-group clearfix">
                                          <div class="icheck-success d-inline">
                                            <input type="radio" name="r3" checked id="radioSuccess1">
                                            <label for="radioSuccess1">Laki-Laki</label>
                                          </div>
                                          <div class="icheck-success d-inline">
                                            <input type="radio" name="r3" id="radioSuccess2">
                                            <label style="margin-left: 20px;" for="radioSuccess2">Perempuan</label>
                                          </div>
                                        </div> --}}

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="jenis_kelamin">Jenis Kelamin<span
                                                        style="color:red">*</span></label>
                                                <select name="jenis_kel_p" class="form-control" id="jenis_kelamin"
                                                    required>
                                                    <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected' : '' }}>
                                                        Laki-Laki
                                                    </option>
                                                    <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected' : '' }}>
                                                        Perempuan
                                                    </option>
                                                </select>
                                            </div>
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
            @if (Auth::user()->role_id == 1)
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
            @endif
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div id="jsGrid1">

                {{-- @if (Auth::user()->role_id == 1) --}}
                <table class="table table-bordered " >
                    <thead>
                                <tr >
                                    <th style="text-align: center">no</th>
                                    <th style="text-align: center">kode_P</th>
                                    <th style="text-align: center">nama_P</th>
                                    <th style="text-align: center">jenis_kel_p</th>
                                    <th style="text-align: center">tgl_lahir_p</th>
                                    <th style="text-align: center">telp_p</th>
                                    <th style="text-align: center">alamat_p</th>
                                    <th style="text-align: center">nama_kel_p</th>
                                    <th style="text-align: center">Aksi</th>
                                </tr>
                    </thead>

                    <tbody>
                                @foreach ($pasiens as $pasien )

                                @if($pasien->user_id == Auth::user()->id || Auth::user()->role_id == 1 )
                                <tr>
                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                    <td style="text-align: center">{{ $pasien->kode_p }}</td>
                                    <td style="text-align: center">{{ $pasien->nama_p }}</td>
                                    <td style="text-align: center">{{ $pasien->jenis_kel_p }}</td>
                                    <td style="text-align: center">{{ $pasien->tgl_lahir_p }}</td>
                                    <td style="text-align: center">{{ $pasien->telp_p }}</td>
                                    <td style="text-align: center">{{ $pasien->alamat_p }}</td>
                                    <td style="text-align: center">{{ $pasien->nama_kel_p }}</td>


                                    <td style="text-align: center">

                                        <a href="/pasien/edit/{{ $pasien->id }}" class="btn btn-success">Edit</a>
                                        <a href="/pasien/delete/{{ $pasien->id }}" class="btn btn-danger">Delete</a>


                                    </td>

                                </tr>
                                @endif


                                @endforeach
                    </tbody>


                            </table>
                            {{ $pasiens->withQueryString()->links() }}
                            {{-- @endif --}}

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
