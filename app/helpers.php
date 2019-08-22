<?php

/**
 * Random hex color
 * @return string
 */
function random_color()
{
    $hex = "abcdef0123456789";
    $color = "#";

    for ($i = 0; $i < 6; $i++) {
        $color .= $hex[rand(0, (strlen($hex) - 1))];
    }
    return $color;
}

/**
 * Converts RGB to HEX. RGB format should be from fabric as "rgb(#,#,#)"
 * @param $rgb
 * @return string
 */
function rgbToHex($rgb)
{
    preg_match('#\((.*?)\)#', $rgb, $match);
    list($r, $g, $b) = explode(",", $match[1]);
    return sprintf("#%02x%02x%02x", $r, $g, $b);
}

/**
 * Creates the URL for rendering images
 * @param $pid
 * @param $size
 * @param $design
 * @param null $mediaId
 * @return string
 */
function createRenderUrl($pid, $size, $design, $mediaId = null)
{
    return URL("/") . "/api/designs/images/" . $pid . "/" . $size . "/" . ((empty($design) || $design == null) ? 0 : $design) . "/" . $mediaId;
}

/**
 * Creates a full path through the public folder using array of directories
 *
 * $arr['images','test'] = public_path() "/images/test" etc.
 * @param $arr
 * @return string
 */
function fullPublicPath($arr){
    $str = public_path();
    foreach($arr as $dir) {
        $str .= DIRECTORY_SEPARATOR.ltrim($dir, DIRECTORY_SEPARATOR);
    }
    return $str;
}

/**
 * Google Font List
 *
 * @return array
 */
function googleFontList()
{
    $originalList = [
        "Barriecito" => "font-family: 'Barriecito', cursive;",
        "Beth Ellen" => "font-family: 'Beth Ellen', cursive;",
        "Cinzel" => "font-family: 'Cinzel', serif;",
        "Cookie" => "font-family: 'Cookie', cursive;",
        "Crimson Text" => "font-family: 'Crimson Text', serif;",
        "Dancing Script" => "font-family: 'Dancing Script', cursive;",
        "EB Garamond" => "font-family: 'EB Garamond', serif;",
        "Fredericka the Great" => "font-family: 'Fredericka the Great', cursive;",
        "Hepta Slab" => "font-family: 'Hepta Slab', serif;",
        "Indie Flower" => "font-family: 'Indie Flower', cursive;",
        "Lexend Mega" => "font-family: 'Lexend Mega', sans-serif;",
        "Lobster" => "font-family: 'Lobster', cursive;",
        "Merriweather" => "font-family: 'Merriweather', serif;",
        "Press Start 2P" => "font-family: 'Press Start 2P', cursive;",
        "Roboto Slab" => "font-family: 'Roboto Slab', serif;",
        "Saira Stencil One" => "font-family: 'Saira Stencil One', cursive;",
        "Satisfy" => "font-family: 'Satisfy', cursive;",
        "Source Code Pro" => "font-family: 'Source Code Pro', monospace;",
        "Ubuntu" => "font-family: 'Ubuntu', sans-serif;",
        "Ubuntu Mono" => "font-family: 'Ubuntu Mono', monospace;"
    ];

    return $originalList;
}