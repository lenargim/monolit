<!doctype html>
<html {!! get_language_attributes() !!}>
@include('partials.head')
<body @php body_class() @endphp>
@php do_action('get_header') @endphp
@include('partials.header')
<div class="wrap" role="document">
  <div class="content">
    <main class="main">
      @yield('content')
    </main>
    @if (App\display_sidebar())
      <aside class="sidebar">
        @include('partials.sidebar')
      </aside>
    @endif
  </div>
</div>
@php do_action('get_footer') @endphp

{{--@php $my_lang = pll_current_language() @endphp--}}
@php $my_lang = 'заглушка' @endphp
@if ( $my_lang == 'en' )
  @include('partials.footer-en')
@else
  @include('partials.footer')
@endif

@php wp_footer() @endphp
</body>
</html>
