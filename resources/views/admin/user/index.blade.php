@extends('admin.layouts.main')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Пользователи</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('admin.main.index')}}">Главная</a></li>
              <li class="breadcrumb-item active">Пользователи</li>
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
						<a href="{{route('admin.user.create')}}" type="button" class="btn btn-block btn-primary">Добавить</a>
					</div>
        </div>
        <!-- /.row -->
				<div class="row">
          <div class="col-12 col-xl-8">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>									
                    <tr>
                      <th>ID</th>
                      <th>Имя</th>
                      <th colspan="3" class="text-center">Действия</th>
                    </tr>
                  </thead>
                  <tbody>
										@foreach($users as $user)
                    <tr>
                      <td>{{$user->id}}</td>
                      <td>{{$user->name}}</td>
											<td class="text-center"><a href="{{route('admin.user.show', $user->id)}}"><i class="far fa-eye"></i></a></td>
											<td class="text-center"><a href="{{route('admin.user.edit', $user->id)}}" class="text-success"><i class="fas fa-pencil-alt"></i></a></td>
											<td class="text-center">
												<form action="{{route('admin.user.delete', $user->id)}}" method='POST'>
													@csrf
													@method('DELETE')
													<button type="submit" class="border-0 bg-transparent">
														<i class="fas fa-trash text-danger" role="button"></i>
													</button>
												</form>
											</td>
                    </tr>
										@endforeach
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