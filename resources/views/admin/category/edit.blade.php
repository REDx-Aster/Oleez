@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		<!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<!-- <h1 class="m-0">Редактирование котегории</h1> -->
					</div><!-- /.col -->
					<div class="col-sm-12">
						<ol class="breadcrumb float-sm-left">
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
					<div class="col-12 col-xl-6">
						<div class="card card-primary">
							<div class="card-header">
								<h1 class="card-title m-0">Редактирование котегории</h1>
							</div>
							<!-- /.card-header -->
							<!-- form start -->
							<form action="{{route('admin.category.update', $category->id)}}" method='POST'>
								@csrf
								@method('PATCH')
								<div class="card-body">
									<div class="form-group">
										<label>Название</label>
										<input type="text" class="form-control" name="title" placeholder="Название категории" value="{{$category->title}}">
										@error('title')
											<div class="text-danger">Это поле необходимо заполнить</div>
										@enderror
									</div>
								</div>
								<!-- /.card-body -->
								<div class="d-flex card-footer justify-content-between">
									<button type="submit" class="btn btn-primary">Обновить</button>									
									<a href="{{route('admin.category.index')}}"><button type="button" class="btn btn-danger">Назад</button></a>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!-- /.row -->

				<!-- /.row (main row) -->
			</div><!-- /.container-fluid -->
		</section>
		<!-- /.content -->
	</div>
@endsection