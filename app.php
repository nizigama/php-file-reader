<?php

declare(strict_types=1);

$fileName = "file.txt";

$file = fopen($fileName, "r");

if (is_bool($file)) {
    echo "file not found";
    exit;
}

$occurrences=  [];

while (!feof($file)) {
    $line = fgets($file);

    if (is_bool($line)) {
        break;
    }

    $words = explode(" ", $line);

    $result = preg_grep("/(?<=\[)(.*?)(?=\])/", $words);
    // $result = preg_grep("/^\[.*\]\.*$/", $words);

    foreach ($result as $value) {
        array_push($occurrences, $value);
    }

    
}

fclose($file);

var_dump($occurrences);
