<div id="resources" class="admin-div">
  @foreach ($links as $link)
  <form class="any-form">
  {{ csrf_field() }}
    <input type="text" name="id" value="{{$link['id']}}" hidden />

    <input class="input-text" type="text" name="resource_name" value="{{$link['resource_name']}}" />
    <input class="input-text" type="text" name="host" value="{{$link['host']}}" />

    <input class="button-submit" formaction="/admin/informationLinkUpdate" formmethod="post" type="submit" value="Изменить" />
    <input class="button-submit" formaction="/admin/informationLinkDelete" formmethod="post" type="submit" value="Удалить" />
  </form>
  @endforeach

  <form class="any-form">
  {{ csrf_field() }}

    <input class="input-text" type="text" name="resource_name" placeholder="Имя ресурса" />
    <input class="input-text" type="text" name="host" placeholder="Интернет адрес" />

    <input class="button-submit" formaction="/admin/informationLinkUpdate" formmethod="post" type="submit" value="Добавить" />
  </form>
</div>
