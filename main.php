<?php 

define('__ROOT__', dirname(__FILE__));
require_once __ROOT__ . "/Container/Standard10ftContainer.php";
require_once __ROOT__ . "/Container/Standard40ftContainer.php";
require_once __ROOT__ . "/Package/ToysPackage.php";
require_once __ROOT__ . "/Container/SmallPackage.php";
require_once __ROOT__ . "/Container/MediumLargePackage.php";
require_once __ROOT__ . "/Container/LargePackage.php";
require_once __ROOT__ . "/Container/MediumPackage.php";
require_once __ROOT__ . "/PackingAlgorithm/PackingAlgorithm.php";

echo "Transport 1:\n";

$availableContainers = [
    new Standard10ftContainer(),
    new Standard40ftContainer(),
];

$packages = [];
for ($i = 0; $i < 27; $i++) {
    $packages[] = new ToysPackage();
}

$packingAlgorithm = new PackingAlgorithm();

$packingResult = $packingAlgorithm->calculate($packages, $availableContainers);

foreach ($packingResult as $containerType => $count) {
    echo "Number of " . $containerType . " containers needed: " . $count . "\n";
}

echo "Transport 2:\n";

$availableContainers = [
    new Standard10ftContainer(),
    new Standard40ftContainer(),
];

$packages = [];
for ($i = 0; $i < 24; $i++) {
    $packages[] = new MediumLargePackage();
}

for ($i = 0; $i < 33; $i++) {
    $packages[] = new SmallPackage();
}

$packingResult = $packingAlgorithm->calculate($packages, $availableContainers);

foreach ($packingResult as $containerType => $count) {
    echo "Number of " . $containerType . " containers needed: " . $count . "\n";
}

echo "Transport 3:\n";

$availableContainers = [
    new Standard10ftContainer(),
    new Standard40ftContainer(),
];

$packages = [];
for ($i = 0; $i < 10; $i++) {
    $packages[] = new MediumPackage();
}

for ($i = 0; $i < 25; $i++) {
    $packages[] = new LargePackage();
}

$packingResult = $packingAlgorithm->calculate($packages, $availableContainers);

foreach ($packingResult as $containerType => $count) {
    echo "Number of " . $containerType . " containers needed: " . $count . "\n";
}
