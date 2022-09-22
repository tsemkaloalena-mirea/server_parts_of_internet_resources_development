<?php
    header('Content-type: text/plain');
    $list = [32, 95, 16, 82, 24, 66, 35, 19, 75, 54, 40, 43, 93, 68, 0.2, "df"];
    print_list($list);
    $list = shellSort($list);
    function shellSort($list) {
        $length = count($list);
        $d = (int) ($length / 2);
        while ($d > 0) {
            for ($i = 0; $i < $length - $d; $i++) {
                $j = $i;
                while (($j >= 0) && ($list[$j] > $list[$j + $d])) {
                    $t = $list[$j];
                    $list[$j] = $list[$j + $d];
                    $list[$j + $d] = $t;
                    $j -= $d;
                }
            }
            $d = (int) ($d / 2);
        }
        return $list;
    }
    function print_list($list) {
        for ($h = 0; $h < count($list); $h++) {
            echo $list[$h];
            echo " ";
        }
    }
    echo "\n";
    print_list($list);
?>
