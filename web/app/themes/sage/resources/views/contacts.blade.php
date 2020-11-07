{{--
Template Name: Контакты
--}}

@extends('layouts.app')

@section('content')
  @include('partials.banner')
  <div class="contacts">
    <div class="container container_small">
      <div class="title">{{ the_title() }}</div>
      <div class="contacts__wrap">
        <div class="contacts__block">
          <div class="contacts__info">
            <div class="contacts__logo"><img src="{{the_post_thumbnail_url()}}" alt="logo"></div>
            <div class="contacts__item">
              @include('icon::geo', ['class' => 'contacts__icon'])
              <div class="contacts__box">
                <div class="contacts__title">Адрес:</div>
                <div class="contacts__data">@php the_field('address', 22) @endphp</div>
              </div>
            </div>
            <div class="contacts__item">
              @include('icon::phone-big', ['class' => 'contacts__icon'])
              <div class="contacts__box">
                <div class="contacts__title">Телефон:</div>
                <div class="contacts__data">@php the_field('phone', 22) @endphp
                  , @php the_field('phone2', 22) @endphp</div>
              </div>
            </div>
            <div class="contacts__item">
              @include('icon::mail', ['class' => 'contacts__icon'])
              <div class="contacts__box">
                <div class="contacts__title">E-mail:</div>
                <div class="contacts__data">@php the_field('email', 22) @endphp</div>
              </div>
            </div>
          </div>
          <div class="contacts__map">
            <iframe
              src="https://yandex.ru/map-widget/v1/?um=constructor%3A474be77216e073eccc4c85358b4819ca592e926049807f4eb6e829a088ed99c9&amp;source=constructor"
              width="576" height="500" frameborder="0"></iframe>
          </div>
        </div>
        @php $office = get_field('office_second', 22) @endphp
        @if($office)
          <div class="contacts__block">
            <div class="contacts__info">
              <div class="contacts__logo"><img src="@php echo $office['img']['url'] @endphp" alt="logo"></div>
              <div class="contacts__item">
                @include('icon::geo', ['class' => 'contacts__icon'])
                <div class="contacts__box">
                  <div class="contacts__title">Адрес:</div>
                  <div class="contacts__data">@php echo $office['address'] @endphp</div>
                </div>
              </div>
              <div class="contacts__item">
                @include('icon::phone-big', ['class' => 'contacts__icon'])
                <div class="contacts__box">
                  <div class="contacts__title">Телефон:</div>
                  <div class="contacts__data">@php echo $office['phone'] @endphp </div>
                </div>
              </div>
              <div class="contacts__item">
                @include('icon::mail', ['class' => 'contacts__icon'])
                <div class="contacts__box">
                  <div class="contacts__title">E-mail:</div>
                  <div class="contacts__data">@php echo $office['email'] @endphp</div>
                </div>
              </div>
            </div>
            <div class="contacts__map">
              <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A3d8439f899c51297ec460f03a830152f15c6aa0e7876b8d9b8acab4492f47ce9&amp;source=constructor" width="576" height="500" frameborder="0"></iframe>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection

