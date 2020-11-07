<div class="informcenter">
  <div class="container container_small">
    <div class="title">Информцентр</div>
    @php
      global $post;
        $args = [
          'category_name' => 'news-ru',
          'orderby' => 'date'
        ];
        $news = get_posts( $args );
    @endphp
    @if($news)
      <div class="informcenter__wrap">
        <div class="informcenter__slider">
          @foreach($news as $post)
            @php setup_postdata($post) @endphp
            <div class="informcenter__postwrap">
              <a href="{{ the_permalink() }}" class="informcenter__post">
                <div class="informcenter__img img">
                  @if(has_post_thumbnail())
                    <img src="{{ the_post_thumbnail_url() }}" alt="{{ the_title() }}">
                  @else <img src="@asset('images/informcenter.jpg')" alt="{{ the_title() }}">
                  @endif
                </div>
                <div class="informcenter__title">@php the_title() @endphp</div>
                <div class="informcenter__excerpt">@php echo excerpt(10, 'arrows') @endphp</div>
              </a>
            </div>
          @endforeach
          @php wp_reset_postdata() @endphp
        </div>
        <a href="/news" class="button button_blue informcenter__button">Подробнее</a>
        @endif
      </div>
  </div>
</div>
