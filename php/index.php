<?php
// .htmlspecialchars(strip_tags($value))
require_once("dbClass.php");

$db = new dbClass();

$orders = $db->getOrders();

// print_r($orders);

$text = "";
foreach ($orders as $v) {
    $text .= $v . "\n";
}

$fd = fopen("orders.txt", "w");
if ($fd) {
    fputs($fd, $text);
    fclose($fd);
}

echo '<script> window.close(); </script>';
