<form role="search" method="get" class="search-form" action="{{ esc_url( home_url( '/' ) ) }}">
  <label>
    <input type="search" class="search-field" placeholder="Поиск" value="{{ get_search_query() }}" name="s" />
  </label>
{{--  <input type="submit" class="search-submit" value="{{ esc_attr_x( 'Search', 'submit button' ) }}" />--}}
</form>
