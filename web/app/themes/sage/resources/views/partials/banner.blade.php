@if(have_rows('banner', 22))
  <div class="banner">
    @while(have_rows('banner', 22)) @php the_row() @endphp
    <div class="banner__item">
      <div class="banner__textwrap">
        <div class="banner__text">
          @if(!is_front_page())
            @if ( function_exists('yoast_breadcrumb') )
              <div class="banner__breadcrumbs">
                @php yoast_breadcrumb( '<p id="breadcrumbs">','</p>' ) @endphp
              </div>
            @endif
          @endif
          <h2 class="banner__title">@php the_sub_field('title') @endphp</h2>
          <p class="banner__desc">@php the_sub_field('desc') @endphp</p>
          <a class="banner__file" target="_blank" href="@php the_sub_field('file') @endphp">Download presentation</a>
        </div>
      </div>
      <div class="banner__bg img">
        @if(get_sub_field('img-bool'))
          <img src="@php the_sub_field('img') @endphp" alt="banner">
        @else
          <img src='@asset("images/banner.jpg")' alt="banner">
        @endif
      </div>
    </div>
    @endwhile
  </div>
@endif
