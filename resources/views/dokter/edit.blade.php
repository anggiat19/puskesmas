@extends('layouts.master')
@section('title','obat')

@section('content')





<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-6">
            <h1>Dokter</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dokter</li>
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


                    <form action="/dokter/edit/{{ $dokters->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                                    <div class="modal-body">

                                      <div class="form-group">
                                        <label for="inputClientCompany">Kode Dokter</label>
                                        <input type="text" id="inputClientCompany" class="form-control" name="kode_d" value="{{ $dokters->kode_d }}">
                                      </div>
                                      <div class="form-group">
                                        <label for="inputClientCompany">Nama Dokter</label>
                                        <input type="text" id="inputClientCompany" class="form-control" name="nama_d" value="{{ $dokters->nama_d }}">
                                      </div>

                                      <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="jenis_kelamin">Jenis Kelamin<span
                                                    style="color:red">*</span></label>
                                            <select name="jenis_kel_d" class="form-control" id="jenis_kelamin" value='{{ $dokters->jenis_kel_d }}'
                                                required>

                                                <option value="L" {{ old('jenis_kel_d') == 'L' ? 'selected' : '' }}>
                                                    Laki-Laki
                                                </option>
                                                <option value="P" {{ old('jenis_kel_d') == 'P' ? 'selected' : '' }}>
                                                    Perempuan
                                                </option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <label for="inputDescription">Alamat</label>
                                        <textarea  id="inputDescription" class="form-control" rows="4" name="alamat_d" >{{ $dokters->alamat_d }}</textarea>
                                      </div>

                                      <div class="form-group">
                                        <label for="dokter_id">Spesialis Id<span style="color:red">*</span></label>
                                        <select name="spesialis_id" class="form-control" id="dokter_id" required
                                            autofocus >
                                            <option value="{{ $dokters->spesialis_id }}">Select Spesialis</option>
                                            @forelse ($spesialis as $item )
                                                <option value="{{$item->id }}"
                                                    {{ $item->id == old('spesialis_id') ? 'selected' : '' }}>
                                                    {{ $item->nama_spesialis }}</option>




                                            @empty
                                                <option value="" disabled>Tidak ada data</option>
                                            @endforelse


                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="inputClientCompany">image</label>
                                        <input type="file" id="inputClientCompany" class="form-control" name="image" value="{{ $dokters->image }}">
                                        <img src="{{ asset('images/'.$dokters->image) }}" alt="" height="200px" srcset="">
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
