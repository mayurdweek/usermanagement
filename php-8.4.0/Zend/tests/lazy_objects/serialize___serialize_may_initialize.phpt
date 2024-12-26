--TEST--
Lazy objects: serialize() initializes object if __serialize observes object state
--FILE--
<?php

class C {
    public int $a;
    public function __serialize() {
        return ['a' => $this->a];
    }
}

function test(string $name, object $obj) {
    printf("# %s:\n", $name);

    $serialized = serialize($obj);
    $unserialized = unserialize($serialized);
    var_dump($serialized, $unserialized);
}

$reflector = new ReflectionClass(C::class);

$obj = $reflector->newLazyGhost(function ($obj) {
    var_dump("initializer");
    $obj->a = 1;
});

test('Ghost', $obj);

$obj = $reflector->newLazyProxy(function ($obj) {
    var_dump("initializer");
    $c = new c();
    $c->a = 1;
    return $c;
});

test('Proxy', $obj);

--EXPECTF--
# Ghost:
string(11) "initializer"
string(24) "O:1:"C":1:{s:1:"a";i:1;}"
object(C)#%d (1) {
  ["a"]=>
  int(1)
}
# Proxy:
string(11) "initializer"
string(24) "O:1:"C":1:{s:1:"a";i:1;}"
object(C)#%d (1) {
  ["a"]=>
  int(1)
}
