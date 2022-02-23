<div id="interests" class="admin-div">
  @foreach ($interests as $interest)
  <form class="any-form">
  {{ csrf_field() }}
    <input type="text" name="id" value="{{$interest['id']}}" hidden />

    <select class="select-short" name="language">
      <option>{{$interest['language']}}</option>
      <option>
        {{$interest['language']==='rus'?'eng':'rus'}}
      </option>
    </select>
    <input class="input-text" type="text" name="professional_interests" value="{{$interest['professional_interests']}}" />


    <input class="button-submit" formaction="/admin/informationInterestsUpdate" formmethod="post" type="submit" value="Изменить" />
    <input class="button-submit" formaction="/admin/informationInterestsDelete" formmethod="post" type="submit" value="Удалить" />
  </form>
  @endforeach

  <form class="any-form">
  {{ csrf_field() }}

    <select class="select-short" name="language">
      <option>rus</option>
      <option>eng</option>
    </select>
    <input class="input-text" type="text" name="professional_interests" placeholder="Профессиональный интерес" />

    <input class="button-submit" formaction="/admin/informationInterestsUpdate" formmethod="post" type="submit" value="Добавить" />
  </form>
</div>
