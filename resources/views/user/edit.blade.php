@extends('layouts.master')
@section('title','user')

@section('content')





<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper container-fluid">
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


            </div>
            <form class="form-inline ml-3">

            </form>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div id="jsGrid1">



                            {{-- {{ $pasiens->withQueryString()->links() }} --}}


                    <form action="/user/edit/{{ $users->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                                    <div class="modal-body">

                                     <div class="form-group">
                                         <label for="inputClientCompany">username</label>
                                         <input type="text" id="inputClientCompany" class="form-control" name="username" value="{{ $users->username }}">
                                       </div>

                                       <div class="form-group">
                                        <label for="inputClientCompany">Password</label>
                                        <input type="password" id="inputClientCompany" class="form-control" name="password" value="{{ $users->password }}">
                                      </div>

                                      <div class="form-group">
                                        <label for="inputClientCompany">Email</label>
                                        <input type="email" id="inputClientCompany" class="form-control" name="email" value="{{ $users->email }}">
                                      </div>

                                      <div class="form-group">
                                        <label for="inputClientCompany">Phone</label>
                                        <input type="text" id="inputClientCompany" class="form-control" name="phone" value="{{ $users->phone }}">
                                      </div>



                                      @if( Auth::user()->role_id == 1 )
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





                                      <div class="form-group">
                                        <label for="dokter_id">Role<span style="color:red">*</span></label>
                                        <select name="role_id" class="form-control" id="dokter_id" required
                                            autofocus >
                                            <option value="{{ $users->role_id }}">Select Role</option>
                                            @forelse ($roles as $item )
                                                <option value="{{$item->id }}"
                                                    {{ $item->id == old('spesialis_id') ? 'selected' : '' }}>
                                                    {{ $item->name }}</option>




                                            @empty
                                                <option value="" disabled>Tidak ada data</option>
                                            @endforelse


                                        </select>
                                    </div>
                                    @endif

                                    <div class="form-group">
                                        <label for="inputClientCompany">image</label>
                                        <input type="file" id="inputClientCompany" class="form-control" name="image" value="{{ $users->image }}">
                                        <img src="{{ asset('images/'.$users->image) }}" alt="" height="200px" srcset="">
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
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>



  </div>

          <section class="col-lg-7 connectedSortable">

@endsection
