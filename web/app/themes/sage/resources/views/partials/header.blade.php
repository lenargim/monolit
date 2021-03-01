<header>
  <div class="container container_big">
    <div class="header">
      <div class="header__close hidden">
        <div class="header__close-line"></div>
        <div class="header__close-line"></div>
        <div class="header__close-line"></div>
      </div>
      <a class="header__logo" href="{{ home_url('/') }}">@include('icon::logo', ['class' => 'logo'])</a>
      <nav class="nav-primary">
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu(['theme_location' => 'primary_navigation', 'menu_class' => 'nav']) !!}
        @endif
      </nav>
    </div>
  </div>
  <div class="header__phone">
    @include('icon::phone', ['class' => 'header__phone-svg'])
    <a href="tel:@php the_field( "phone", 22 ) @endphp" class="header__phone-number">@php the_field( "phone", 22 ) @endphp</a>
  </div>
</header>
