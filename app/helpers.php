<?php

function random_color(){

    $hex = "abcdef0123456789";
    $color = "#";

    for($i = 0; $i < 6; $i++){
        $color .= $hex[rand(0,(strlen($hex) - 1))];
    }

    return $color;
}

function createRenderUrl($pid, $size, $design, $mediaId = null ){
    return URL("/") . "/api/designs/images/" .$pid."/".$size."/".$design."/".$mediaId;
}