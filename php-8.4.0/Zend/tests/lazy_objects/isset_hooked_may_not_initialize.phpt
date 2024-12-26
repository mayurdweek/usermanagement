--TEST--
Lazy objects: hooked property isset may does not initialize object if hook does not observe object state
--FILE--
<?php

class C {
    public $a {
        get { return 1; }
        set($value) { }
    }
    public int $b = 1;

    public function __construct(int $a) {
        var_dump(__METHOD__);
        $this->a = $a;
        $this->b = 2;
    }
}

function test(string $name, object $obj) {
    printf("# %s:\n", $name);

    var_dump($obj);
    var_dump(isset($obj->a));
    var_dump($obj);
}

$reflector = new ReflectionClass(C::class);

$obj = $reflector->newLazyGhost(function ($obj) {
    var_dump("initializer");
    $obj->__construct(1);
});

test('Ghost', $obj);

$obj = $reflector->newLazyProxy(function ($obj) {
    var_dump("initializer");
    return new C(1);
});

test('Proxy', $obj);

--EXPECTF--
# Ghost:
lazy ghost object(C)#%d (0) {
  ["b"]=>
  uninitialized(int)
}
bool(true)
lazy ghost object(C)#%d (0) {
  ["b"]=>
  uninitialized(int)
}
# Proxy:
lazy proxy object(C)#%d (0) {
  ["b"]=>
  uninitialized(int)
}
bool(true)
lazy proxy object(C)#%d (0) {
  ["b"]=>
  uninitialized(int)
}