<?php
    $date_open_close= include('input_date_open_close.php');
    $deposit_period= include('input_deposit_period.php');
    $deposit_bet= include('input_deposit_bet.php');
    $deposit_period_bet='
    <div class="row">
             <div class="col-6">
                   '.$deposit_period.'
             </div>
             <div class="col-6">
                '.$deposit_bet.'
             </div>
     </div>
    ';

    $capitalization_frequency=include ('select_capitalization_frequency.php');
    $titleProduct="<h5  class='form-label'>Данные продукта:</h5>";

    return $titleProduct.$date_open_close.$deposit_period_bet.$capitalization_frequency;