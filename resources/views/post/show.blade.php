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
<main class="blog-post-single">
    <div class="container">
        <h1 class="post-title wow fadeInUp"></h1>
        <div class="row">

            <div class="col-md-8 blog-post-wrapper">
                <div class="post-header wow fadeInUp">
                    <!-- 'storage/' . -->
                    <img src="{{asset($post->main_image)}}" alt="blog post" class="post-featured-image">
                    <div class="d-flex justify-content-between">
                        <p class="post-date"> • {{$date->translatedFormat('F')}} {{$date->day}}, {{$date->year}} • {{$date->format('H:i')}} • {{$post->comments->count()}} Коментариев(-я) •</p>
                        @auth()
                        <form action="{{route('post.like.store', $post->id)}}" method="post">
                            @csrf
                            <span>{{$post->liked_users_count}}</span>
                            <button class="border-0 outline-0 bg-transparent like-button__outline-none" type="submit">
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
                </div>
                <div class="post-content wow fadeInUp">
                    <h4>{{$post->title}}</h4>
                    <p>{!! $post->content !!}</p>
                    <!-- <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.</p> -->
                    <!-- <blockquote class="blockquote wow fadeInUp">
                            <p>It’s safe to say that because of my unique professional experiences, I’ve tested out a lot of headphones.</p>
                        </blockquote>
                        <h5>The High-Quality Architecture Solutions from a Silicon Valley.</h4>
                        <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.</p>
                        <h5>Outdoor Work: a Designer’s Checklist for Every UX Project.</h4>
                        <p>Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum.</p> -->
                </div>
                <div class="post-tags wow fadeInUp">
                    @foreach($post->tags as $tag)
                    <a href="#!" class="post-tag">{{$tag->title}}</a>
                    @endforeach
                </div>
                <div class="post-navigation wow fadeInUp">
                    <button class="btn prev-post"> Prev Post</button>
                    <button class="btn next-post"> Next Post</button>
                </div>
                @auth()
                <section class="comment-list mb-6">
                    <h2 class="section-title mb-5" data-aos="fade-up">Коментарии ({{ $post->comments->count()}})</h2>
                    @foreach($post->comments as $comment)
                    <div class="comment-text mb-4">
                        <span class="username">
                            <div class="d-flex justify-content-between">
                                {{ $comment->user->name }}
                                <a href="{{route('personal.comment.edit', $comment->id)}}" class="text-success"><i class="fas fa-pencil-alt"></i></a>
                            </div>
                            <span class="text-muted float-right">
                                {{ $comment->dateAsCarbon->diffForHumans() }}
                            </span>
                        </span><!-- /.username -->
                        {{ $comment->message }}
                    </div>
                    @endforeach
                </section>
                <form class="oleez-comment-form mb-4" action="{{ route('post.comment.store', $post->id) }}" method="post">
                    @csrf
                    <!-- <div class="row">
							<div class="form-group col-md-6">
								<input type="text" class="oleez-input" id="fullName" name="fullName" required>
								<label for="fullName">*Full name</label>
							</div>
							<div class="form-group col-md-6">
								<input type="email" class="oleez-input" id="fullName" name="email" required>
								<label for="email">*Email</label>
							</div>
						</div> -->
                    <div class="row">
                        <div class="form-group col-12">
                            <label for="message">*Message</label>
                            <textarea name="message" id="message" rows="10" class="oleez-textarea" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-submit">Send</button>
                        </div>
                    </div>
                </form>
                @endauth
            </div>

            <div class="col-md-4">
                <div class="sidebar-widget wow fadeInUp">
                    <h5 class="widget-title">All Tags</h5>
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
                            <li><a href="#!">{{$post->category->title}}</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
