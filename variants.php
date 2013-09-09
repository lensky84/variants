<?php
$a = array(1,2,3, 4, 5, 6);

$b = array();
function variants ($input, &$result)
{
    for ($i = 0; $i < count($input); $i++) {
        for ($j = 0; $j < count($input); $j++) {
            if ($i >= $j) {
                continue;
            }
            $tmp1 = $input[$i];
            $tmp2 = $input[$j];
            $input[$j] = $tmp1;
            $input[$i] = $tmp2;

            $key = implode('', $input);
            if (!isset($result[$key])) {
                $result[$key] = $input;
                variants($input, $result);
            }
        }
    }
}

variants($a, $b);
echo count($b);