<div class="team-block">
  <h2 class="title">Команда</h2>
  <div class="container container_small">
    @php
      global $post;
          $args = [
            'post_type' => 'team-type',
            'orderby' => 'date',
            'numberposts' => -1
          ];
          $team = get_posts( $args );
    @endphp
    @if($team)
      <div class="team-block__wrap">
        <div class="team-block__slider">
          @foreach($team as $post)
            @php setup_postdata($post) @endphp
            <div class="team-block__postwrap">
              <div class="team-block__post">
                <div class="team-block__img img">
                  @if(has_post_thumbnail())
                    <img src="{{ the_post_thumbnail_url() }}" alt="{{ the_title() }}">
                  @else <img src="@asset('images/person-icon.png')" alt="{{ the_title() }}">
                  @endif
                </div>
                <div class="team-block__text">
                  <div class="team-block__title">@php the_title() @endphp</div>
                  <div class="team-block__spec">@php the_field('spec') @endphp</div>
                  <div class="team-block__education">@php the_field('education') @endphp</div>
                </div>
              </div>
            </div>
          @endforeach
          @php wp_reset_postdata() @endphp
        </div>
        <a href="/team" class="button button_blue team-block__button">Подробнее</a>
        @endif
      </div>
  </div>
