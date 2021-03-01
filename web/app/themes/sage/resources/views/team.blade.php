{{--
Template Name: Команда (страница)
--}}

@extends('layouts.app')

@section('content')
  <div class="team-page">
    <h1 class="title">@php the_title() @endphp</h1>
    @php
      global $post;
        $args = [
      'post_type' => 'team-type',
      'numberposts' => -1,
      'published' => 'true'
        ];
        $team = get_posts($args)
    @endphp
    <div class="container container_small">
      <div class="team-page__wrap">
        @foreach($team as $post)
          @php setup_postdata($post) @endphp
          <div class="team-page__item">
            <div class="team-page__img">
              @if(has_post_thumbnail())
                <img src="{{ the_post_thumbnail_url() }}" alt="{{ the_title() }}">
              @else <img src="@asset('images/person-icon.png')" alt="{{ the_title() }}">
              @endif
            </div>
            <div class="team-page__title">{{the_title()}}</div>
            <span class="team-page__spec">@php the_field('spec') @endphp</span>
            <div class="team-page__education">@php the_field('education') @endphp</div>
            <div class="team-page__text">{{the_content()}}</div>
            <div class="team-page__arrow"><img src="@asset('images/practices-arrow.svg')" alt="arrow"></div>
          </div>
        @endforeach
        @php wp_reset_postdata() @endphp
      </div>
    </div>
  </div>
@endsection
