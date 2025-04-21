<?php
    $date_open_close= include('input_date_open_close.php');
    $deposit_period=include ('input_credit_period.php');
    $capitalization_frequency=include ('select_capitalization_frequency.php');


    return $date_open_close.$deposit_period.$capitalization_frequency;