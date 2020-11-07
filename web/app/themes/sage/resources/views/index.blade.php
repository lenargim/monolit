@extends('layouts.app')

@section('content')
  @include('partials.banner')

  <div class="team-page">
    @php $postType = get_queried_object() @endphp
    <h1 class="title">@php echo $postType->labels->name @endphp</h1>
    @if (!have_posts())
      <div class="alert alert-warning">
        {{ __('Sorry, no results were found.', 'sage') }}
      </div>
      {!! get_search_form(false) !!}
    @endif
    <div class="container container_small">
      <div class="team-page__wrap">
        @while (have_posts()) @php the_post() @endphp
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

        @endwhile
      </div>
    </div>
  </div>
@endsection
