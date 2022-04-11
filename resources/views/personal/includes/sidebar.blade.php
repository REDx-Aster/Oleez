  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Sidebar -->
    <div class="sidebar">
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<li class="nav-item text-center pb-3">
					<i></i>
					<a class="navbar-brand" href="{{ route('post.index') }}"><img src="{{asset('assets/images/Logo_1.svg')}}" alt="oleez"></a>
				</li>
				<li class="nav-item">
					<a href="{{route('personal.main.index')}}" class="nav-link">
					<i class="nav-icon fas fa-home"></i>
						<p>
						Главная
						</p>
					</a>
				</li>
				<li class="nav-item">
				<a href="{{route('personal.liked.index')}}" class="nav-link">
					<i class="nav-icon far fa-heart"></i>
					<p>
						Понравившиеся посты
					</p>
				</a>
				</li>
				<li class="nav-item">
					<a href="{{route('personal.comment.index')}}" class="nav-link">
						<i class="nav-icon far fa-comment"></i>
					<p>
						Коментарии
					</p>
				</a>
			</li>
			</ul>
      	</nav>
    </div>
    <!-- /.sidebar -->
  </aside>