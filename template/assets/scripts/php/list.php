<?php
//echo $_POST["myData"];

$someArray = [
    "ex1" => ["1", "2", "3"],
    "ex2" => ["4", "5", "6"],
    "ex3" => ["7", "8", "9"]
];

//print_r($someArray[$_POST["myData"]]);

echo json_encode($someArray[$_POST["myData"]]);