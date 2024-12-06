<?php

function count_rec_str(array $arr, string $str)
{
    if ($str == "") {
        return false;
    }
    $result = [];
    count_str_recursive($arr, $str, 1, $result);
    return $result;
}

function count_str_recursive($arr, $str, $depth, &$result)
{
    if (!isset($result[$depth])) {
        $result[$depth] = 0;
    }
    foreach ($arr as $val) {
        if (is_array($val)) {
            count_str_recursive($val, $str, $depth + 1, $result);
        } else {
            if ($val === $str) {
                $result[$depth]++;
            }
        }
    }
}
