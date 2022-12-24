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


            </div>
            <form class="form-inline ml-3">

            </form>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div id="jsGrid1">



                            {{-- {{ $pasiens->withQueryString()->links() }} --}}


                    <form action="/pasien/edit/{{ $pasiens->id }}" method="POST">
                        @csrf
                        @method('PUT')
                                    <div class="modal-body">

                                     <div class="form-group">
                                         <label for="inputClientCompany">Kode Pasien</label>
                                         <input type="text" id="inputClientCompany" class="form-control" name="kode_p" value="{{ $pasiens->kode_p }}">
                                       </div>
                                       <div class="form-group">
                                         <label for="inputClientCompany">Nama Pasien</label>
                                         <input type="text" id="inputClientCompany" class="form-control" name="nama_p" value="{{ $pasiens->nama_p }}">
                                       </div>

                                       <div class="form-group">
                                         <label for="inputProjectLeader">Tanggal Lahir</label>
                                         <input type="date" id="inputProjectLeader" class="form-control" name="tgl_lahir_p" value="{{ $pasiens->tgl_lahir_p }}">
                                       </div>

                                       <div class="form-group">
                                         <label for="inputClientCompany">Nomor Telepon</label>
                                         <input type="text" id="inputClientCompany" class="form-control" name="telp_p" value="{{ $pasiens->telp_p }}">
                                       </div>
                                       <div class="form-group">
                                         <label for="inputDescription">Keluhan</label>
                                         <textarea type="text" id="inputDescription" class="form-control" rows="4" name="nama_kel_p" >{{ $pasiens->nama_kel_p }}</textarea>
                                       </div>

                                       <div class="form-group">
                                         <label for="inputDescription">Alamat</label>
                                         <textarea  id="inputDescription" class="form-control" rows="4" name="alamat_p" >{{ $pasiens->alamat_p }}</textarea>
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
                                                     <select name="jenis_kel_p" class="form-control" id="jenis_kelamin" value='{{ $pasiens->jenis_kel_p }}'
                                                         required>

                                                         <option value="L" {{ old('jenis_kel_p') == 'L' ? 'selected' : '' }}>
                                                             Laki-Laki
                                                         </option>
                                                         <option value="P" {{ old('jenis_kel_p') == 'P' ? 'selected' : '' }}>
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
