--TEST--
enchant_broker_free() function
--CREDITS--
marcosptf - <marcosptf@yahoo.com.br>
--EXTENSIONS--
enchant
--SKIPIF--
<?php
if (!is_object(enchant_broker_init())) {die("skip, resource dont load\n");}
?>
--FILE--
<?php
$broker = enchant_broker_init();
if (is_object($broker)) {
    echo "OK\n";
    enchant_broker_free($broker);

} else {
    exit("init failed\n");
}
echo "OK\n";
?>
--EXPECTF--
OK

Deprecated: Function enchant_broker_free() is deprecated since 8.0, as EnchantBroker objects are freed automatically in %s
OK
