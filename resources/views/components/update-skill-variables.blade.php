<div id="skill-variables">

  <form>
    {{ csrf_field() }}

    <input type="text" name="id" value="{{$variables['id']}}" hidden />
    <div class="label-input-digit">
      <label class="label-digit" for="theory_weighting_factor">Весовой коэффициент, теория:</label>
      <input class="input-digit" type="text" name="theory_weighting_factor" id="theory_weighting_factor" value="{{$variables['theory_weighting_factor']}}" />
    </div>
    <div class="label-input-digit">
      <label class="label-digit" for="practice_weight_ratio">Весовой коэффициент, практика:</label>
      <input class="input-digit" type="text" name="practice_weight_ratio" id="practice_weight_ratio" value="{{$variables['practice_weight_ratio']}}" />
    </div>
    <div class="label-input-digit">
      <label class="label-digit" for="new_discoveries_weighting_factor">Весовой коэффициент, открытий:</label>
      <input class="input-digit" type="text" name="new_discoveries_weighting_factor" id="new_discoveries_weighting_factor" value="{{$variables['new_discoveries_weighting_factor']}}" />
    </div>
    <div class="label-input-digit">
      <label class="label-digit" for="maximum_number_of_projects">Максимальное количество проектов, цель:</label>
      <input class="input-digit" type="text" name="maximum_number_of_projects" id="maximum_number_of_projects" value="{{$variables['maximum_number_of_projects']}}" />
    </div>
    <div class="label-input-digit">
      <label class="label-digit" for="maximum_number_of_new_discoveries">Максимальное количество открытий, цель:</label>
      <input class="input-digit" type="text" name="maximum_number_of_new_discoveries" id="maximum_number_of_new_discoveries" value="{{$variables['maximum_number_of_new_discoveries']}}" />
    </div>

      <input class="button-submit" formaction="/admin/informationSkillVariablesUpdate" formmethod="post" type="submit" value="Изменить" />

  </form>


</div>
