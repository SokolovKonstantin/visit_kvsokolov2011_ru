<div id="services" class="admin-div">
  @foreach ($services as $service)
  <form class="any-form">
  {{ csrf_field() }}
    <input type="text" name="id" value="{{$service['id']}}" hidden />
    <select class="select-short" name="language">
      <option>{{$service['language']}}</option>
      <option>
        {{$service['language']==='rus'?'eng':'rus'}}
      </option>
    </select>

    <input class="input-text" type="text" name="services" value="{{$service['services']}}" />

    <input class="button-submit" formaction="/admin/informationServicesUpdate" formmethod="post" type="submit" value="Изменить" />
    <input class="button-submit" formaction="/admin/informationServicesDelete" formmethod="post" type="submit" value="Удалить" />
  </form>
  @endforeach

  <form class="any-form">
  {{ csrf_field() }}

    <select class="select-short" name="language">
      <option>rus</option>
      <option>eng</option>
    </select>

    <input class="input-text" type="text" name="services" placeholder="Сервис" />

    <input class="button-submit" formaction="/admin/informationServicesUpdate" formmethod="post" type="submit" value="Добавить" />
  </form>
</div>
