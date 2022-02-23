<div id="projects" class="admin-div">
  <!--Редактирование проектов -->
    @foreach ($projects as $completed_project)

        <form  enctype="multipart/form-data" class="any-form">
          {{ csrf_field() }}

          <input type="text" name="id" value="{{$completed_project['id']}}" hidden >

          <select class="select-short" name="language">
            <option>{{$completed_project['language']}}</option>
            <option>{{$completed_project['language']==='rus'?'eng':'rus'}}</option>
          </select>

          <input class="input-text" type="text" name="name_of_project" value="{{$completed_project['name_of_project']}}">

          <label class="label-text">Начат:</label>
          <input class="input-text" type="date" name="begin_of_project" value="{{$completed_project['begin_of_project']}}">

          <label class="label-text">Завершен:</label>
          <input class="input-text" type="date" name="end_of_project" value="{{$completed_project['end_of_project']}}">

          <textarea class="input-textarea" name="purpose_of_project">{{$completed_project['purpose_of_project']}}</textarea>
          <textarea class="input-textarea" name="applied_technologies">{{$completed_project['applied_technologies']}}</textarea>

          <input class="input-text" type="text" name="link_to_github" value="{{$completed_project['link_to_github']}}"><br>

          <img id="start-page-{{$completed_project['id']}}-img" class="photo-programmer"
              src="myimage/{{$completed_project['screenshot_of_the_start_page']}}"
              alt="Start page" width="50px">

          <div class="button-input">
            <label>Выберите фото</label>
            <input type="file" id="start-page-{{$completed_project['id']}}" class="button"
              accept=".png, .jpg, .jpeg"
              name="screenshot_of_the_start_page_file"
              onChange="changeHandler(event)">
          </div>

          <img id="special-page-{{$completed_project['id']}}-img" class="photo-programmer"
              src="myimage/{{$completed_project['screenshot_of_a_special_page']}}"
              alt="Special page" width="50px">

          <div class="button-input">
            <label>Выберите фото</label>
            <input type="file" id="special-page-{{$completed_project['id']}}" class="button"
              accept=".png, .jpg, .jpeg"
              name="screenshot_of_a_special_page_file"
              onChange="changeHandler(event)">
          </div>

          <input class="button-submit" formaction="/admin/completedProjectsDelete" formmethod="post" type="submit" value="Удалить" />
          <input class="button-submit" formaction="/admin/completedProjectsUpdate" formmethod="post" type="submit" value="Изменить" />

        </form>

    @endforeach

    <!-- Добавление проектов -->

        <form action="/admin/completedProjectsUpdate" enctype="multipart/form-data" method="POST" class="any-form">
          {{ csrf_field() }}

          <select class="select-short" type="text" name="language">
            <option>rus</option>
            <option>eng</option>
          </select>

          <input class="input-text" type="text" name="name_of_project" placeholder="Название проекта" >

          <label class="label-text">Начат:</label>
          <input class="input-text" type="date" name="begin_of_project">

          <label class="label-text">Завершен:</label>
          <input class="input-text" type="date" name="end_of_project">

          <textarea class="input-textarea" name="purpose_of_project" placeholder="Цели проекта."></textarea>
          <textarea class="input-textarea" name="applied_technologies" placeholder="Применные технологии."></textarea>

          <input class="input-text" type="text" name="link_to_github" placeholder="Ссылка на GitHub www.github.com...."><br>

          <img id="start-page-new-img" class="photo-programmer"
              src="myimage/not_photo.jpg"
              alt="Стартовая страница проекта." width="50px">


          <div class="button-input">
            <label>Выберите фото</label>
            <input type="file" id="start-page-new" class="button"
              accept=".png, .jpg, .jpeg"
              name="screenshot_of_the_start_page_file"
              onChange="changeHandler(event)"><br>
          </div>

          <img id="special-page-new-img" class="photo-programmer"
              src="myimage/not_photo.jpg"
              alt="Особенная страница проекта." width="50px">


          <div class="button-input">
            <label>Выберите фото</label>
            <input type="file" id="special-page-new" class="button"
              accept=".png, .jpg, .jpeg"
              name="screenshot_of_a_special_page_file"
              onChange="changeHandler(event)">
          </div>

          <input class="button-submit" type="reset" name="reset" value="Очистить">
          <input class="button-submit" type="submit" name="submit" value="Добавить">
        </form>


</div>
