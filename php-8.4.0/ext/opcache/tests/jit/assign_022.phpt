--TEST--
JIT ASSIGN: 022
--INI--
opcache.enable=1
opcache.enable_cli=1
opcache.file_update_protection=0
;opcache.jit_debug=257
--EXTENSIONS--
opcache
--FILE--
<?php
function foo() {
    $a = array(1);
    $a[0] = $undef;
    for($i=0; $i<6; $i++) {
        $undef = 1;
    }
}
foo();
echo "ok\n";
?>
--EXPECTF--
Warning: Undefined variable $undef in %s on line %d
ok