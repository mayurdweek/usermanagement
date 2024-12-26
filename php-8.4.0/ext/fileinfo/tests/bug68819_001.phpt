--TEST--
Bug #68819 Fileinfo on specific file causes spurious OOM and/or segfault, var 1
--EXTENSIONS--
fileinfo
--FILE--
<?php

$string = <<<HERE
----a-----'''---------a---------------a--------a-----a-----a---------a-----as-------a----a--a-------------a--as-----s---------------a---------a---a--s-a-----a-----------asy---------a-----a-----------a----s--------a-------------a-------a--------a----s------------a-----a----------------a----s-----------------\r\n-------------------a-------a-a-------a-----a----a----s----s--------a-----------------------a----a----s-------------a------------------s-------a----a---a------as---s-a--------------s-----a------a-y--a-------a-----a--a--------a----s--------a-------------a-------a--------a----s--------------a-----a----------a----------s--a----------s-----------------\r\n-------------------a-------a-a-------a-----a----a----s----s--------a----------a----------------------a----a----s-------------a----------------------------s-------a----a---a------as---s-a--------------s-----a------a-y--a-------a-----a--a--------a----s--------a-------------a-------a--------a----s--------------a-----a----------a----------s--a----------s-----------------\r\n------a-------a-a-------a-----a----a---a-----a-----------------------a----a---a-----a------------------s-------a----a---a-----a------as---s-a--------------s-----a------a-y--a-------a-----a--a--------a----s--------a-------------a-------a--------a----s--------------a-----a----------a----------s--a----------s------\r\n-------------------a-------a-a-------a-----a----a---a-------a------------------------a----a---a-----''--a-------------------s-------a----a---a------as---s-a--------------s-----a------a-y--a-------a-----a--a--------a----s--------a-------------a-------a--------a----s--------------a-----a----------a----------s--a----------s-----------------\r\n-------------------a-------a-a-------a-----a----a-------s-----a---a-------------------------a----a-------------a---a-------------------s-------a----a-------------a---a-----as-a--------------a-----a--s----s---------y------------a-----a-s---a-------''----a---s--a-''------''----s------------a-y----------------s------a-----y--a-s--a-s------s--a-s----------''----------------------------a---s--a----a---------a-s---a-s--------s--------a---------s--a-y-------------as----a----a-------------a------a---s--a-s------a--------a----s----y--as--a----a-s---------------a-----a--------------------------------------\r\n-------------------a-------a-a-------a-----a----a-----------s--------a-----------------------a----a--------------------a------------------s-------a----a---a------as---s-a--------------s-----a------a-y--a-------a-----a--a--------a----s--------a-------------a-------a--------a----s--------------a-----a----------a----------s--a----------s-----------------\r\n-------------------a-------a-a-------a-----a----a-----------s--------a----------a----------------------a----a--------------------a------------------------------s-------a----a---a------as---s-a--------------s-----a------a-y--a-------a-----a--a--------a----s--------a-------------a-------a--------a----s--------------a-----a----------a----------s--a----------s-----------------\r\n-------------------a-------a-a-------a-----a----a---a-----------------------a----a---a------------------s-------a----a---a------as---s-a--------------s-----a------a-y--a-------a-----a--a--------a----s--------a-------------a-------a--------a----s--------------a-----a----------a----------s--a----------s-----------------\r\n-------------------a-------a-a-------a-----a----a---a----------a----------------------a----a---a------------------------------s-------a----a---a------as---s-a--------------s-----a------a-y--a-------a-----a--a--------a----s--------a-------------a-------a--------a----s--------------a-----a----------a----------s--a----------s-----------------\r\n-----a-a-----------a-------a-a-------a-----a----a----a---s-----a-----------------------a----a----a---------a-----------------s-------a----a----a---------a------as---s-a--------------s-----a------a-y--a-------a-----a--a--------a----s--------a-------------a-------a--------a----s--------------a-----a----------a----------s--a----------s-----------------\r\n-------------------a-------a-a-------a-----a----a--------a----a-----------------------a----a----------a----a------------------s-------a----a---a------as---s-a--------------s-----a------a-y--a-------a-----a--a--------a----s--------a-------------a-------a--------a----s--------------a-----a----------a----------s--a----------s-----------------\r\n-----a-------------a-------a-a-------a-----a----a--------s-----a---a-------------------------a----a--------------a---a-------------------s-------------a---------------a----a---a---a-----as-a--------------a-----a--s----s---------y------------a-----a-s---a-------''----a---s--a-''------''----s------------a-y----------------s------a-----y--a-s--a-s------s--a-s----------''----------------------------a---s--a----a---------a-s---a-s--------s--------a---------s--a-y-------------as----a----a-------------a------a---s--a-s------a--------a----s----y--as--a----a-s---------------a-----a--------------------------------------\r\n-------------------a-------a-a-------a-----a----a----------------a-----------------------a----a----------------a------------------s-------a----a---a------as---s-a--------------s-----a------a-y--a-------a-----a--a--------a----s--------a-------------a-------a--------a----s--------------a-----a----------a----------s--a----------s-----------------\r\n-------------------a-------a-a-------a-----a----a----------------a----------a----------------------a----a----------------a-----------------------------s-------a----a---a------as---s-a--------------s-----a------a-y--a-------a-----a--a--------a----s--------a-------------a-------a--------a----s--------------a-----a----------a----------s--a----------s-----------------\r\n---a---------------a-------a-a-------a-----as------------------------a--a--s------------------a-s------------------------a-----s--a-----'''----------a-s---------------------------------------------a-----s--a-----------------a---------a---a--s-a-----a-----------asy---------a-----a-----------a----s----------------------a----s--a-------------a-------a--------a----s------------a-----a----------------a----s------------------\r\n-a-----------------a-------a-a-------a--y---------a------------------y---------a-----'''-------y------a-y--a-------------------------a---------a---a----------as-a---a--s-a-----a-----------asy---------a-----a-----------a----s--------a-------------a-------a--------a----s---------a-----a----------------a----s------------------\r\n-a-----------------a-------a-a-------a--y-------------a------------------y-------------a-----'''-------y----------a-y--a-------------------------a---------a---a----------as-a---a--s-a-----a-----------asy---------a-----a-----------a----s--------a-------------a-------a--------a----s---------a-----a----------------a----s------------------\r\n-------------------a-------a-a-------a--a----a-----a------------------a----a-----a-----'''----------a----s----a----a-------s---a------------------a-----------a--s-a-----a---------------------a------a----s-a-----a-------s-s-------a----s--------a-------------a-------a--------a----s---------a-----a----------------a----s------------------\r\n------aa-----------a-------a-a------------s-a--s---------a---a------------------------a------------a---a------------------s--------a------------a---a------as---s-a--------------s-----a------a-y--a-------a-----a--a--------a----s--------a-------------a-------a--------a----s--------------a-----a----------a----------s--a----------s-----------------\r\n-------------------a-------a-a------------------------s-----s--a----a-----------------------------------------s--a----a------------------s---------------------------------s--a----a------as---s-a--------------s-----a------a-y--a-------a-----a--a--------a----s--------a-------------a-------a--------a----s--------------a-----a----------a----------s--a----------s-----------------\r\n-------------------a-------a-a--------------s-a---a--------------------------a---a------------------s----------a---a------as---s-a--------------s-----a------a-y--a-------a-----a--a--------a----s--------a-------------a-------a--------a----s---------------a-----a----------a----------s--a----------s-----------------\r\nsay-------a------------s-----''------a----s--------a-------------a-\r\n
HERE;

$finfo = new finfo();
$type = $finfo->buffer($string);

var_dump($type);
?>
--EXPECT--
string(66) "ASCII text, with very long lines (617), with CRLF line terminators"
