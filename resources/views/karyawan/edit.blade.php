@extends('layouts.master')
@section('title','karyawan  ')

@section('content')





<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-6">
            <h1>Karyawan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Karyawan</li>
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


                    <form action="/karyawan/edit/{{ $karyawans->id }}" method="POST">
                        @csrf
                        @method('PUT')
                                    <div class="modal-body">

                                     <div class="form-group">
                                         <label for="inputClientCompany">Nik</label>
                                         <input type="text" id="inputClientCompany" class="form-control" name="nik" value="{{ $karyawans->nik }}">
                                       </div>

                                       <div class="form-group">
                                        <label for="inputClientCompany">Nama Karyawan</label>
                                        <input type="text" id="inputClientCompany" class="form-control" name="nama_kry" value="{{ $karyawans->nama_kry }}">
                                      </div>

                                      <div class="form-group">
                                        <label for="inputClientCompany">Alamat</label>
                                        <textarea type="text" id="inputClientCompany" class="form-control" name="alamat" value="">{{ $karyawans->alamat }}</textarea>
                                      </div>

                                      <div class="form-group">
                                        <label for="inputClientCompany">No Telpon</label>
                                        <input type="text" id="inputClientCompany" class="form-control" name="telpon" value="{{ $karyawans->telepon }}">
                                      </div>

                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin<span
                                                    style="color:red">*</span></label>
                                            <select name="jenis_kelamin" class="form-control" id="jenis_kelamin" value='{{ $karyawans->jenis_kelamin }}'
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
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </section>



  </div>

          <section class="col-lg-7 connectedSortable">

@endsection
