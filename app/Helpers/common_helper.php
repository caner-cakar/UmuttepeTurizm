<?php
function randNum($min,$max){
    echo rand($min,$max);
}

function printData($data){
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}