@extends('layouts.master')

@section('title','Tambah Rekam Pasien')
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
              <h3 class="card-title">Tambah Data ReqPasien</h3>

              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>

            <div class="card-body">
                <div class="form-group">
                    <label for="inputClientCompany">Nama</label>
                    <input type="text" id="inputClientCompany" class="form-control">
                  </div>
              <div class="form-group">
                <label for="inputName">Tanggal Daftar</label>
                <input type="date" id="inputName" class="form-control">
              </div>

              <div class="form-group">
                <label for="inputStatus">Nomor Antrian</label>
                <select class="form-control custom-select">
                  <option selected disabled>Select one</option>
                  <option>Antrian1</option>
                  <option>Antrian2</option>
                  <option>Antrian3</option>
                </select>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Nomor Asuransi</label>
                <input type="text" id="inputClientCompany" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputProjectLeader">Tanggal Lahir</label>
                <input type="date" id="inputProjectLeader" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Tempat Lahir</label>
                <input type="text" id="inputClientCompany" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Umur</label>
                <input type="text" id="inputClientCompany" class="form-control">
              </div>
              <div class="form-group">
                <label for="inputDescription">Alamat</label>
                <textarea id="inputDescription" class="form-control" rows="4"></textarea>
              </div>
              <div class="form-group">
                <label for="inputClientCompany">Nomor Telepon</label>
                <input type="text" id="inputClientCompany" class="form-control">
              </div>
              <label for="inputClientCompany">Jenis Kelamin</label>
              <div class="form-group clearfix">
                      <div class="icheck-success d-inline">
                        <input type="radio" name="r3" checked id="radioSuccess1">
                        <label for="radioSuccess1">Laki-Laki</label>
                      </div>
                      <div class="icheck-success d-inline">
                        <input type="radio" name="r3" id="radioSuccess2">
                        <label style="margin-left: 20px;" for="radioSuccess2">Perempuan</label>
                      </div>
                    </div>
                    <div class="form-group">
                <label for="inputDescription">Keluhan</label>
                <textarea id="inputDescription" class="form-control" rows="4"></textarea>
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

                  <button type="submit" class="btn btn-primary">Submit</button>

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
@endsection
