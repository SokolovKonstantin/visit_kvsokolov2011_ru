<div id="educationAdmin" class="admin-div">
  <!--$education['']-->
  @foreach ($educations as $education)

    <form class="any-form">
      {{ csrf_field() }}
      <input type="text" name="id" value="{{$education['id']}}" hidden />
      <select class="select-short" name="language">
        <option>{{$education['language']}}</option>
        <option>{{$education['language']==='rus'?'eng':'rus'}}</option>
      </select>
      <input class="input-text" type="text" name="name_of_organization" value="{{$education['name_of_organization']}}" />
      <input class="input-text" type="date" name="date_of_receipt_of_the_document" value="{{$education['date_of_receipt_of_the_document']}}" />
      <input class="input-text" type="text" name="name_of_the_faculty" value="{{$education['name_of_the_faculty']}}" />
      <input class="input-text" type="text" name="name_of_the_specialty" value="{{$education['name_of_the_specialty']}}" />

      <input class="button-submit" formaction="/admin/informationAboutEducationsDelete" formmethod="post" type="submit" value="Удалить" />
      <input class="button-submit" formaction="/admin/informationAboutEducationsUpdate" formmethod="post" type="submit" value="Изменить" />
    </form>

  @endforeach


    <form class="any-form">
      {{ csrf_field() }}
      <select class="select-short" name="language">
        <option>rus</option>
        <option>eng</option>
      </select>
      <input class="input-text" type="text" name="name_of_organization" placeholder="Название организации" />
      <input class="input-text" type="text" name="name_of_the_faculty" placeholder="Факультет" />
      <input class="input-text" type="text" name="name_of_the_specialty" placeholder="Специальность" />
      <label class="label-text">Дата завершения курса:</label>
      <input class="input-text" type="date" name="date_of_receipt_of_the_document" />

      <input class="button-submit" formaction="/admin/informationAboutEducationsUpdate" formmethod="post" type="submit" value="Добавить" />
    </form>

</div>
