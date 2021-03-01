{{--
Template Name: О нас
--}}

@extends('layouts.app')

@section('content')
  <div class="about-content">
    <div class="container container_small">
      <div class="title">{{ the_title() }}</div>
      <div class="about-content__wrap">
        <div class="about-content__img img"><img src="{{ the_post_thumbnail_url() }}" alt="about"></div>
        {{ the_content() }}
      </div>
    </div>
  </div>
@endsection
