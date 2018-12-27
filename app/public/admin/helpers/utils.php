<?php

function format_str_date($str_date, $format = "Y-m-d H:i", $null_if_empty = true){
    if($null_if_empty && !$str_date) return null;
    return date($format, strtotime($str_date));
}
