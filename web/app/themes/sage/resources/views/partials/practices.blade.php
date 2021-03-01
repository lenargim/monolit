<div class="practices-block">
  <h2 class="title">Практики</h2>
  <div class="container container_big">
    <div class="practices-block__wrap">
      <div class="practices-block__tabs">
        @php
          global $post;
            $args = [
              'post_type' => 'practices',
              'numberposts' => -1,
              'published' => true,
              'orderby' => 'date',
              'order' => 'asc'
            ];
            $categories = get_posts($args)
        @endphp
        @foreach($categories as $post)
          @php setup_postdata($post) @endphp
          <div class="practices-block__tab"><img src="@php the_post_thumbnail_url() @endphp" class="tab-logo">
            <span>@php the_title() @endphp</span></div>
        @endforeach
      </div>
      <div class="practices-block__contentbox">
        @foreach($categories as $post)
        <div class="practices-block__content">
            <div class="practices-block__contentmain">
              <div class="practices-block__heading">{{ the_title() }}</div>
              <div class="practices-block__text">
                @while ( have_rows('mainpage') ) @php the_row() @endphp
                <ul>
                  <li>@php the_sub_field('item') @endphp;</li>
                </ul>
                @endwhile
              </div>
              <a href="@php the_permalink() @endphp" class="button button_gold practices-block__button">Подробнее</a>
            </div>
        </div>
        @endforeach
      </div>
    </div>
  </div>
  @php wp_reset_postdata() @endphp
</div>
