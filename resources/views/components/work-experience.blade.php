<div id="work-experience" class="admin-div">
  @foreach ($experiences as $experience)
  <form class="any-form">
  {{ csrf_field() }}
    <input type="text" name="id" value="{{$experience['id']}}" hidden />

    <select class="select-short" name="language">
      <option>{{$experience['language']}}</option>
      <option>
        {{$experience['language']==='rus'?'eng':'rus'}}
      </option>
    </select>

    <input class="input-text" type="date" name="begin_of_work" value="{{$experience['begin_of_work']}}" />
    <input class="input-text" type="date" name="end_of_work" value="{{$experience['end_of_work']}}" />
    <input class="input-text" type="text" name="name_of_the_organization" value="{{$experience['name_of_the_organization']}}" />
    <input class="input-text" type="text" name="current_position" value="{{$experience['current_position']}}" />
    <textarea class="input-textarea" name="functions_performed">{{$experience['functions_performed']}}</textarea>

    <input class="button-submit" formaction="/admin/informationExperienceUpdate" formmethod="post" type="submit" value="Изменить" />
    <input class="button-submit" formaction="/admin/informationExperienceDelete" formmethod="post" type="submit" value="Удалить" />
  </form>
  @endforeach

  <form class="any-form">
  {{ csrf_field() }}

    <select class="select-short" name="language">
      <option>rus</option>
      <option>eng</option>
    </select>
    <br>

    <label class="label-text">Начало работы:</label>
    <input class="input-text" type="date" name="begin_of_work"/>

    <label class="label-text">Конец работы:</label>
    <input class="input-text" type="date" name="end_of_work" />

    <input class="input-text" type="text" name="name_of_the_organization" placeholder="Название организации" />
    <input class="input-text" type="text" name="current_position" placeholder="Должность" />
    <textarea class="input-textarea" name="functions_performed" placeholder="Функциональные обязанности"></textarea>

    <input class="button-submit" formaction="/admin/informationExperienceUpdate" formmethod="post" type="submit" value="Добавить" />
  </form>
</div>
