<?php

$tests = readline();
$words = [];

for ($i = 0; $i < $tests; $i++) {
    $words[$i][0] = readline();
    $words[$i][1] = readline();
}

for ($i = 0; $i < $tests; $i++) {

    $err = 0;

    if (strlen($words[$i][0]) == strlen($words[$i][1])) {
        $length = strlen($words[$i][1]) + 1;
    } else {
        $length = strlen($words[$i][1]);
    }

    for ($a = 0; $a < $length; $a++) {
        if ($words[$i][0] == $words[$i][1]) {
            echo 'Case #' . $i + 1 . ': ' . $err . PHP_EOL;
            break;
        } elseif (strlen($words[$i][0]) > strlen($words[$i][1])) {
            echo 'Case #' . $i + 1 . ': IMPOSSIBLE' . PHP_EOL;
            break;
        } elseif (str_contains($words[$i][1], $words[$i][0])) {
            $err += strlen($words[$i][1]) - strlen($words[$i][0]);
            echo 'Case #' . $i + 1 . ': ' . $err . PHP_EOL;
            break;
        } elseif ($words[$i][0][$a] != $words[$i][1][$a]) {
            $words[$i][1] = preg_replace('/' . $words[$i][1][$a] . '/', '', $words[$i][1], 1);
            $err++;
            $a--;
        }
    }
}
