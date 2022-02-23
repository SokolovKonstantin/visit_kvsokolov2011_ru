<div id="information-about-me" class="admin-div">
  <!--$programmer['']-->

    @foreach ($programmers as $programmer)
    <form enctype="multipart/form-data" class="any-form">
      {{ csrf_field() }}
      <input type="text" name="id" value="{{$programmer['id']}}" hidden />

      <div class="form-block-data">
        <div>
          <select class="select-short" name="language">
            <option>{{$programmer['language']}}</option>
            <option>{{$programmer['language']==='rus'?'eng':'rus'}}</option>
          </select>

          <select class="select-short" name="gender_of_the_person">
            <option>{{$programmer['gender_of_the_person']}}</option>
            <option>{{
              $programmer['gender_of_the_person']==='муж'?'жен':
                ($programmer['gender_of_the_person']==='жен'?'муж':
                ($programmer['gender_of_the_person']==='male'?'female':'male'))}}
              </option>
          </select>
        </div>
        <input type="date" name="date_of_birth" value="{{$programmer['date_of_birth']}}" />
      </div>

      <input class="input-text" type="text" name="country_of_residence" value="{{$programmer['country_of_residence']}}" />
      <input class="input-text" type="text" name="city_of_residence" value="{{$programmer['city_of_residence']}}" />
      <input class="input-text" type="tel" name="phone" value="{{$programmer['phone']}}" />
      <input class="input-text" type="email" name="email" value="{{$programmer['email']}}" />


        <img id="photo-programmer-{{$programmer['id']}}-img" class="photo-programmer"
          src="myimage/{{$programmer['photo']}}"
          alt="Photo" width="50px">



      <div class="button-input">
        <label for="button">Выберите фото</label>
        <input type="file" id="photo-programmer-{{$programmer['id']}}"  class="button"
          accept=".png, .jpg, .jpeg"
          name="photo"
          onChange="changeHandler(event)">
      </div>

      <input class="button-submit" formaction="/admin/informationAboutProgrammerDelete" formmethod="post" type="submit" value="Удалить" />
      <input class="button-submit" formaction="/admin/informationAboutProgrammerUpdate" formmethod="post" type="submit" value="Изменить" />
    </form>
    @endforeach

    <form enctype="multipart/form-data" class="any-form">
      {{ csrf_field() }}

      <div class="form-block-data">
        <div>
          <select class="select-short" name="language">
            <option>rus</option>
            <option>eng</option>
          </select>

          <select class="select-short" name="gender_of_the_person">
            <option>муж</option>
            <option>male</option>
            <option>жен</option>
            <option>female</option>
          </select>
        </div>

        <input type="date" name="date_of_birth" />
      </div>

      <input class="input-text" type="text" name="country_of_residence" placeholder="Страна проживания" />
      <input class="input-text" type="text" name="city_of_residence" placeholder="Город проживания" />
      <input class="input-text" type="tel" name="phone" placeholder="Телефон" />
      <input class="input-text" type="email" name="email" placeholder="Электронная почта" />

      
        <img id="photo-programmer-new-img" class="photo-programmer"
          src="myimage/not_photo.jpg"
          alt="Start page" width="50px">


      <div class="button-input">
        <label for="button" id="label-file">Выберите фото</label>
        <input type="file" id="photo-programmer-new" class="button"
          accept=".png, .jpg, .jpeg"
          name="photo"
          onChange="changeHandler(event)">
      </div>

      <input class="button-submit" formaction="/admin/informationAboutProgrammerUpdate" formmethod="post" type="submit" value="Добавить" />
    </form>

</div>
