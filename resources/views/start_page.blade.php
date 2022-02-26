<x-page>

  <x-slot name="head">
    <title>Визитка. Соколов Константин.</title>
    <meta name = "description" content = "Сайт визитка программиста Соколова Константина." >
    <meta name = "keywords" content = "Соколов Константин, программист, визитка, портофолио, Laravel, PHP">
    <!--Inserting into head-->
    <script src="/js/pageOnload.js"></script>
  </x-slot>

  <x-menu :information="$information_for_the_menu"/>

<div class="site-div">
    <div id="intro">
      <h1>{{$information_for_the_main['introducingMe']}}</h1>
      <h2>{{$information_for_the_main['typeOfWork']}}</h2>

    <div class="move-up-text">
      <div>
        @foreach ($information_for_the_main['services'] as $service)
          <p>{{$service}}</p>
        @endforeach
      </div>
    </div>

  </div>

    <div id="diagram-skills" >
      @foreach ($information_for_the_main['levelSkill'] as $skill)
        <div class="level-skill">
          <div class="up-indicator"></div>
          @php
            $level = ceil($skill['levelSkill']/10);
          @endphp
          @for ($i = 0; $i < $level; $i++)
            <div class="indicator"></div>
          @endfor
        </div>
        <div class="name-skill">
          <p class="down-name">{{$skill['nameSkill']}}</p>
        </div>
      @endforeach
    </div>
</div>

</x-page>
