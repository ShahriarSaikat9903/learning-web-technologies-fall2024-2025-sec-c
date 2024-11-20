<?php

$main_amount = 500;
$vat_rate = 0.15;
$vat = $main_amount * $vat_rate;
$total_amount = $main_amount + $vat;


echo "Main Amount: " .$main_amount . " taka <br>";

echo "VAT(15%): " .$vat . " taka <br>";

echo "Total Amount: " .$total_amount . " taka";

?>