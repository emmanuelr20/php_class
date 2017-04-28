<?php session_start() ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
    </head>
    <body>
        <form method="post" action="">
            <p>
                <label>Number</label>
                <input type="number" name="principal">
            </p>
            <p>
                <label>Rate</label>
                <input type="number" name="rate">
            </p>
            <p>
                <label>Compound Number</label>
                <input type="number" name="compound_no">
            </p>
            <p>
                <label>Period</label>
                <input type="number" name="period">
            </p>
            <input type="submit">
        </form>
    </body>
</html>
<?php
    function compound_interest($principal, $rate, $compound_no, $period){
        //rate in percentage, period in years
        $final_amount = $principal * pow((1 + (($rate/100) / $compound_no)), ($compound_no * $period));
        $interest = $final_amount - $principal;
        return $interest;
    }

    function simple_interest($principal, $rate, $time){
        $interest = ($principal * $rate * $time) / 100;
        return $interest;
    }

    function loan_payment_simple($amount, $rate, $time){
        $total = $amount + simple_interest($amount, $rate, $time);
        $monthly_payment = $total / 12;
        return $monthly_payment;
    }

    function loan_payment_compound($principal, $rate, $compound_no, $period){
        $total = $principal + compound_interest($principal, $rate, $compound_no, $period);
        $monthly_payment = $total / 12;
        return $monthly_payment;
    }

    if(!empty($_POST)){
        $princ = (float)$_POST['principal'];
        $rate = (float)$_POST['rate'];
        $time = (float)$_POST['period'];
        $comp_no = (float)$_POST['compound_no'];

        $arr = [$princ, $rate, $comp_no ,$time];
        var_dump($arr);
        $_SESSION['simple_interest'] = simple_interest($princ, $rate, $time);
        $_SESSION['compound_interest'] = compound_interest($princ, $rate, $comp_no ,$time);
        $_SESSION['loan_payment_simple'] = loan_payment_simple($princ, $rate, $time);
        $_SESSION['loan_payment_compound'] = loan_payment_compound($princ, $rate, $comp_no, $time);

        var_dump($_POST);
        var_dump($_SESSION);
    }
?>
