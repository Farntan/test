<?php

$i=0;
$tres='';
while ($application=$applications->get('object')) {
    $i++;
    $tres.='    <tr>
                      <th scope="row">'.$i.'</th>
                      <td>'.$application->surname.' '.$application->name.' '.$application->middle_name.'</td>
                      <td>'.$application->open.'</td>
                      <td>'.$application->close.'</td>
                      <td>'.$application->chart_type.'</td>
                      <td>'.$application->amount.'</td>
                      <td>
                        <a class="link-secondary" href="/physicalperson/credit/show?id='.$application->id.'"><i class="bi bi-eye">просмотр</i></a>
                      </td>
            </tr>';

}


$table='
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ФИО</th>
      <th scope="col">Дата открытия</th>
      <th scope="col">Дата закрытие</th>
       <th scope="col">График платежей</th>
       <th scope="col">Сумма</th>
       <th scope="col">Просмотр</th>
      
    </tr>
  </thead>
  <tbody>
   '.$tres.'
  </tbody>
</table>



';

return $table;