--TEST--
Lazy objects: var_dump may not initialize object with __debugInfo() method
--FILE--
<?php

class C {
    public int $a;
    public function __construct() {
        var_dump(__METHOD__);
        $this->a = 1;
    }
    public function __debugInfo() {
        return ['hello'];
    }
}

function test(string $name, object $obj) {
    $reflector = new ReflectionClass(C::class);

    printf("# %s\n", $name);

    var_dump($obj);
    printf("Initialized:\n");
    var_dump(!$reflector->isUninitializedLazyObject($obj));
}

$reflector = new ReflectionClass(C::class);

$obj = $reflector->newLazyGhost(function ($obj) {
    var_dump("initializer");
    $obj->__construct();
});

test('Ghost', $obj);

$obj = $reflector->newLazyProxy(function ($obj) {
    var_dump("initializer");
    return new C();
});

test('Proxy', $obj);

--EXPECTF--
# Ghost
lazy ghost object(C)#%d (1) {
  [0]=>
  string(5) "hello"
}
Initialized:
bool(false)
# Proxy
lazy proxy object(C)#%d (1) {
  [0]=>
  string(5) "hello"
}
Initialized:
bool(false)