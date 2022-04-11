@extends('layouts.main')
@section('enter')
@auth
<li class="nav-item dropdown">
    <a class="nav-link dropdown-toggle" href="" id="blogDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Enter</a>
    <div class="dropdown-menu" aria-labelledby="blogDropdown">
        @if($user->role == 0)
        <a class="dropdown-item" href="{{ route('admin.main.index') }}">Admin</a>
        @endif
        <a class="dropdown-item" href="{{ route('personal.main.index') }}">Personal</a>
    </div>
</li>
@endauth
@endsection
@section('content')
<main class="blog-standard">
    <div class="container">
        <h1 class="oleez-page-title wow fadeInUp">Blog Standard</h1>
        <div class="row">
            <div class="col-md-8">
                @foreach($posts as $post)
                <article class="blog-post wow fadeInUp">
                    <a href="{{route('post.show', $post->id)}}" class="blog-post-permalink">
                        <!-- 'storage/' . -->
                        <img src="{{$post->preview_image}}" alt="blog post" class="post-thumbnail">
                    </a>
                    <div class="d-flex justify-content-between">
                        <p class="blog-post-category">{{$post->category->title}}</p>
                        @auth()
                        <form action="{{route('post.like.store', $post->id)}}" method="post">
                            @csrf
                            <span>{{$post->liked_users_count}}</span>
                            <button class="like-button__outline-none border-0 outline-0 bg-transparent" type="submit">
                                @if(auth()->user()->LikedPosts->contains($post->id))
                                <i class="fas fa-heart"></i>
                                @else
                                <i class="far fa-heart"></i>
                                @endif
                            </button>
                        </form>
                        @endauth
                        @guest()
                        <div class="">
                            <span>{{$post->liked_users_count}}</span>
                            <i class="far fa-heart"></i>
                        </div>
                        @endguest
                    </div>
                    <h4 class="post-title">{{$post->title}}</h4>
                    <!-- <p class="post-excerpt">Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.</p> -->
                    <a href="{{route('post.show', $post->id)}}" class="post-permalink">READ MORE</a>
                </article>
                @endforeach
                <div class="row">
                    <div class="mx-auto">
                        {{$posts->links()}}
                    </div>
                </div>
                <!-- <nav class="oleez-pagination wow fadeInUp">

					{{$posts->links()}}
					<a href="#!" class="active">01</a>
					<a href="#!">02</a>
					<a href="#!">03</a>
					<a href="#!" class="next">&rarr;</a>
				</nav> -->
            </div>
            <div class="col-md-4">
                <div class="sidebar-widget wow fadeInUp">
                    <h5 class="widget-title">Tags</h5>
                    <div class="widget-content">
                        @foreach($tags as $tag)
                        <a href="#!" class="post-tag">{{$tag->title}}</a>
                        @endforeach
                    </div>
                </div>
                <!-- <div class="sidebar-widget wow fadeInUp">
					<h5 class="widget-title">Share</h5>
					<div class="widget-content">
						<nav class="social-links">
							<a href="#!">Fb</a>
							<a href="#!">Tw</a>
							<a href="#!">In</a>
							<a href="#!">Be</a>
						</nav>
					</div>
				</div> -->
                <!-- <div class="sidebar-widget wow fadeInUp">
					<h5 class="widget-title">Gallery</h5>
					<div class="widget-content">
						<div class="gallery">
							<a href="assets/images/Blogstandard/Blogstandard_@2x.jpg" class="gallery-grid-item" data-fancybox="widget-gallery">
								<img src="assets/images/Blogstandard/Blogstandard_@2x.jpg" alt="gallery item">
							</a>
							<a href="assets/images/Blogstandard/Blogstandard_@2x.jpg" class="gallery-grid-item" data-fancybox="widget-gallery">
								<img src="assets/images/Blogstandard/Blogstandard_@2x.jpg" alt="gallery item">
							</a>
							<a href="assets/images/Blogstandard/Blogstandard_@2x.jpg" class="gallery-grid-item" data-fancybox="widget-gallery">
								<img src="assets/images/Blogstandard/Blogstandard_@2x.jpg" alt="gallery item">
							</a>
							<a href="assets/images/Blogstandard/Blogstandard_@2x.jpg" class="gallery-grid-item" data-fancybox="widget-gallery">
								<img src="assets/images/Blogstandard/Blogstandard_@2x.jpg" alt="gallery item">
							</a>
							<a href="assets/images/Blogstandard/Blogstandard_@2x.jpg" class="gallery-grid-item" data-fancybox="widget-gallery">
								<img src="assets/images/Blogstandard/Blogstandard_@2x.jpg" alt="gallery item">
							</a>
							<a href="assets/images/Blogstandard/Blogstandard_@2x.jpg" class="gallery-grid-item" data-fancybox="widget-gallery">
								<img src="assets/images/Blogstandard/Blogstandard_@2x.jpg" alt="gallery item">
							</a>
							<a href="assets/images/Blogstandard/Blogstandard_@2x.jpg" class="gallery-grid-item" data-fancybox="widget-gallery">
								<img src="assets/images/Blogstandard/Blogstandard_@2x.jpg" alt="gallery item">
							</a>
							<a href="assets/images/Blogstandard/Blogstandard_@2x.jpg" class="gallery-grid-item" data-fancybox="widget-gallery">
								<img src="assets/images/Blogstandard/Blogstandard_@2x.jpg" alt="gallery item">
							</a>
							<a href="assets/images/Blogstandard/Blogstandard_@2x.jpg" class="gallery-grid-item" data-fancybox="widget-gallery">
								<img src="assets/images/Blogstandard/Blogstandard_@2x.jpg" alt="gallery item">
							</a>
							<a href="assets/images/Blogstandard/Blogstandard_@2x.jpg" class="gallery-grid-item" data-fancybox="widget-gallery">
								<img src="assets/images/Blogstandard/Blogstandard_@2x.jpg" alt="gallery item">
							</a>
							<a href="assets/images/Blogstandard/Blogstandard_@2x.jpg" class="gallery-grid-item" data-fancybox="widget-gallery">
								<img src="assets/images/Blogstandard/Blogstandard_@2x.jpg" alt="gallery item">
							</a>
							<a href="assets/images/Blogstandard/Blogstandard_@2x.jpg" class="gallery-grid-item" data-fancybox="widget-gallery">
								<img src="assets/images/Blogstandard/Blogstandard_@2x.jpg" alt="gallery item">
							</a>
						</div>
					</div>
				</div> -->
                <div class="sidebar-widget wow fadeInUp">
                    <h5 class="widget-title">Categories</h5>

                    <div class="widget-content">
                        <ul class="category-list">
                            @foreach($categories as $category)
                            <li><a href="#!">{{$category->title}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</main>
@endsection
