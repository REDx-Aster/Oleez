@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12 d-flex align-items-center">
            <h1 class="m-0 mr-4">{{$post->title}}</h1>
				<a href="{{route('admin.post.edit', $post->id)}}" class="text-success mr-3"><i class="fas fa-pencil-alt"></i></a>
				<form action="{{route('admin.post.delete', $post->id)}}" method='POST'>
					@csrf
					@method('DELETE')
					<button type="submit" class="border-0 bg-transparent">
						<i class="fas fa-trash text-danger" role="button"></i>
					</button>
				</form>
          </div><!-- /.col -->
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
              <li class="breadcrumb-item active">{{$post->title}}</li>
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
				<div class="col-12">
					<div class="card card-primary">
						<div class="card-header">
							<h3 class="card-title">Просмотр поста</h3>
						</div>
              			<form action="{{route('admin.post.update', $post->id)}}" method='POST' enctype="multipart/form-data">
						@csrf
						@method('PATCH')
                			<div class="" >
								<div class="card-body col-12 col-xl-8">
									<div class="form-group">
										<label>Название</label>
										<p class="pl-2">
											{{$post->title}}
										</p>
									</div>
                				</div>
								<div class="card-body col-12 col-xl-8">
									<label>Содержимое</label>
									<div class="form-group">
										<p class="pl-2">
											{!!$post->content!!}
										</p>
									</div>
								</div>
                				<!-- /.card-body -->
								<div class="card-body col-12 col-xl-8">
									<div class="form-group">
										<label for="exampleInputFile">Превью</label>
										<div class=" mb-3">
											<img class="add-image col-6" src="{{url('storage/'.$post->preview_image)}}" alt="preview_image">
										</div>
									</div>
								</div>
								<div class="card-body col-12 col-xl-8">
									<div class="form-group">
										<label for="exampleInputFile">Главное изображениие</label>
										<div class="mb-3 add-block">
											<img class="add-image col-6" src="{{url('storage/'.$post->main_image)}}" alt="main_image">
										</div>
									</div>
								</div>
								<div class="card-body col-8">
									<div class="col-sm-8">
										<div class="form-group">
											<label>Категория</label>
											<p class="pl-2">
												{!!$post->category->title!!}
											</p>
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="col-md-12">
										<div class="form-group">
											<label>Тэги</label>
											<style>
												.tag{
													background-color: #007bff;
													display: inline-block;
													color: #fff;
													padding: 10px;
												}
											</style>
											<div>
											@foreach($post->tags as $tag)
												<p class="tag">{{$tag->title}}</p>
											@endforeach
											</div>
										</div>
									</div>
								</div>
								<div class="d-flex card-footer justify-content-between">
									<a href="{{route('admin.post.index')}}"><button type="button" class="btn btn-danger">Назад</button></a>
								</div>
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