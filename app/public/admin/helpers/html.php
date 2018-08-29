<?php
function attr($value){
    return htmlspecialchars($value);
}

function html($value){
    return htmlentities($value);
}
