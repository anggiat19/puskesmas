@extends('layouts.master')
@section('title','user')

@section('content')








  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper  container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-6">
            <h1>User</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">User</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <section class="content">
        <div class="card">
          <div class="card-header">
            <div class="float-right">
                @if( Auth::user()->role_id == 1 )
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
                                   <h5 class="modal-title" id="exampleModalLongTitle">Tambah Data User</h5>
                                   <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                                   </button>
                               </div>
                               <div class="modal-body">

                                <div class="form-group">
                                    <label for="inputClientCompany">Nama</label>
                                    <input type="text" id="inputClientCompany" class="form-control" name="username">
                                  </div>
                                  <div class="form-group">
                                    <label for="inputClientCompany">Password</label>
                                    <input type="password" id="inputClientCompany" class="form-control" name="password">
                                  </div>

                                  <div class="form-group">
                                    <label for="inputClientCompany">No hp</label>
                                    <input type="text" id="inputClientCompany" class="form-control" name="phone"                                                                                                                                                                                                                                                                                    >
                                  </div>
                                  <div class="form-group">
                                    <label for="inputClientCompany">Email</label>
                                    <input type="email" id="inputClientCompany" class="form-control" name="email"                                                                                                                                                                                                                                                                                    >
                                  </div>
                                  {{-- <div class="form-group mb-0">
                                    <label for="status">Status</label>
                                    <select name="status" id="status" class="form-control" required>
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>active
                                        </option>
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>inactive</option>
                                    </select>
                                </div> --}}

                                <div class="form-group">
                                  <label for="dokter_id">Role<span style="color:red">*</span></label>
                                  <select name="role_id" class="form-control" id="dokter_id" required
                                      autofocus>
                                      <option value="">Select Role</option>
                                      @forelse ($roles as $role)
                                          <option value="{{ $role->id }}"
                                              {{ $role->id == old('role_id') ? 'selected' : '' }}>
                                              {{ $role->name }}</option>
                                      @empty
                                          <option value="" disabled>Tidak ada data</option>
                                      @endforelse
                                  </select>
                              </div>
                              {{-- <div class="col-md-10"> --}}
                                <div class="form-group">
                                    <label for="jenis_kelamin">Status<span
                                            style="color:red">*</span></label>
                                    <select name="status" class="form-control" id="jenis_kelamin"
                                        required>
                                        <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>
                                            active
                                        </option>
                                        <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>
                                            inactive
                                        </option>
                                    </select>
                                </div>

                            {{-- </div> --}}
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
                @endif
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
                                    @if( Auth::user()->role_id == 1 )
                                    <th style="text-align: center">no</th>
                                    @endif
                                    <th style="text-align: center">nama</th>
                                    {{-- <th style="text-align: center">password</th> --}}

                                    <th style="text-align: center">Email</th>
                                    <th style="text-align: center">No Tlp</th>
                                    {{-- <th>image</th> --}}
                                    @if( Auth::user()->role_id == 1 )
                                    <th style="text-align: center">Status</th>
                                    <th style="text-align: center">Role</th>
                                    @endif
                                    <th style="text-align: center">Image</th>
                                    <th style="text-align: center">Aksi</th>
                                </tr>
                    </thead>
                    <tbody>
                                @foreach ($users as $user )
                                @if($user->id == Auth::user()->id || Auth::user()->role_id == 1 )
                                <tr>
                                    @if( Auth::user()->role_id == 1 )
                                    <td style="text-align: center">{{ $loop->iteration }}</td>
                                    @endif
                                    <td style="text-align: center">{{ $user->username }}</td>
                                    {{-- <td style="text-align: center">{{ $user->password }}</td> --}}

                                    <td style="text-align: center">{{ $user->email }}</td>
                                    <td style="text-align: center">{{ $user->phone }}</td>
                                    {{-- <td>

                                        <img src="{{ asset('images/'.$user->image) }}" height="100px" alt="">
                                    </td> --}}

                                    {{-- <td style="text-align: center">{{ $user->status }}</td> --}}
                                    @if( Auth::user()->role_id == 1 )
                                    <td style="text-align: center" class="project-state">
                                      <span class="badge badge-{{ $user->status ? 'success' : 'danger' }}">{{ $user->status ? 'active' : 'inactive' }}</span>
                                  </td>
                                    <td style="text-align: center">{{ $user->user->name }}</td>
                                    @endif
                                    <td style="text-align: center">
                                      {{-- <img src="{{ asset('storage/cover/'.$cover->image) }}" alt="" srcset="" width="200px"> --}}
                                      <img  src="{{ asset('images/'.$user->image) }}" width="200" alt="">
                                  </td>

                                    <td style="text-align: center">

                                        <a href="/user/edit/{{ $user->id }}" class="btn btn-success">Edit</a>
                                        <a href="/user/delete/{{ $user->id }}" class="btn btn-danger">Delete</a>
                                    </td>

                                </tr>
                                @endif

                                @endforeach
                    </tbody>


                            </table>
                            {{-- {{ $users->withQueryString()->links() }} --}}
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
