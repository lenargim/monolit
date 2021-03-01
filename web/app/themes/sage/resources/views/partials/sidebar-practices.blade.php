<aside class="sidebar single-practices__sidebar">
  @include('searchform')
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
  @if($practices)
    <ul>
      @foreach($practices as $post)
        @php setup_postdata($post) @endphp
        <li class="sidebar__li" data-path="@php echo wp_make_link_relative( the_permalink() ) @endphp">
          <div class="sidebar__title">{{ the_title() }}</div>
          <div class="sidebar__block">
            @php
              $services = get_the_terms($post->ID, 'services');
            @endphp
            @if($services)
              <ul class="sidebar__sublist">
                @foreach($services as $service)
                  <li class="sidebar__subli"><a
                      href="@php echo(get_permalink() . '#' . $service->slug) @endphp">@php echo $service->name @endphp</a>
                  </li>
                @endforeach
              </ul>
            @endif
          </div>
        </li>
      @endforeach
      @php wp_reset_postdata() @endphp
    </ul>
  @endif
</aside>
