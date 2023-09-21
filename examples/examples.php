<?php
/**
 * @author Burak Boz
 * @email repos@burakboz.net
 * @package Mobiliz
 * @description Example usages of Mobiliz API
 */
require_once "../src/MobilizClient.php";

$apiKey = "use_your_own_api_key_here";
$server = "su0"; // optional server

# Instance example 1
$mobiliz = new \BurakBoz\Mobiliz\MobilizClient($apiKey, $server);

/*
# Instance example 2
$mobiliz = new \BurakBoz\MobilizClient();
$mobiliz->setToken($apiKey); // required
$mobiliz->setServer($server); // optional
*/

/**
 * Dumper
 * @param $name
 * @param $var
 * @return void
 */
function dump($name, $var): void
{
    $name = "DUMP: " . $name;
    $format = PHP_SAPI !== "cli" ? "<h3>%s</h3>\n%s\n<hr>\n" : "%s\n-----\n%s\n-----\n\n";
    echo \sprintf($format, $name, \var_export($var, true));
}

/**
 * Change ID and Date values with yours to test.
 */
dump("Plate Formatter", $mobiliz->formatPlate("34 pR 91 50 "));
dump("Activity Last", $mobiliz->activityLast());
dump("Activity Last 244291", $mobiliz->activityLast(null,null, null,244291));
dump("locations", $mobiliz->locations());
dump("drivers", $mobiliz->drivers());
dump("vehicles", $mobiliz->vehicles());
dump("groups", $mobiliz->groups());
dump("fleets", $mobiliz->fleets());
dump("eventCodes", $mobiliz->eventCodes());
dump("properties", $mobiliz->properties(1));
dump("vehicleTypes", $mobiliz->vehicleTypes("tr_TR"));
dump("vehicleSubTypes", $mobiliz->vehicleSubTypes(1, "tr_TR"));
dump("violationTypes", $mobiliz->violationTypes("tr_TR"));
dump("reportCanBusDetail", $mobiliz->reportCanBusDetail("2023-01-16T21:00:00.00+00:00","2023-01-20T21:00:00.00+00:00", "tr_TR", null, null, 4028606));
dump("reportActivityDetail", $mobiliz->reportActivityDetail("2023-01-16T21:00:00.00+00:00","2023-01-20T21:00:00.00+00:00", "tr_TR", null, null, 4028606));
