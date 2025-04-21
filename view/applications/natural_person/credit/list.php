<?php

$list= '<ol class="list-group list-group-numbered">';
while ($application=$applications->get('object')) {

    $list.='<li class="list-group-item"><a class="link-secondary" href="/physicalperson/credit/show?id='.$application->id.'">'.
        $application->surname.' '.$application->name.' '.$application->middle_name.', '.
        ' дата открытия: '. $application->open.
        ', дата закрытия: '. $application->close.
        ', график платежей: '. $application->chart_type.
        ', сумма (руб): '. $application->amount.



        '</a></li>';






}

$list.='</ol>';

return $list;

