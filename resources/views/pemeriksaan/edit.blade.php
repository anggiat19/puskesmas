





@extends('layouts.master')
@section('title','pemeriksaan')

@section('content')





<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-6">
            <h1>Pemeriksaan</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Pemeriksaan</li>
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


                    <form action="/pemeriksaan/edit/{{ $pemeriksaans->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                                    <div class="modal-body">

                                      <div class="form-group">
                                        <label for="inputClientCompany">no periksa</label>
                                        <input type="text" id="inputClientCompany" class="form-control" name="no_periksa" value="{{ $pemeriksaans->no_periksa   }}">
                                      </div>
                                      <div class="form-group">
                                        <label for="inputClientCompany">tgl periksa</label>
                                        <input type="date" id="inputClientCompany" class="form-control" name="tgl_periksa" value="{{ $pemeriksaans->tgl_periksa }}">
                                      </div>

                                      <div class="form-group">
                                        <label for="dokter_id">Pasien Id<span style="color:red">*</span></label>
                                        <select name="pasien_id" class="form-control" id="dokter_id" required
                                            autofocus >
                                            <option value="{{ $pemeriksaans->pasien_id }}">{{ $pemeriksaans->pasien->nama_p }}</option>
                                            @forelse ($pasiens as $item )
                                                <option value="{{$item->id }}"
                                                    {{ $item->id == old('pasien_id') ? 'selected' : '' }}>
                                                    {{ $item->nama_p }}</option>
                                            @empty
                                                <option value="" disabled>Tidak ada data</option>
                                            @endforelse


                                        </select>
                                    </div>

                                    <div class="form-group">
                                      <label for="dokter_id">Dokter Id<span style="color:red">*</span></label>
                                      <select name="dokter_id" class="form-control" id="dokter_id" required
                                          autofocus >
                                          <option value="{{ $pemeriksaans->dokter_id }}">{{ $pemeriksaans->dokter->nama_d }}</option>
                                          @forelse ($dokters as $item )
                                              <option value="{{$item->id }}"
                                                  {{ $item->id == old('dokter_id') ? 'selected' : '' }}>
                                                  {{ $item->nama_d }}</option>

                                          @empty
                                              <option value="" disabled>Tidak ada data</option>
                                          @endforelse


                                      </select>
                                  </div>

                                  <div class="form-group">
                                    <label for="dokter_id">Karyawan Id<span style="color:red">*</span></label>
                                    <select name="karyawan_id" class="form-control" id="dokter_id" required
                                        autofocus >
                                        <option value="{{ $pemeriksaans->karyawan_id }}">{{ $pemeriksaans->karyawan->nama_kry }}</option>
                                        @forelse ($karyawans as $item )
                                            <option value="{{$item->id }}"
                                                {{ $item->id == old('karyawan_id') ? 'selected' : '' }}>
                                                {{ $item->nama_kry }}</option>




                                        @empty
                                            <option value="" disabled>Tidak ada data</option>
                                        @endforelse


                                    </select>
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

