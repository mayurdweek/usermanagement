--TEST--
Private property with final hook
--FILE--
<?php

class Test {
    private $prop { final get; }
}

?>
--EXPECTF--
Fatal error: Property hook cannot be both final and private in %s on line %d
