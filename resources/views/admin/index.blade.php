@extends('partials.admin_template')

@section('title-page')
    Dashboard
@endsection

@section('content')
<div class="container-fluid">
    <!-- Info boxes -->
    <div class="row">
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon text-bg-primary shadow-sm">
            <i class="bi bi-cart-fill"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Menu</span>
            <span class="info-box-number">
              {{$countMenu}}
            </span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon text-bg-danger shadow-sm">
            <i class="bi bi-cash"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Keuangan</span>
            <span class="info-box-number">{{$countKeuangan}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <!-- fix for small devices only -->
      <!-- <div class="clearfix hidden-md-up"></div> -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon text-bg-success shadow-sm">
            <i class="bi bi-archive"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Stok</span>
            <span class="info-box-number">{{$countStok}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
      <div class="col-12 col-sm-6 col-md-3">
        <div class="info-box">
          <span class="info-box-icon text-bg-warning shadow-sm">
            <i class="fas fa-shopping-basket"></i>
          </span>
          <div class="info-box-content">
            <span class="info-box-text">Pemesanan</span>
            <span class="info-box-number">{{$countPemesanan}}</span>
          </div>
          <!-- /.info-box-content -->
        </div>
        <!-- /.info-box -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
@endsection