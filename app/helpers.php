<?php

function random_color(){

    $hex = "abcdef0123456789";
    $color = "#";

    for($i = 0; $i < 6; $i++){
        $color .= $hex[rand(0,(strlen($hex) - 1))];
    }

    return $color;
}