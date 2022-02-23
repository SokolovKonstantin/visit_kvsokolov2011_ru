<div id="coursesAdmin" class="admin-div">
    <!--$courses['']-->
    @foreach ($courses as $course)

      <form class="any-form">
        {{ csrf_field() }}
        <input type="text" name="id" value="{{$course['id']}}" hidden />
        <select class="select-short" name="language">
          <option>{{$course['language']}}</option>
          <option>{{$course['language']==='rus'?'eng':'rus'}}</option>
        </select>
        <input class="input-text" type="text" name="name_of_organization" value="{{$course['name_of_organization']}}" />
        <input class="input-text" type="text" name="name_of_the_course" value="{{$course['name_of_the_course']}}" />
        <input class="input-text" type="date" name="date_of_receipt_of_the_document" value="{{$course['date_of_receipt_of_the_document']}}" />

        <input class="button-submit" formaction="/admin/informationAboutCoursesDelete" formmethod="post" type="submit" value="Удалить" />
        <input class="button-submit" formaction="/admin/informationAboutCoursesUpdate" formmethod="post" type="submit" value="Изменить" />
      </form>

    @endforeach


      <form class="any-form">
        {{ csrf_field() }}
        <select class="select-short" name="language">
          <option>rus</option>
          <option>eng</option>
        </select>
        <input class="input-text" type="text" name="name_of_organization" placeholder="Название организации" />
        <input class="input-text" type="text" name="name_of_the_course" placeholder="Название курса" />
        <label class="label-text">Дата завершения курса:</label>
        <input class="input-text" type="date" name="date_of_receipt_of_the_document" />

        <input class="button-submit" formaction="/admin/informationAboutCoursesUpdate" formmethod="post" type="submit" value="Добавить" />
      </form>



</div>
