<x-page>

  <x-slot name="head">
    <!--Inserting into head-->
    <script src="/js/pageOnload.js"></script>
  </x-slot>

  <x-menu :information="$information_for_the_menu"/>

  <div class="site-div">
    <div id="about-me">

      <div class="border-img">
        <img id="photo-programmer"
          src="myimage/{{$information_for_the_main['informationAboutTheProgrammer']['photo']}}"
          alt="Photo">
      </div>

      <div id="info-about-the-programmer">
        <p>{{$information_for_the_main['informationAboutTheProgrammer']['gender_of_the_person']}},
            {{$information_for_the_main['informationAboutTheProgrammer']['age']}}
            {{$information_for_the_main['informationAboutTheProgrammer']['years_word']}},
            {{$information_for_the_main['informationAboutTheProgrammer']['country_of_residence']}},
            {{$information_for_the_main['informationAboutTheProgrammer']['city_of_residence']}}</p>
        <p>{{$information_for_the_main['informationAboutTheProgrammer']['phone']}} <br>
            {{$information_for_the_main['informationAboutTheProgrammer']['email']}}</p>
        <p>
          {{$information_for_the_main['informationAboutTheProgrammer']['links_word']}}<br>
          @foreach ($information_for_the_main['linksToProgrammerResources'] as $resources)
            {{$resources['resource_name']}} <a href = "{{$resources['host']}}">{{$resources['host']}}</a><br><br>
          @endforeach
        </p>
      </div>
    </div>

    <div id="education">
      <h2>{{$information_for_the_main['informationAboutTheProgrammer']['education_word']}}</h2>
        @foreach ($information_for_the_main['informationAboutEducation'] as $education)
          <p>
            {{$education['date_of_receipt_of_the_document']}}<br>
            {{$education['name_of_organization']}}<br>
            {{$education['name_of_the_faculty']}}, {{$education['name_of_the_specialty']}}
          </p>
        @endforeach
    </div>

    <div id="courses">
      <h2>{{$information_for_the_main['informationAboutTheProgrammer']['courses_word']}}</h2>
      <div class="move-up-text">
        <div>
          @foreach ($information_for_the_main['informationAboutCourses'] as $course)
            <p>
              {{$course['date_of_receipt_of_the_document']}}<br>
              {{$course['name_of_organization']}}<br>
              {{$course['name_of_the_course']}}
            </p>
          @endforeach
        </div>
      </div>
    </div>
  </div>

</x-page>
