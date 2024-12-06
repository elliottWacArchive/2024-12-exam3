<?php

function ord_alphlong(string $str = null)
{
    if ($str === null) {
        echo "\n";
        die();
    }
    $str = trim($str);
    $arr = [];
    $j = 0;
    for ($i = 0; $i < strlen($str); $i++) {
        if ($str[$i] == " " || $str[$i] == "\t" || $str[$i] == "\n") {
            $j++;
        } elseif (!isset($arr[$j]) && ($str[$i] >= 'A' && $str[$i] <= 'z')) {
            $arr[$j] = $str[$i];
        } elseif (($str[$i] >= 'A' && $str[$i] <= 'z')) {
            $arr[$j] = $arr[$j] . $str[$i];
        }
    }
    $len = $arr;
    $alph = $arr;
    usort($len, function ($a, $b) {
        return strlen($a) - strlen($b);
    });
    usort($alph, function ($a, $b) {
        $cmp = strcasecmp($a, $b);
        if ($cmp === 0) {
            return 0;
        }
        return $cmp;
    });

    echo implode(" ", $len) . "\n";
    echo implode(" ", $alph) . "\n";
}
