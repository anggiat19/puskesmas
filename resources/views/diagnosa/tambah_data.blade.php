@extends('layouts.master')

@section('title','Tambah Rekam Diagnosa')
@section('dashboard','active')

@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">

          <div class="col-sm-6">
            <h1>Tambah Data</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="/reqpasien/index">Home</a></li>
              <li class="breadcrumb-item active">Tambah Data</li>
              </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
        <!-- Main content -->
        <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title">Tambah Diagnosa</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
            <div class="form-group">
                <label for="inputClientCompany">Kode Diagnosa</label>
                <input type="text" id="inputClientCompany" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputStatus">Poli</label>
                <select class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>Poli1</option>
                  <option>Poli2</option>
                  <option>Poli3</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">Nama Pasien</label>
                <select class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>Pasien1</option>
                  <option>Pasien1</option>
                  <option>Pasien1</option>
                </select>
                <div class="form-group">
                <label for="inputStatus">Nama Dokter</label>
                <select class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>Dokter1</option>
                  <option>Dokter2</option>
                  <option>Dokter3</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputStatus">Nama Obat</label>
                <select class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>Obat1</option>
                  <option>Obat2</option>
                  <option>Obat3</option>
                </select>
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
@endsection