<div id="site-visit-statistic">

<table border="1">
  <tr>
    <th>Адрес страницы</th>
    <th>Последний визит</th>
    <th>Количество посещений</th>
  </tr>
  @foreach ($statistics as $statistic)
  <tr>
    <td>{{$statistic['name_of_page']}}</td>
    <td>{{$statistic['updated_at']}}</td>
    <td>{{$statistic['number_of_visits']}}</td>
  </tr>
  @endforeach
</table>

</div>
