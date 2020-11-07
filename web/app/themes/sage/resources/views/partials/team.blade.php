<div class="team">
  <h2 class="title">Команда</h2>
  <div class="container container_small">
    @php
      global $post;
          $args = [
            'post_type' => 'team',
            'orderby' => 'date',
            'numberposts' => -1
          ];
          $team = get_posts( $args );
    @endphp
    @if($team)
      <div class="team__wrap">
        <div class="team__slider">
          @foreach($team as $post)
            @php setup_postdata($post) @endphp
            <div class="team__postwrap">
              <div class="team__post">
                <div class="team__img img">
                  @if(has_post_thumbnail())
                    <img src="{{ the_post_thumbnail_url() }}" alt="{{ the_title() }}">
                  @else <img src="@asset('images/person-icon.png')" alt="{{ the_title() }}">
                  @endif
                </div>
                <div class="team__text">
                  <div class="team__title">@php the_title() @endphp</div>
                  <div class="team__spec">@php the_field('spec') @endphp</div>
                  <div class="team__education">@php the_field('education') @endphp</div>
                </div>
              </div>
            </div>
          @endforeach
          @php wp_reset_postdata() @endphp
        </div>
        <a href="/team" class="button button_blue team__button">Подробнее</a>
        @endif
      </div>
  </div>
