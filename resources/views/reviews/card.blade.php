@section('css')
    <link href="{{ asset('css/show.css') }}" rel="stylesheet">
@endsection

<div class="card-body">
    @if(!empty($review->image))
        <div class='image-wrapper'><img class='book-image' src="{{ asset('storage/images/'.$review->image) }}"></div>
    @else
        <div class='image-wrapper'><img class='book-image' src="{{ asset('images/dummy.png') }}"></div>
    @endif
    <h2 class='h2'>本のタイトル</h2>
    <h3 class='h3 book-title'>{{ $review->title }}</h3>
    <h2 class='h2'>レビュー本文</h2>
    <p class='description'>
    {!! nl2br(e( $review->body )) !!}
    </p>
    <div class="card-body pt-0 pb-2 pl-3">
        <div class="card-text">
            <review-like
            :initial-is-liked-by='@json($review->isLikedBy(Auth::user()))'
            :initial-count-likes='@json($review->count_likes)'
            :authorized='@json(Auth::check())'
            endpoint="{{ route('reviews.like', ['review' => $review]) }}"
            >
            </review-like>
        </div>
    </div>

    @foreach($review->tags as $tag)
        @if($loop->first)
        <div class="card-body pt-0 pb-4 pl-3">
            <div class="card-text line-height">
        @endif
            <a href="{{ route('tags.show', ['name' => $tag->name]) }}" class="border p-1 mr-1 mt-1 text-muted">
                {{ $tag->hashtag }}
            </a>
        @if($loop->last)
            </div>
        </div>
        @endif
    @endforeach

</div>
