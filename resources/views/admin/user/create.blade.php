@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-lg-12 mb-2">
            <!-- <h1 class="m-0">Добавление пользователя</h1> -->
          </div><!-- /.col -->
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-left">
              <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
              <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Пользователи</a></li>
              <li class="breadcrumb-item active">Добавление пользователя</li>
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
				<div class="col-12 col-lg-8">
					<div class="card card-primary">
						<div class="card-header">
						<h3 class="card-title">Данные пользователя</h3>
						</div>
						<!-- /.card-header -->
						<!-- form start -->
						<form action="{{route('admin.user.store')}}" method='POST'>
						@csrf
						<div class="card-body">
							<div class="form-group">
								<label>Имя</label>
								<input type="text" class="form-control" name="name" placeholder="Имя пользователя">
								@error('name')
									<div class="text-danger">{{$message}}</div>
								@enderror
							</div>
						</div>
						<div class="card-body">
							<div class="form-group">
								<label>Email</label>
								<input type="text" class="form-control" name="email" placeholder="Email">
								@error('email')
									<div class="text-danger">{{$message}}</div>
								@enderror
							</div>
						</div>
							
						<div class="card-body col-8">
							<div class="col-sm-8">
								<div class="form-group">
									<label>Выберите роль</label>
									<select name="role" class="form-control">
										@foreach($roles as $id=>$role)
											<option value="{{$id}}"
												{{$id == old('role') ? 'selected' : ''}}>{{$role}}</option>
										@endforeach
									</select>
									@error('role')
										<div class="text-danger">{{$message}}</div>
									@enderror
								</div>
							</div>
						</div>
						<!-- /.card-body -->
						<div class="d-flex card-footer justify-content-between">
							<button type="submit" class="btn btn-primary">Добавить</button>									
							<a href="{{route('admin.user.index')}}"><button type="button" class="btn btn-danger">Назад</button></a>
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