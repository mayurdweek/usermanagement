--TEST--
Lazy objects: GC 003
--FILE--
<?php

class Canary {
    public $value;
    public function __destruct() {
        var_dump(__FUNCTION__);
    }
}

class C {
}

function ghost() {
    printf("# Ghost:\n");

    $canary = new Canary();

    $obj = (new ReflectionClass(C::class))->newInstanceWithoutConstructor();
    (new ReflectionClass($obj))->resetAsLazyGhost($obj, function () use ($canary) {
    });

    $canary->value = $obj;
    $obj = null;
    $canary = null;

    gc_collect_cycles();
}

function proxy() {
    printf("# Proxy:\n");

    $canary = new Canary();

    $obj = (new ReflectionClass(C::class))->newInstanceWithoutConstructor();
    (new ReflectionClass($obj))->resetAsLazyProxy($obj, function () use ($canary) {
        return new C();
    });

    $canary->value = $obj;
    $obj = null;
    $canary = null;

    gc_collect_cycles();
}

ghost();
proxy();

?>
==DONE==
--EXPECT--
# Ghost:
string(10) "__destruct"
# Proxy:
string(10) "__destruct"
==DONE==