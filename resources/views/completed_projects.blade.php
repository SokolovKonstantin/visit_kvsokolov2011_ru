<x-page>

  <x-slot name="head">
    <title>Выполненные проекты. Соколов Константин.</title>
    <meta name = "description" content = "Завершенные проекты Соколова Константина." >
    <!--Inserting into head-->
    <script src="/js/pageOnload.js"></script>
  </x-slot>

  <x-menu :information="$information_for_the_menu"/>

  <div class="site-div">
    <!--main part-->
      @foreach ($information_for_the_main['completedProjects'] as $project)
        <div class="project">

          <h2>{{$project['name_of_project']}}.</h2>

          <div class="label-text">
          {{$project['begin_of_project']}} - {{$project['end_of_project']}}
          </div>

          <div class="label-text">
            <p>{{$project['purpose_of_project']}}</p>
          </div>

          <div class="border-screenshot">
            <img id="screenshot-start-page" class="screenshot"
              src="myimage/{{$project['screenshot_of_the_start_page']}}"
              alt="screenshot of the start page">
          </div>

          <div class="border-screenshot">
            <img id="screenshot-start-page" class="screenshot"
              src="myimage/{{$project['screenshot_of_a_special_page']}}"
              alt="screenshot of a special page">
          </div>

        <div class="label-text">
          @if ($project['language'] === 'rus')
            Технологии:
          @else
            Technologies:
          @endif
          {{$project['applied_technologies']}}
        </div>
        <div class="label-text">
          <a href = "{{$project['link_to_github']}}">GitHub</a>
        </div>
        </div>
      @endforeach


</div>

</x-page>
