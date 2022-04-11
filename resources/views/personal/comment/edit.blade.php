@extends('personal.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Коментарии</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item">Коментарии</li>
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
							<h3 class="card-title">Изменить</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form action="{{route('personal.comment.update', $comment->id)}}" method='POST'>
							@csrf
							@method('PATCH')
							<div class="card-body">
							<div class="form-group">
								<label>Содержимое</label>
								<textarea class="form-control" name="message" cols="30" rows="10">{{$comment->message}}</textarea>
								@error('message')
									<div class="text-danger">Это поле необходимо заполнить</div>
								@enderror
							</div>
							</div>
							<!-- /.card-body -->
							<div class="card-footer">
							<button type="submit" class="btn btn-primary">Обновить</button>
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