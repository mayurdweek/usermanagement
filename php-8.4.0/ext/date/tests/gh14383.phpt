--TEST--
Bug GH-14383 (DateTime::createFromTimestamp overflowed microseconds value)
--INI--
date.timezone=UTC
--FILE--
<?php
$cases = [
    [0.999_999_0, '0.999_999_0'],
    [0.999_999_1, '0.999_999_1'],
    [0.999_999_8, '0.999_999_8'],
    [0.999_999_9, '0.999_999_9'],
    [1.000_000_0, '1.000_000_0'],
    [1.000_000_1, '1.000_000_1'],
    [1.000_000_8, '1.000_000_8'],
    [1.000_000_9, '1.000_000_9'],
    [1.000_001_0, '1.000_001_0'],
    [1.000_001_1, '1.000_001_1'],
    [1.000_001_8, '1.000_001_8'],
    [1.000_001_9, '1.000_001_9'],
];

echo "plus:\n";
foreach ($cases as [$usec, $label]) {
    echo "{$label}: ";
    echo DateTime::createFromTimestamp($usec)->format('s.u'), "\n";
}

echo "\nminus:\n";
foreach ($cases as [$usec, $label]) {
    echo "-{$label}: ";
    echo DateTime::createFromTimestamp(-$usec)->format('s.u'), "\n";
}
?>
--EXPECT--
plus:
0.999_999_0: 00.999999
0.999_999_1: 00.999999
0.999_999_8: 01.000000
0.999_999_9: 01.000000
1.000_000_0: 01.000000
1.000_000_1: 01.000000
1.000_000_8: 01.000001
1.000_000_9: 01.000001
1.000_001_0: 01.000001
1.000_001_1: 01.000001
1.000_001_8: 01.000002
1.000_001_9: 01.000002

minus:
-0.999_999_0: 59.000001
-0.999_999_1: 59.000001
-0.999_999_8: 59.000000
-0.999_999_9: 59.000000
-1.000_000_0: 59.000000
-1.000_000_1: 59.000000
-1.000_000_8: 58.999999
-1.000_000_9: 58.999999
-1.000_001_0: 58.999999
-1.000_001_1: 58.999999
-1.000_001_8: 58.999998
-1.000_001_9: 58.999998
