@extends('layouts.master')

@section('title','Tambah Poli')
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
              <h3 class="card-title">Tambah Poli</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
            <div class="form-group">
                <label for="inputClientCompany">Kode Poli</label>
                <input type="text" id="inputClientCompany" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Nama Poli</label>
                <input type="text" id="inputClientCompany" class="form-control">
              </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
@endsection