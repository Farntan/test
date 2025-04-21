<?php
    $date_open_close= include('input_date_open_close.php');
    $deposit_period=include ('input_credit_period.php');
    $payment_schedule=include ('select_payment_schedule.php');
    $deposit_amount=include ('input_credit_amount.php');
    $titleProduct="<h5  class='form-label'>Данные продукта:</h5>";
    return $titleProduct.$date_open_close.$deposit_period.$payment_schedule.$deposit_amount;