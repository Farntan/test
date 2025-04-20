<?php

$list= '<ol class="list-group list-group-numbered">';
while ($application=$applications->get('object')) {

    $list.='<li class="list-group-item">'.
        $application->surname.' '.$application->name.' '.$application->middle_name.', '.
        ' дата открытия: '. $application->open.
        ', дата закрытия: '. $application->close.
        ', график платежей: '. $application->chart_type.
        ', сумма (руб): '. $application->amount.



        '</li>';






}

$list.='</ol>';

return $list;

