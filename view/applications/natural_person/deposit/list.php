<?php

$list= '<ol class="list-group list-group-numbered">';
while ($application=$applications->get('object')) {

    $list.='<li class="list-group-item"><a class="link-secondary" href="/physicalperson/deposit/show?id='.$application->id.'">'.
        $application->surname.' '.$application->name.' '.$application->middle_name.', '.
        ' дата открытия: '. $application->open.
        ', дата закрытия: '. $application->close.
        ', ставка: '. $application->bit.' %'.
        ', период вклада: '. $application->deposit_period.' мес.'.
        ', капитализация: '. $application->сapitalization_type.


        '</a></li>';






}

$list.='</ol>';

return $list;

