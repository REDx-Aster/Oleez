@extends('personal.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Главная</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Главная</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
          <div class="col-xl-3 col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-info">
              <div class="inner">
                <h3>{{$data['likedPostsCount']}}</h3>
                <p>Понравившиеся посты</p>
              </div>
              <div class="icon">
                <i class="far fa-heart"></i>
              </div>
              <a href="{{route('personal.liked.index')}}" class="small-box-footer">Подробнее<i class="fas fa-arrow-circle-right ml-2"></i></a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-xl-3 col-lg-6 col-6">
            <!-- small box -->
            <div class="small-box bg-success">
              <div class="inner">
                <h3>{{$data['commentsCount']}}<sup style="font-size: 20px"></sup></h3>
                <p>Коментарии</p>
              </div>
              <div class="icon">
                <i class="nav-icon far fa-comment"></i>
              </div>
              <a href="{{route('personal.comment.index')}}" class="small-box-footer">Подробнее<i class="fas fa-arrow-circle-right ml-2"></i></a>
            </div>
          </div>
          <!-- ./col -->
        </div>
        <!-- /.row -->

        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection