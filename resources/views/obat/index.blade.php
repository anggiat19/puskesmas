@extends('layouts.master')

@section('title','obat')
@section('content')










  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-6">
            <h1>Obat</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Obat</li>
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
                <form action="" method="POST" role="form" id="quickForm" enctype="multipart/form-data">
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
                                   <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data Obat</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                                   </button>
                               </div>
                               <div class="modal-body">

                                <div class="form-group">
                                    <label for="inputClientCompany">Kode Obat</label>
                                    <input type="text" id="inputClientCompany" class="form-control" name="kode_obat">
                                  </div>
                                  <div class="form-group">
                                    <label for="inputClientCompany">Nama Obat</label>
                                    <input type="text" id="inputClientCompany" class="form-control" name="nm_obat">
                                  </div>


                                  <div class="form-group">
                                    <label for="inputClientCompany">Satuan</label>
                                    <input type="text" id="inputClientCompany" class="form-control" name="satuan">
                                  </div>

                                  <div class="form-group">
                                    <label for="harga">Harga</label>
                                    <input type="number"  min="0.00" max="10000000.00" step="0.01"  name="harga"
                                        class="form-control" id="harga" value="{{ old('harga') }}"
                                        placeholder="Harga" required>
                                </div>
                                <div class="form-group">
                                    <label for="dosis">Dosis</label>
                                    <textarea name="takaran" id="dosis" cols="10" rows="5" class="form-control">{{ old('dosis') }}</textarea>
                                </div>


                                  <div class="form-group">
                                    <label for="inputDescription">Deskripsi Obat</label>
                                    <textarea id="inputDescription" class="form-control" rows="4" name="stok"></textarea>
                                  </div>

                                  <div class="form-group mb-0">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Tersedia
                                        </option>
                                        <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Habis</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="inputClientCompany">image</label>
                                    <input type="file" id="inputClientCompany" class="form-control" name="image">
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
            <form class="form-inline ml-3" method="GET" action="/obat/index">
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
                                    <th style="text-align: center">kode_obat</th>

                                    <th style="text-align: center">nama_obat</th>
                                    <th style="text-align: center">satuan</th>
                                    <th style="text-align: center">Harga</th>
                                    <th style="text-align: center">Dosis</th>
                                    {{-- <th>image</th> --}}
                                    <th style="text-align: center">Deskripsi Obat</th>
                                    <th style="text-align: center">status</th>
                                    <th style="text-align: center">image</th>
                                    <th style="text-align: center">Aksi</th>
                                </tr>
                    </thead>
                    <tbody>
                                @foreach ($obats as $obat )
                                <tr>
                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                    <td style="text-align: center">{{ $obat->kode_obat }}</td>

                                    <td style="text-align: center">{{ $obat->nm_obat }}</td>
                                    <td style="text-align: center">{{ $obat->satuan }}</td>
                                    <td style="text-align: center">Rp.{{ $obat->harga }}</td>
                                    <td style="text-align: center">{{ $obat->takaran }}</td>
                                    <td style="text-align: center">{{ $obat->stok }}</td>
                                    {{-- <td style="text-align: center">{{ $obat->status }}</td> --}}

                                    <td style="text-align: center" class="project-state">
                                        <span class="badge badge-{{ $obat->status ? 'success' : 'danger' }}">{{ $obat->status ? 'Tersedia' : 'Habis' }}</span>
                                    </td>

                                    <td style="text-align: center">
                                        {{-- <img src="{{ asset('storage/cover/'.$cover->image) }}" alt="" srcset="" width="200px"> --}}
                                        <img  src="{{ asset('images/'.$obat->image) }}" width="200" alt="">
                                    </td>
                                    {{-- <td>

                                        <img src="{{ asset('images/'.$user->image) }}" height="100px" alt="">
                                    </td> --}}

                                     {{-- <td style="text-align: center">{{ $user->status }}</td>
                                    <td style="text-align: center">{{ $user->user->name }}</td> --}}
                                    <td style="text-align: center">

                                        <a href="#" class="btn btn-success">Edit</a>
                                        <a href="/obat/delete/{{ $obat->id }}" class="btn btn-danger">Delete</a>
                                    </td>

                                </tr>

                                @endforeach
                    </tbody>


                            </table>
                            {{ $obats->withQueryString()->links() }}
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
