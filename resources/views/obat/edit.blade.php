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


                    <form action="/obat/edit/{{ $obats->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                                    <div class="modal-body">

                                      <div class="form-group">
                                        <label for="inputClientCompany">Kode Obat</label>
                                        <input type="text" id="inputClientCompany" class="form-control" name="kode_obat" value="{{ $obats->kode_obat }}">
                                      </div>
                                      <div class="form-group">
                                        <label for="inputClientCompany">Nama Obat</label>
                                        <input type="text" id="inputClientCompany" class="form-control" name="nm_obat" value="{{ $obats->nm_obat }}">
                                      </div>


                                      <div class="form-group">
                                        <label for="inputClientCompany">Satuan</label>
                                        <input type="text" id="inputClientCompany" class="form-control" name="satuan" value="{{ $obats->satuan }}">
                                      </div>

                                      <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="number"  min="0.00" max="10000000.00" step="0.01"  name="harga"
                                            class="form-control" id="harga"
                                            placeholder="Harga" value="{{ $obats->harga }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="dosis">Dosis</label>
                                        <textarea name="takaran" id="dosis" cols="10" rows="5" class="form-control">{{ $obats->takaran }}</textarea>
                                    </div>


                                      <div class="form-group">
                                        <label for="inputDescription">Deskripsi Obat</label>
                                        <textarea id="inputDescription" class="form-control" rows="4" name="stok">{{ $obats->stok }}</textarea>
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
                                        <input type="file" id="inputClientCompany" class="form-control" name="image" value="{{ $obats->image }}">
                                        <img src="{{ asset('images/'.$obats->image) }}" alt="" srcset="">
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
