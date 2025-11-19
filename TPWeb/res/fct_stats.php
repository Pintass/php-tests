<?php
function moy1($data){
    return (array_sum($data)/count($data));
}

function moy2($x, $n){
    $arr = array();
    foreach ($x as $key => $value) {
        $arr[$key] = $value*$n[$key];
    }
    return array_sum($arr)/array_sum($n);
}

function variance($x, $y){
    $arr = array();
    foreach ($x as $k => $value) {
        $arr[$k] = pow($value, 2);
    }

    return (moy2($arr,$y)-pow(moy2($x,$y),2));
}

function sd1($x){
    return sqrt(moy1(pow($x,2))-pow(moy1($x),2));
}

function sd2($x, $n){
    return(sqrt(variance($x, $n)));
}

