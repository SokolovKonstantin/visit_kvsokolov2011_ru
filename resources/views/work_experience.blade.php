<x-page>

  <x-slot name="head">
    <!--Inserting into head-->
    <script src="/js/pageOnload.js"></script>
  </x-slot>

  <x-menu :information="$information_for_the_menu"/>

  <div class="site-div">

      @foreach ($information_for_the_main['work_experience'] as $experience)
      <div class="work-experience">
        <p>
          <u>{{$experience['begin_of_work']}} - {{$experience['end_of_work']}}</u>
        </p>
        <p>
          {{$experience['name_of_the_organization']}}
        </p>
        <p>
          {{$experience['current_position']}}
        </p>
        <p>
          <i>{{$experience['functions_performed']}}</i>
        </p>
      </div>
      @endforeach

  </div>

</x-page>
