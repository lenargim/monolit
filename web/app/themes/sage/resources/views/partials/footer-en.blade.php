<footer class="footer">
  <div class="footer__call">En: Для консультации позвоните нам по телефону:
    <a href="tel:@php the_field( "phone", 22 ) @endphp">
      <strong>@php the_field( "phone", 22 ) @endphp</strong>
    </a>
  </div>
  <div class="container">
    <div class="footer__wrap">
      <a class="logo" href="{{ home_url('/') }}">@include('icon::logo', ['class' => 'logo footer__logo'])</a>
      <div class="footer__text">
        <div class="footer__desc">Достижение целей клиентов и повышение эффективности их бизнеса путем предоставления профессиональных стратегических консультаций. Решение текущих задач и определение способов решения новых задач в будущем.</div>
        <div class="footer__contacts">
          <div>Адрес: @php the_field( "address", 22 ) @endphp</div>
          <div>Телефон: <a href="tel:@php the_field( "phone", 22 ) @endphp">@php the_field( "phone", 22 ) @endphp</a>, <a href="tel:@php the_field( "phone2", 22 ) @endphp"> @php the_field( "phone2", 22 ) @endphp </a></div>
          <div>Email: <a href="mailto:@php the_field( "email", 22 ) @endphp">@php the_field( "email", 22 ) @endphp </a></div>
          <div class="socials">
            <a class="social" href="//@php the_field( "facebook", 22 ) @endphp"><img src="@asset("images/facebook.svg")" alt="facebook"></a>
            <a class="social" href="//@php the_field( "vk", 22 ) @endphp"><img src="@asset("images/vk.svg")" alt="vk"></a>
            <a class="social" href="//@php the_field( "ok", 22 ) @endphp"><img src="@asset("images/ok.svg")" alt="ok"></a>
            <a class="social" href="//@php the_field( "twitter", 22 ) @endphp"><img src="@asset("images/twitter.svg")" alt="twitter"></a>
            <a class="social" href="//@php the_field( "instagram", 22 ) @endphp"><img src="@asset("images/instagram.svg")" alt="instagram"></a>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>
