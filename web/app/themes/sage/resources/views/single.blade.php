@extends('layouts.app')
@section('content')
  @php setPostViews(get_the_ID()) @endphp
  {{--  @php echo getPostViews((int)get_the_ID()) @endphp--}}

  <div class="news-single">
    <div class="news-single__wrap">
      @include('partials.sidebar-news')
      <div class="news-single__main">
        <h1 class="title">Информцентр</h1>
        @while(have_posts()) @php the_post() @endphp
        <div class="news-content__time">{{ the_time('j.d.Y, H:i') }}</div>
        <h2 class="news-content__title">{{the_title()}}</h2>
        <div class="news-content__box">
          @if(has_post_thumbnail())
            <div class="news-content__img img"><a href="{{the_permalink()}}"><img src="{{the_post_thumbnail_url()}}"
                                                                                  alt="{{the_title()}}"></a></div>
          @endif
          <div class="news-content__text">{{ the_content() }}</div>
        </div>
      </div>
    </div>
  </div>
  @endwhile
@endsection
