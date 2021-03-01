@extends('layouts.app')

@section('content')
  <div class="search-block">
    <div class="container">
      <h1 class="title">Результаты поиска</h1>

      @if (!have_posts())
        <div class="alert alert-warning">
          {{ __('Извините, результатов не найдено', 'sage') }}
        </div>
        {!! get_search_form(false) !!}
      @endif

      @while(have_posts()) @php the_post() @endphp
      @include('partials.content-search')
      @endwhile

      {!! get_the_posts_navigation() !!}
    </div>
  </div>
@endsection
