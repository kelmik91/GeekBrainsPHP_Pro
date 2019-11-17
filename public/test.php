<?php
function add($x, $y)
{
    return $x + $y;
}

if (add(2,1) == 3) {
    echo "add OK";
} else {
    echo "add error!";
}