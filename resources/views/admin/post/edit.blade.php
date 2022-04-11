@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
  	<div class="content-wrapper">
    <!-- Content Header (Page header) -->
		<div class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
					<div class="col-sm-6">
						<!-- <h1 class="m-0">Редактирование поста</h1> -->
					</div><!-- /.col -->
					<div class="col-sm-12">
						<ol class="breadcrumb float-sm-left">
						<li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
						<li class="breadcrumb-item"><a href="{{route('admin.post.index')}}">Посты</a></li>
						<li class="breadcrumb-item active">Редактирование поста</li>
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
							<h3 class="card-title">Редактирование поста</h3>
						</div>
              			<form action="{{route('admin.post.update', $post->id)}}" method='POST' enctype="multipart/form-data">
						@csrf
						@method('PATCH')
                			<div class="" >
								<div class="card-body col-12 col-xl-8">
									<div class="form-group">
										<label>Название</label>
										<input type="text" class="form-control" name="title" placeholder="Название поста"
										value="{{$post->title}}">
										@error('title')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
                				</div>
								<div class="card-body col-12 col-xl-8">
									<div class="form-group">
										<textarea name="content" id="summernote" cols="30" rows="10">
											{{$post->content}}
										</textarea>
										@error('content')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
								</div>
                				<!-- /.card-body -->
								<div class="card-body col-12 col-xl-8">
									<div class="form-group">
										<label for="exampleInputFile">Добавить превью</label>
										<div class=" mb-3">
											<img class="add-image col-6" src="{{url('storage/'.$post->preview_image)}}" alt="preview_image">
										</div>
										<div class="input-group">
											<div class="custom-file">
												<input type="file" class="custom-file-input" name='preview_image'>
												<label class="custom-file-label">Выберите изображениие</label>
											</div>
											<div class="input-group-append">
												<span class="input-group-text">Загрузить</span>
											</div>
										</div>
										@error('preview_image')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
								</div>
								<div class="card-body col-12 col-xl-8">
									<div class="form-group">
									<label for="exampleInputFile">Добавить главное изображениие</label>
									<div class="mb-3 add-block">
										<img class="add-image col-6" src="{{url('storage/'.$post->main_image)}}" alt="main_image">
									</div>
									<div class="input-group">
										<div class="custom-file">
											<input type="file" class="custom-file-input" name='main_image'>
											<label class="custom-file-label">Выберите изображениие</label>
										</div>
										<div class="input-group-append">
											<span class="input-group-text">Загрузить</span>
										</div>
									</div>
										@error('main_image')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
								</div>
								<div class="card-body col-8">
									<div class="col-sm-8">
										<div class="form-group">
											<label>Выберите категорию</label>
											<select name="category_id" class="form-control">
												@foreach($categories as $category)
													<option value="{{$category->id}}"
														{{$category->id == $post->category_id ? 'selected' : ''}}>{{$category->title}}</option>
												@endforeach
											</select>
											@error('category_id')
											<div class="text-danger">{{$message}}</div>
										@enderror
										</div>
									</div>
								</div>
								<div class="card-body">
									<div class="col-md-12">
										<div class="form-group">
											<label>Тэги</label>
											<select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберете тэги" style="width: 100%;">
												@foreach($tags as $tag)														
													<option {{ is_array( $post->tags->pluck('id')->toArray() ) && in_array($tag->id,$post->tags->pluck('id')->toArray() ) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->title}}</option>
												@endforeach
											</select>
											@error('tag_ids')
											<div class="text-danger">{{$message}}</div>
										@enderror
										</div>
									</div>
								</div>
								<div class="d-flex card-footer justify-content-between">
									<button type="submit" class="btn btn-primary">Обновить</button>									
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