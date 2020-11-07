<aside class="sidebar single-practices__sidebar">
  @include('searchform')
  @php
    $popular_args = [
      'meta_query' => [
        'meta_value_num' => [
          'key' => 'views',
        ],
      ],
      'posts_per_page' => 3,
      'post_status' => 'publish',
      'orderby' => 'meta_value_num',
      'category_name' => 'news-ru',
      'order' => 'DESC'
    ];

    $last_args = [
      'orderby' => 'date',
      'posts_per_page' => 3,
      'post_status' => 'publish',
      'order' => 'DESC',
      'category_name' => 'news-ru',
    ];

    $all_args = [
      'orderby' => 'date',
      'posts_per_page' => 10,
      'post_status' => 'publish',
      'order' => 'DESC',
      'category_name' => 'news-ru',
    ];
    $popular_news = new WP_Query($popular_args);
    $last_news = new WP_Query($last_args);
    $all_news = new WP_Query($all_args);
  @endphp
  <ul>
    @if($all_news)
      <li class="sidebar__li">
        <div class="sidebar__title">Популярные новости</div>
        <div class="sidebar__block">
          <ul class="sidebar__sublist">
            @while($popular_news->have_posts()) @php $popular_news->the_post() @endphp
            <li class="sidebar__subli"><a href="{{the_permalink()}}">{{the_title()}}</a></li>
            @endwhile
            @php wp_reset_postdata() @endphp
          </ul>
        </div>
      </li>
      <li class="sidebar__li">
        <div class="sidebar__title">Последние новости</div>
        <div class="sidebar__block">
          <ul class="sidebar__sublist">
            @while($last_news->have_posts()) @php $last_news->the_post() @endphp
            <li class="sidebar__subli"><a href="{{the_permalink()}}">{{the_title()}}</a></li>
            @endwhile
          </ul>
        </div>
      </li>
      <li class="sidebar__li">
        <div class="sidebar__title">Архив новостей</div>
        <div class="sidebar__block">
          <ul class="sidebar__sublist">
            @while($all_news->have_posts()) @php $all_news->the_post() @endphp
            <li class="sidebar__subli"><a href="{{the_permalink()}}">{{the_title()}}</a></li>
            @endwhile
          </ul>
        </div>
      </li>
    @endif
    @php wp_reset_postdata() @endphp
  </ul>
</aside>
