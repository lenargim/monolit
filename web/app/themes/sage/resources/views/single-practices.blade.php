@extends('layouts.app')

@section('content')
  @include('partials.banner')
  <div class="single-practices">
    <div class="single-practices__wrap">
      @include('partials.sidebar-practices')
      <div class="single-practices__main">
        <div class="title">{{ the_title() }}</div>
        <div class="single-practices__content">{{ the_content() }}</div>

        @php
          $services = get_the_terms($post->ID, 'services');
        @endphp
        @if($services)
          @foreach($services as $service)
            <div class="single-practices__item" id="@php echo $service->slug @endphp">
              <div class="single-practices__title">@php echo $service->name @endphp</div>
              <div class="single-practices__desc">@php the_field('service', $service) @endphp</div>
              <div class="single-practices__arrow"><img src="@asset('images/practices-arrow.svg')" alt="arrow"></div>
            </div>
          @endforeach
        @endif
      </div>
    </div>
  </div>
@endsection
