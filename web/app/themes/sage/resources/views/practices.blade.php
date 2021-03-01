{{--
Template Name: Практики
--}}

@extends('layouts.app')

@section('content')
  <div class="practices-content">
    <div class="practices-content__wrap">
      @include('partials.sidebar-practices')
      <div class="practices-content__main">
        <div class="title">{{ the_title() }}</div>
        <div class="practices-content__loop">
          @php
            global $post;
              $args = [
                  'post_type' => 'practices',
                  'numberposts' => -1,
                  'post_status' => 'publish',
                  'orderby' => 'ID',
                  'order' => 'ASC',
              ];
            $practices = get_posts($args);
          @endphp
          @foreach($practices as $post)
            <a href="{{ the_permalink() }}" class="practices-content__item">
              <div class="practices-content__logo"><img src="{{ the_post_thumbnail_url() }}" alt="{{ the_title() }}">
              </div>
              <div class="practices-content__title">{{ the_title() }}</div>
              <div class="practices-content__block">
                @php
                  $services = get_the_terms($post->ID, 'services');
                @endphp
                @if($services)
                  <ul class="practices-content__sublist">
                    @foreach($services as $service)
                      <li class="practices-content__li">@php echo $service->name @endphp</li>
                    @endforeach
                  </ul>
                @endif
              </div>
            </a>
          @endforeach
          @php wp_reset_postdata() @endphp
        </div>
      </div>
    </div>
  </div>
@endsection
