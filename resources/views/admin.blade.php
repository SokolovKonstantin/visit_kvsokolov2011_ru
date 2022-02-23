<x-page>

  <x-slot name="head">
    <!--Inserting into head-->
    <script src="/js/update-view-photo.js"></script>
    <script src="/js/admin.js"></script>
  </x-slot>

  <main id="main-admin">
    <!--main part-->
    <audio id="click-button-sound" ><source type="audio/mpeg" src="/mySound/zvuk11.ogg"/></audio>
    <!--Статистика сайта:-->

      <div id="my-statistic-admin" class="admin-menu">Статистика посещаемости страниц:</div>
      <x-site-visit-statistics :statistics="$fullInformation['site_visit_statistics']" />

    <!--Сообщения:-->
      <div id="my-feedback-admin" class="admin-menu">Сообщения обратной связи:</div>
      <x-messages :messages="$fullInformation['messages']" />

    <!--Обо мне:-->
      <div id="info-about-me-admin" class="admin-menu">Обо мне:</div>
      <x-update-information-about-the-programmer :programmers="$fullInformation['information_about_the_programmer']" />

    <!--Коэффициенты для расчета ключевых навыков:-->
      <div id="variables-admin" class="admin-menu">Коэффициенты для расчета ключевых навыков:</div>
      <x-update-skill-variables :variables="$fullInformation['key_skill_variables']" />

    <!--Ключевые навыки:-->
      <div id="my-skills-admin" class="admin-menu">Навыки:</div>
      <x-update-skill :skills="$fullInformation['key_skill']" />

    <!--Профессиональные интересы:-->
      <div id="my-interests-admin" class="admin-menu">Профессиональные интересы:</div>
      <x-professional-interests :interests="$fullInformation['professional_interests']" />

    <!--Оказываемые услуги:-->
      <div id="my-services-admin" class="admin-menu">Услуги:</div>
      <x-services-offered :services="$fullInformation['services_offered']" />

    <!--Ссылки на интернет ресурсы:-->
      <div id="my-links-admin" class="admin-menu">Интернет ресурсы:</div>
      <x-update-links-to-programmer-resources :links="$fullInformation['links_to_programmer_resources']" />

    <!--Мое образование:-->
      <div id="my-education-admin" class="admin-menu">Образование:</div>
      <x-update-information-about-education :educations="$fullInformation['information_about_education']" />

    <!--Мои курсы:-->
      <div id="my-courses-admin" class="admin-menu">Курсы:</div>
      <x-update-insert-information-about-courses :courses="$fullInformation['information_about_courses']" />

    <!--Мои проекты:-->
      <div id="my-projects-admin" class="admin-menu">Проекты:</div>
      <x-update-insert-completed-projects :projects="$fullInformation['completed_projects']" />

    <!--Опыт работы:-->
      <div id="my-experience-admin" class="admin-menu">Опыт работы:</div>
      <x-work-experience :experiences="$fullInformation['work_experience']" />

    <!--Смена пароля-->
      <div id="my-password-admin" class="admin-menu">Логин пароль</div>
      <x-login-password  />


  </main>

</x-page>
