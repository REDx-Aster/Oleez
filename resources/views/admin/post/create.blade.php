@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <!-- <h1 class="m-0">Создание поста</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.post.index')}}">Посты</a></li>
              <li class="breadcrumb-item active">Создание поста</li>
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
							<h3 class="card-title">Создание поста</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form action="{{route('admin.post.store')}}" method='POST' enctype="multipart/form-data">
							@csrf
							<div class="">
								<div class="card-body col-12 col-xl-8">
									<div class="form-group">
										<label>Название</label>
										<input type="text" class="form-control" name="title" placeholder="Название поста" value="{{old('title')}}">
										@error('title')
											<div class="text-danger">{{$message}}</div>
										@enderror
									</div>
								</div>
								<div class="card-body col-12 col-xl-8">
									<div class="form-group">
										<textarea name="content" id="summernote" cols="30" rows="30">
											{{old('content')}}
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
														{{$category->id == old('category_id') ? 'selected' : ''}}>{{$category->title}}</option>
												@endforeach
											</select>
											@error('category_id')
												<div class="text-danger">{{$message}}</div>
											@enderror
										</div>
									</div>
								</div>
								<div class="card-body col-6">
									<div class="col-md-6">
										<div class="form-group">
											<label>Тэги</label>
											<select class="select2" name="tag_ids[]" multiple="multiple" data-placeholder="Выберете тэги" style="width: 100%;">
												@foreach($tags as $tag)														
													<option {{is_array(old('tag_ids')) && in_array($tag->id,old('tag_ids')) ? 'selected' : ''}} value="{{$tag->id}}">{{$tag->title}}</option>
												@endforeach
											</select>
											@error('tag_ids')
												<div class="text-danger">{{$message}}</div>
											@enderror
										</div>
									</div>
								</div>
								<!-- <style>
									.card-footer::after{
										display: none;
									}
								</style> -->
								<div class="d-flex card-footer justify-content-between">
									<button type="submit" class="btn btn-primary">Добавить</button>									
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