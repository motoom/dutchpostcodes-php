<?php

require_once "greatcircle.php";

$martinitoren = array(53.219332, 6.568239); // the Martinitoren in Groningen
$csamsterdam = array(52.378230, 4.899997); // Amsterdam Central Station
$km = GreatCircle::distance($martinitoren[0], $martinitoren[1], $csamsterdam[0], $csamsterdam[1]);
assert(intval($km) == 146);

require "calculator.php";

$calc = new Calculator();
assert(is_null($calc->distance(9718, 99999)));
assert(is_null($calc->distance(99999, 1000)));
assert(intval($calc->distance(9718, 1000)) == 146);

/*  TODO: Port from python
within = [postcode for (postcode, km) in calc.postcodesaround(9718, 10)]
assert len(within) > 0
assert 9811 in within
assert 1200 not in within
*/
?>