<?php

include_once "vtmec-causes-of-death.csv";
include_once "Death.php";


$data = [];
$count = 0;

if (($handle = fopen("vtmec-causes-of-death.csv", "r")) !== false) {
    while (($row = fgetcsv($handle, 1000)) !== false) {

        switch ($row[2]) {
            case "Nevardarbīga nāve":
                $data[] = new Death([$row[2], $row[3]]);
                break;
        }

        $count++;
    }
    fclose($handle);
}

$death = 0;
$typOfDeath = [];

for ($i = 0; $i < count($data); $i++) {
    if (count($data[$i]->getReason()) == 2) {
        $death++;
        array_push($typOfDeath,  $data[$i]->getReason()[1]);
        if ($typOfDeath !== "Nāve no citām (hroniskām) slimībām;ļaundabīgi audzēji"){
//            $death--;
//            array_pop($typOfDeath);
        } if ($typOfDeath !== "Nāve no citām (hroniskām) slimībām;plaušu tuberkuloze"){
//            $death--;
//            array_pop($typOfDeath);
        }
    }
//    var_dump($data);
}



print_r($typOfDeath);

echo "No sirds asiņvadu slimības nomira -> " . $death . "\n";


