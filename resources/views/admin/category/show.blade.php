@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 d-flex align-items-center">
            <!-- <h1 class="m-0 mr-4">{{$category->title}}</h1> -->
			<a class="text-success mr-3" href="{{route('admin.category.edit', $category->id)}}"><i class="fas fa-pencil-alt"></i></a>
			<form action="{{route('admin.category.delete', $category->id)}}" method='POST'>
				@csrf
				@method('DELETE')
				<button type="submit" class="border-0 bg-transparent">
					<i class="fas fa-trash text-danger" role="button"></i>
				</button>
			</form>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.category.index')}}">Категории</a></li>
              <li class="breadcrumb-item active">{{$category->title}}</li>
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
			<div class="col-3 mb-4">
				<a href="{{route('admin.category.index')}}" type="button" class="btn btn-block btn-primary">Назад</a>
			</div>
        </div>
        <!-- /.row -->
				<div class="row">
          <div class="col-12 col-xl-6">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">                
                  <tbody>
                    <tr>
                      <th>ID</th>
                      <td>{{$category->id}}</td>
                    </tr>
					<tr>
                      <th>Название</th>
                      <td>{{$category->title}}</td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
@endsection