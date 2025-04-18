<?php
    $date_open_close=include ('input_date_open_clpse.php');
    $deposit_period=include ('input_deposit_period.php');
    $payment_schedule=include ('select_payment_schedule.php');
    $deposit_amount=include ('input_deposit_amount.php');

    return $date_open_close.$deposit_period.$payment_schedule.$deposit_amount;