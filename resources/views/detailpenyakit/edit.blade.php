@extends('layouts.master')
@section('title','detailpenyakit')

@section('content')





<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper container-fluid">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-6">
            <h1>Detailpenyakit</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Detailpenyakit</li>
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


                    <form action="/detailpenyakit/edit/{{ $detailpenyakits->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                                    <div class="modal-body">

                                      <div class="form-group">
                                        <label for="inputClientCompany">no urut</label>
                                        <input type="text" id="inputClientCompany" class="form-control" name="no_urut" value="{{ $detailpenyakits->no_urut   }}">
                                      </div>
                                      <div class="form-group">
                                        <label for="inputClientCompany">kondisi pasien</label>
                                        <input type="text" id="inputClientCompany" class="form-control" name="kondisi_pasien" value="{{ $detailpenyakits->kondisi_pasien }}">
                                      </div>

                                      <div class="form-group">
                                        <label for="dokter_id">Pemeriksaan Id<span style="color:red">*</span></label>
                                        <select name="pemeriksaan_id" class="form-control" id="dokter_id" required
                                            autofocus >
                                            <option value="{{ $detailpenyakits->pemeriksaan_id }}">{{ $detailpenyakits->pemeriksaan_id }}</option>
                                            @forelse ($pemeriksaans as $item )
                                                <option value="{{$item->id }}"
                                                    {{ $item->id == old('pemeriksaan_id') ? 'selected' : '' }}>
                                                    {{ $item->id }}</option>
                                            @empty
                                                <option value="" disabled>Tidak ada data</option>
                                            @endforelse


                                        </select>
                                    </div>

                                    <div class="form-group">
                                      <label for="dokter_id">Penyakit Id<span style="color:red">*</span></label>
                                      <select name="penyakit_id" class="form-control" id="dokter_id" required
                                          autofocus >
                                          <option value="{{ $detailpenyakits->penyakit_id }}">{{ $detailpenyakits->penyakit->nama_penyakit }}</option>
                                          @forelse ($penyakits as $item )
                                              <option value="{{$item->id }}"
                                                  {{ $item->id == old('penyakit_id') ? 'selected' : '' }}>
                                                  {{ $item->nama_penyakit }}</option>

                                          @empty
                                              <option value="" disabled>Tidak ada data</option>
                                          @endforelse


                                      </select>
                                  </div>

                                  <div class="form-group">
                                    <label for="dokter_id">Obat Id<span style="color:red">*</span></label>
                                    <select name="obat_id" class="form-control" id="dokter_id" required
                                        autofocus >
                                        <option value="{{ $detailpenyakits->obat_id }}">{{ $detailpenyakits->obat->nm_obat }}</option>
                                        @forelse ($obats as $item )
                                            <option value="{{$item->id }}"
                                                {{ $item->id == old('spesialis_id') ? 'selected' : '' }}>
                                                {{ $item->nm_obat }}</option>




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
