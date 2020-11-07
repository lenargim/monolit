@extends('layouts.app')
@section('content')
  @php setPostViews(get_the_ID()) @endphp
  @include('partials.banner')
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
        <div class="news-content__socials socials">
          <a class="social" href="//@php the_field( "facebook", 22 ) @endphp"><img src="@asset('images/facebook.svg')"
                                                                                   alt="facebook"></a>
          <a class="social" href="//@php the_field( "vk", 22 ) @endphp"><img src="@asset('images/vk.svg')"
                                                                             alt="vk"></a>
          <a class="social" href="//@php the_field( "ok", 22 ) @endphp"><img src="@asset('images/ok.svg')"
                                                                             alt="ok"></a>
          <a class="social" href="//@php the_field( "twitter", 22 ) @endphp"><img src="@asset('images/twitter.svg')"
                                                                                  alt="twitter"></a>
          <a class="social" href="//@php the_field( "instagram", 22 ) @endphp"><img
              src="@asset('images/instagram.svg')"
              alt="instagram"></a>
        </div>
        <a href="{{the_permalink()}}" class="news-content__button">Подробне >></a>
      </div>
    </div>
  </div>
  @endwhile
@endsection
