@extends('layouts.app')

@section('content')
  <div class="page404">
    <div class="container">
      <h1 class="title">Страницы не существует</h1>
      @if (!have_posts())
        <div class="alert alert-warning">
          Вернитесь на <a href="/"><strong>главную</strong></a> или воспользуйтесь поиском
        </div>
        {!! get_search_form(false) !!}
      @endif
    </div>
  </div>
@endsection
