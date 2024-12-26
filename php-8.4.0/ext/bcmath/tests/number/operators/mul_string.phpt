--TEST--
BcMath\Number mul string by operator
--EXTENSIONS--
bcmath
--FILE--
<?php

$values = [
    100,
    '-20',
    '0.01',
    '-0.40',
];

foreach ($values as $value1) {
    $num1 = new BcMath\Number($value1);

    foreach ($values as $value2) {
        echo "{$value1} * {$value2}\n";
        $ret = $num1 * ((string) $value2);
        $ret2 = ((string) $value1) * (new BcMath\Number($value2));
        if ($ret->compare($ret2) !== 0) {
            echo "Result is incorrect.\n";
        }
        var_dump($ret);
        echo "\n";
    }
}
?>
--EXPECT--
100 * 100
object(BcMath\Number)#2 (2) {
  ["value"]=>
  string(5) "10000"
  ["scale"]=>
  int(0)
}

100 * -20
object(BcMath\Number)#3 (2) {
  ["value"]=>
  string(5) "-2000"
  ["scale"]=>
  int(0)
}

100 * 0.01
object(BcMath\Number)#4 (2) {
  ["value"]=>
  string(4) "1.00"
  ["scale"]=>
  int(2)
}

100 * -0.40
object(BcMath\Number)#5 (2) {
  ["value"]=>
  string(6) "-40.00"
  ["scale"]=>
  int(2)
}

-20 * 100
object(BcMath\Number)#1 (2) {
  ["value"]=>
  string(5) "-2000"
  ["scale"]=>
  int(0)
}

-20 * -20
object(BcMath\Number)#3 (2) {
  ["value"]=>
  string(3) "400"
  ["scale"]=>
  int(0)
}

-20 * 0.01
object(BcMath\Number)#4 (2) {
  ["value"]=>
  string(5) "-0.20"
  ["scale"]=>
  int(2)
}

-20 * -0.40
object(BcMath\Number)#5 (2) {
  ["value"]=>
  string(4) "8.00"
  ["scale"]=>
  int(2)
}

0.01 * 100
object(BcMath\Number)#2 (2) {
  ["value"]=>
  string(4) "1.00"
  ["scale"]=>
  int(2)
}

0.01 * -20
object(BcMath\Number)#3 (2) {
  ["value"]=>
  string(5) "-0.20"
  ["scale"]=>
  int(2)
}

0.01 * 0.01
object(BcMath\Number)#4 (2) {
  ["value"]=>
  string(6) "0.0001"
  ["scale"]=>
  int(4)
}

0.01 * -0.40
object(BcMath\Number)#5 (2) {
  ["value"]=>
  string(7) "-0.0040"
  ["scale"]=>
  int(4)
}

-0.40 * 100
object(BcMath\Number)#1 (2) {
  ["value"]=>
  string(6) "-40.00"
  ["scale"]=>
  int(2)
}

-0.40 * -20
object(BcMath\Number)#3 (2) {
  ["value"]=>
  string(4) "8.00"
  ["scale"]=>
  int(2)
}

-0.40 * 0.01
object(BcMath\Number)#4 (2) {
  ["value"]=>
  string(7) "-0.0040"
  ["scale"]=>
  int(4)
}

-0.40 * -0.40
object(BcMath\Number)#5 (2) {
  ["value"]=>
  string(6) "0.1600"
  ["scale"]=>
  int(4)
}
