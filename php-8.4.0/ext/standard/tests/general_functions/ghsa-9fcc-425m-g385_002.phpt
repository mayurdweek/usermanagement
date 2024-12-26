--TEST--
GHSA-9fcc-425m-g385 - bypass CVE-2024-1874 - cmd.exe variation
--SKIPIF--
<?php
if( substr(PHP_OS, 0, 3) != "WIN" )
  die('skip Run only on Windows');
if (!str_contains(shell_exec("does_not_exist.exe 2>&1"), "is not recognized as an internal or external command")) {
  die("skip English locale required");
}
if (getenv("SKIP_SLOW_TESTS")) die("skip slow test");
?>
--FILE--
<?php

$batch_file_content = <<<EOT
@echo off
powershell -Command "Write-Output '%0%'"
powershell -Command "Write-Output '%1%'"
EOT;
$batch_file_path = __DIR__ . '/ghsa-9fcc-425m-g385_002.bat';

file_put_contents($batch_file_path, $batch_file_content);

$descriptorspec = [STDIN, STDOUT, STDOUT];

$proc = proc_open(["cmd.exe", "/c", $batch_file_path, "\"&notepad.exe"], $descriptorspec, $pipes);
proc_close($proc);
$proc = proc_open(["cmd.exe   ", "/c", $batch_file_path, "\"&notepad.exe"], $descriptorspec, $pipes);
proc_close($proc);
$proc = proc_open(["cmd.exe.   ", "/c", $batch_file_path, "\"&notepad.exe"], $descriptorspec, $pipes);
proc_close($proc);
$proc = proc_open(["cmd.exe. ...  ", "/c", $batch_file_path, "\"&notepad.exe"], $descriptorspec, $pipes);
proc_close($proc);
$proc = proc_open(["\\cmd.exe. ...  ", "/c", $batch_file_path, "\"&notepad.exe"], $descriptorspec, $pipes);

$proc = proc_open(["cmd", "/c", $batch_file_path, "\"&notepad.exe"], $descriptorspec, $pipes);
proc_close($proc);
$proc = proc_open(["cmd   ", "/c", $batch_file_path, "\"&notepad.exe"], $descriptorspec, $pipes);
proc_close($proc);
$proc = proc_open(["cmd.   ", "/c", $batch_file_path, "\"&notepad.exe"], $descriptorspec, $pipes);
$proc = proc_open(["cmd. ...  ", "/c", $batch_file_path, "\"&notepad.exe"], $descriptorspec, $pipes);
$proc = proc_open(["\\cmd. ...  ", "/c", $batch_file_path, "\"&notepad.exe"], $descriptorspec, $pipes);

?>
--EXPECTF--
%sghsa-9fcc-425m-g385_002.bat
"&notepad.exe
%sghsa-9fcc-425m-g385_002.bat
"&notepad.exe
%sghsa-9fcc-425m-g385_002.bat
"&notepad.exe
%sghsa-9fcc-425m-g385_002.bat
"&notepad.exe

Warning: proc_open(): CreateProcess failed: The system cannot find the file specified in %s on line %d
%sghsa-9fcc-425m-g385_002.bat
"&notepad.exe
%sghsa-9fcc-425m-g385_002.bat
"&notepad.exe

Warning: proc_open(): CreateProcess failed: The system cannot find the file specified in %s on line %d

Warning: proc_open(): CreateProcess failed: The system cannot find the file specified in %s on line %d

Warning: proc_open(): CreateProcess failed: The system cannot find the file specified in %s on line %d
--CLEAN--
<?php
@unlink(__DIR__ . '/ghsa-9fcc-425m-g385_002.bat');
?>
