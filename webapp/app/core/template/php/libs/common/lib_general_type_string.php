<?php

function endsWith($haystack = NULL, $needle = NULL){
    $length = strlen($needle);
    if ($length == 0) {
        return true;
    }

    return (substr($haystack, -$length) === $needle);
}

?>