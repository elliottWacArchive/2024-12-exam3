<?php

function count_island($path = null)
{
    if ($path === null || !file_exists($path)) {
        return false;
    }
    $content = file_get_contents($path);
    $tab = explode("\n", $content);
    if ($tab == []) {
        return false;
    }
    $index = 0;
    foreach ($tab as $key => $val) {
        for ($i = 0; $i < strlen($val); $i++) {
            if (($val[$i] == "w" && $val[$i - 1] != ".")) {
                $tab[$key][$i] = $tab[$key][$i - 1];
            } elseif ($key > 0) {
                if ($val[$i] == "w" && $tab[$key - 1][$i] != ".") {
                    $tab[$key][$i] = $tab[$key - 1][$i];
                    $pass = false;
                }
            }
            if ($val[$i] == "w" && $val[$i - 1] == "." && $pass == true) {
                $index++;
                $tab[$key][$i] = $index;
            }
            $pass = true;
        }
    }
    if ($index > 9) {
        return false;
    }
    $str = implode("\n", $tab);
    echo $str . "\n";
    return true;
}
