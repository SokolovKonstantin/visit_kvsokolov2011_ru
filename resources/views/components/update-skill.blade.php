<div id="skills" class="admin-div">
    @foreach ($skills as $skill)
    <form class="any-form">
    {{ csrf_field() }}
      <input type="text" name="id" value="{{$skill['id']}}" hidden />

      <input class="input-text" type="text" name="skill" value="{{$skill['skill']}}" />

      <div class="label-input-digit">
        <label class="label-digit">Процент изучения теории:</label>
        <input class="input-digit" type="text" name="percentage_of_theory_study" value="{{$skill['percentage_of_theory_study']}}" />
      </div>
      <div class="label-input-digit">
        <label class="label-digit">Количество выполненных проектов:</label>
        <input class="input-digit" type="text" name="number_of_practice" value="{{$skill['number_of_practice']}}" />
      </div>
      <div class="label-input-digit">
        <label class="label-digit">Количество новых открытий в навыке:</label>
        <input class="input-digit" type="text" name="number_of_discoveries" value="{{$skill['number_of_discoveries']}}" />
      </div>

      <input class="button-submit" formaction="/admin/informationSkillUpdate" formmethod="post" type="submit" value="Изменить" />
      <input class="button-submit" formaction="/admin/informationSkillDelete" formmethod="post" type="submit" value="Удалить" />
    </form>
    @endforeach

    <form class="any-form">
    {{ csrf_field() }}
      <label class="label-text">Навык:</label>
      <input class="input-text" type="text" name="skill" placeholder="Название навыка" />
      <div class="label-input-digit">
        <label class="label-digit">Процент изучения теории:</label>
        <input class="input-digit" type="text" name="percentage_of_theory_study" placeholder="%" />
      </div>
      <div class="label-input-digit">
        <label class="label-digit">Количество выполненных проектов:</label>
        <input class="input-digit" type="text" name="number_of_practice" placeholder="шт." />
      </div>
      <div class="label-input-digit">
        <label class="label-digit">Количество новых открытий в навыке:</label>
        <input class="input-digit" type="text" name="number_of_discoveries" placeholder="шт." />
      </div>

      <input class="button-submit" formaction="/admin/informationSkillUpdate" formmethod="post" type="submit" value="Добавить" />
    </form>
</div>
