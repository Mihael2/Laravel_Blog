@extends('layouts.main')

@section('content')

<main class="blog-post">
    <div class="container">
        <h1 class="edica-page-title">{{ $post->title}}</h1>
        <p class="edica-blog-post-meta" data-aos-delay="200">{{ $date->format('F')}} • {{ $date->format('H:i')}} • {{ $post->comments->count()}} Comments</p>
        <section class="blog-post-featured-img" data-aos-delay="300">
            <img src="{{ asset('storage/' . $post->main_image)}}" alt="featured image" class="w-100">
        </section>
        <section class="post-content">
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    {!! $post->content !!}
                </div>
            </div>
        </section>
        <section class="py-3">
            @auth()
            <form action="{{ route('post.like.store', $post->id)}}" method="post">
                <span> {{$post->liked_users_count}}</span>
                @csrf
                <button type="submit" class="border-0 bg-transparent">
                    @if(auth()->user()->likedPosts->contains($post->id))
                    <i class="fa-solid fa-thumbs-up"></i>
                    @else
                    <i class="fa-solid fa-heart"></i>
                    @endif
                </button>
            </form>
            @endauth
            @guest()
            <div>
                <span> {{$post->liked_users_count}}</span>
                <i class="fa-solid fa-heart"></i>
            </div>
            @endguest
        </section>
        @if($relatedPosts->count() > 0)
        <section class="related-posts">
            <div class="row">
                <div class="col-lg-9 mx-auto">
                    <h2 class="section-title mb-4">Related Posts</h2>
                    <div class="row">
                        @foreach($relatedPosts as $relatedPost)
                        <div class="col-md-4 fetured-post blog-post" data-aos-delay="100">
                            <img src="{{ asset('storage/' . $post->preview_image)}}" alt="related post" class="post-thumbnail">
                            <p class="post-category">{{$relatedPost->category->title}}</p>
                            <a href="{{ route('post.show', $relatedPost->id)}}" class="blog-post-permalink">
                                <h6 class="blog-post-title">{{ $relatedPost->title}}</h6>
                            </a>
                        </div>
                        @endforeach
                    </div>
        </section>
        @endif
        <section class="comment-list mb-5">
            <h2 class="section-title mb-5">Comments({{ $post->comments->count()}})</h2>
            @foreach($post->comments as $comment)
            <div class="comment-text mb-3">
                <span class="username">
                    <div>{{
                            $comment->user->name}}
                    </div>
                    <span class="text-muted float-right">{{ $comment->dateAsCarbon->diffForHumans()}}</span>
                </span><!-- /.username -->
                {{ $comment->message}}
            </div>
            @endforeach
        </section>
        @auth()
        <section class="comment-section">
            <h2 class="section-title mb-5">Leave comment</h2>
            <form action="{{ route('post.comment.store', $post->id)}}" method="post">
                @csrf
                <div class="row">
                    <div class="form-group col-12">
                        <label for="comment" class="sr-only">Comment</label>
                        <textarea name="message" id="comment" class="form-control" placeholder="Write your comment" rows="10"></textarea>
                    </div>
                    <input type="hidden" name="post_id" value="{{ $post->id }}">
                </div>
                <div class="row">
                    <div class="col-12">
                        <input type="submit" value="Leave comment" class="btn btn-warning">
                    </div>
                </div>
            </form>
        </section>
        @endauth
    </div>
    </div>
    </div>
</main>

@endsection