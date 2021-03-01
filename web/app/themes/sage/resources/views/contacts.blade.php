{{--
Template Name: Контакты
--}}

@extends('layouts.app')

@section('content')
  <div class="contacts-page">
    <div class="container container_small">
      <div class="title">{{ the_title() }}</div>
      <div class="contacts-page__wrap">
        <div class="contacts-page__block">
          <div class="contacts-page__info">
            <div class="contacts-page__logo"><img src="{{the_post_thumbnail_url()}}" alt="logo"></div>
            <div class="contacts-page__item">
              @include('icon::geo', ['class' => 'contacts-page__icon'])
              <div class="contacts-page__box">
                <div class="contacts-page__title">Адрес:</div>
                <div class="contacts-page__data">@php the_field('address', 22) @endphp</div>
              </div>
            </div>
            <div class="contacts-page__item">
              @include('icon::phone-big', ['class' => 'contacts-page__icon'])
              <div class="contacts-page__box">
                <div class="contacts-page__title">Телефон:</div>
                <div class="contacts-page__data"><a href="tel:@php the_field('phone', 22) @endphp">@php the_field('phone', 22) @endphp</a>,
                  <a href="tel:@php the_field('phone2', 22) @endphp">@php the_field('phone2', 22) @endphp</a></div>
              </div>
            </div>
            <div class="contacts-page__item">
              @include('icon::mail', ['class' => 'contacts-page__icon'])
              <div class="contacts-page__box">
                <div class="contacts-page__title">E-mail:</div>
                <div class="contacts-page__data"><a href="mailto:@php the_field('email', 22) @endphp">@php the_field('email', 22) @endphp</a></div>
              </div>
            </div>
          </div>
          <div class="contacts-page__map">
            <iframe
              src="https://yandex.ru/map-widget/v1/?um=constructor%3A474be77216e073eccc4c85358b4819ca592e926049807f4eb6e829a088ed99c9&amp;source=constructor"
              width="100%" height="500" frameborder="0" scroll=false"></iframe>
          </div>
        </div>
        @php $office = get_field('office_second', 22) @endphp
        @if($office)
          <div class="contacts-page__block">
            <div class="contacts-page__info">
              <div class="contacts-page__logo"><img src="@php echo $office['img']['url'] @endphp" alt="logo"></div>
              <div class="contacts-page__item">
                @include('icon::geo', ['class' => 'contacts-page__icon'])
                <div class="contacts-page__box">
                  <div class="contacts-page__title">Адрес:</div>
                  <div class="contacts-page__data">@php echo $office['address'] @endphp</div>
                </div>
              </div>
              <div class="contacts-page__item">
                @include('icon::phone-big', ['class' => 'contacts-page__icon'])
                <div class="contacts-page__box">
                  <div class="contacts-page__title">Телефон:</div>
                  <div class="contacts-page__data">@php echo $office['phone'] @endphp </div>
                </div>
              </div>
              <div class="contacts-page__item">
                @include('icon::mail', ['class' => 'contacts-page__icon'])
                <div class="contacts-page__box">
                  <div class="contacts-page__title">E-mail:</div>
                  <div class="contacts-page__data"><a href="mailto:@php echo $office['email'] @endphp">@php echo $office['email'] @endphp</a></div>
                </div>
              </div>
            </div>
            <div class="contacts-page__map">
              <iframe src="https://yandex.ru/map-widget/v1/?um=constructor%3A3d8439f899c51297ec460f03a830152f15c6aa0e7876b8d9b8acab4492f47ce9&amp;source=constructor" width="100%" height="500" frameborder="0" scroll=false"></iframe>
            </div>
          </div>
        @endif
      </div>
    </div>
  </div>
@endsection

