--TEST--
GH-16695 (phar:// tar parser and zero-length file header blocks)
--CREDITS--
hakre
--EXTENSIONS--
phar
--INI--
phar.require_hash=0
--FILE--
<?php

$reportTar = __DIR__.'/gh16695_3.tmp';

$length = file_put_contents($reportTar, base64_decode('dGxzAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAADAwMDA3MDAAMDAwMDAwMAAwMDAwMDAwADAwMDAwMDAwMDAwADAwMDAwMDAwMDAwADAwNzcxMQAgMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAB1c3RhcgAwMAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAwMDAwMDAwADAwMDAwMDAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA='));
var_dump($length);
$buffer = file_get_contents("phar://$reportTar/tls");
var_dump($buffer);

?>
--CLEAN--
<?php
@unlink(__DIR__.'/gh16695_3.tmp');
?>
--EXPECT--
int(512)
string(0) ""