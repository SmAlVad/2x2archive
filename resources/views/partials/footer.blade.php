<footer id="footer">
  <div class="container-fluid">
    <div class="row justify-content-center">

      <div class="col-xl-3">
        <div class="footer-block">
          <h5>Информация</h5>
          <ul class="footer-block-list">
            <li>
              <a href="{{ route('rules') }}">Правила пользования сервисом</a>
            </li>
            <li>
              <a href="#">Условия публичного использования материалов</a>
            </li>
            <li>
              <a href="{{ route('personal-info') }}">Защита персональных данных</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-xl-3">
        <div class="footer-block">
          <h5>Полезно</h5>
          <ul class="footer-block-list">
            <li>
              <a href="https://2x2.su/classified/" target="_blank">Самые актуальные объявления Амурской области</a>
            </li>
            <li>
              <a href="https://2x2.su/archive" target="_blank">Интересные новости, статьи</a>
            </li>
          </ul>
        </div>
      </div>

      <div class="col-xl-2">
        <div class="footer-block">
          <h5>Социальные сети</h5>

          <div class="footer-social">

            <div class="footer-social-item" style="align-items: center; color: #007bff;">
              <i class="fab fa-whatsapp-square" style="font-size: 25px; color: #007bff;"></i>&nbsp;
              +7 (968) 246-25-97
            </div>

            <div class="footer-social-item">
              <a href="https://www.facebook.com/dvadvasu">
                <i class="fab fa-facebook-square"></i>
              </a>
              <a href="https://vk.com/club2x2_su">
                <i class="fab fa-vk"></i>
              </a>
              <a href="https://twitter.com/2x2_su">
                <i class="fab fa-twitter-square"></i>
              </a>
              <a href="https://ok.ru/polezny2x2">
                <i class="fab fa-odnoklassniki-square"></i>
              </a>
              <a href="https://www.instagram.com/2x2.su/">
                <i class="fab fa-instagram"></i>
              </a>
            </div>

          </div>

        </div>
      </div>

      <div class="col-xl-2">
        <div class="footer-block">
          <ul class="footer-block-list">
            <li>
              Телефон специалистов техподдержки: <br/> +7 (968) 246-23-15
            </li>
            <li>
              Издательский дом «Дважды два» <br/> г. Благовещенск, ул. Зейская, 229
            </li>
            <li>
              &copy; 2010 —&nbsp;{{ date('Y') }}
            </li>
          </ul>
        </div>
      </div>

    </div>

    <div class="row justify-content-center">
      <div class="col-xl-8 pt-3">
        <div class="footer-info">
          <p>
            Сетевое издание «Полезный портал 2x2.su» зарегистрировано Федеральной службой по надзору в сфере связи,
            информационных технологий и массовых коммуникаций. Номер свидетельства о регистрации
            СМИ ЭЛ № ФС 77 - 73258 от 13.07.2018 года.
          </p>

          <p>
            Учредители: Общество с ограниченной ответственностью
            «Редакция газеты «Дважды два»; Общество с ограниченной ответственностью «Дважды два».
          </p>

          <p>
            Главный редактор - Серебренникова Нина Михайловна,&nbsp;<a href="mailto:cnm@2x2.su">cnm@2x2.su.</a>
          </p>

        </div>
      </div>
      <div class="col-xl-2 pt-3">
        @include('partials.yandexmetrika')
      </div>
    </div>
  </div>
</footer>
