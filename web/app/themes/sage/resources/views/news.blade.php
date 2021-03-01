{{--
Template Name: Новости
--}}

@extends('layouts.app')

@section('content')
  <div class="news-content">
    <div class="news-content__wrap">
      @include('partials.sidebar-news')
      <div class="news-content__main">
        <h1 class="title">{{ the_title() }}</h1>
        <div class="news-content__loop">
          @php
            $all_args = [
              'orderby' => 'date',
              'posts_per_page' => 10,
              'post_status' => 'publish',
              'order' => 'DESC',
              'category_name' => 'news-ru',
            ];
            $all_news = new WP_Query($all_args);
          @endphp
          @while($all_news->have_posts()) @php $all_news->the_post() @endphp
          <div class="news-content__item">
            <div class="news-content__time">{{ the_time('j.m.Y, H:i') }}</div>
            <h2 class="news-content__title">{{the_title()}}</h2>
            <div class="news-content__box">
              @if(has_post_thumbnail())
                <div class="news-content__img img"><a href="{{the_permalink()}}"><img src="{{the_post_thumbnail_url()}}"
                                                                                      alt="{{the_title()}}"></a></div>
              @endif
              <div class="news-content__text">@php echo excerpt(40, 'dots') @endphp</div>
            </div>
            <a href="{{the_permalink()}}" class="news-content__button">Подробне >></a>
          </div>
          @endwhile
          @php wp_reset_postdata() @endphp
        </div>
      </div>
    </div>
  </div>
@endsection
