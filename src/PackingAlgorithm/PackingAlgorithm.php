<?php

require_once __ROOT__ . '/Container/AbstractContainer.php';
require_once __ROOT__ . '/Package/AbstractPackage.php';

class PackingAlgorithm
{
    public function calculate(array $packages, array $containerTypes): array
    {
        usort($containerTypes, fn($a, $b) => $a->getVolume() - $b->getVolume());

        $containersUsed = [];
        while (!empty($packages)) {
            foreach ($containerTypes as $containerType) {
                $packedInfo = $this->packIntoContainer($containerType, $packages);
                if (!empty($packedInfo['packages'])) {
                    $containersUsed[] = $packedInfo;
                    $packages = array_diff_key($packages, $packedInfo['packages']);
                }

                if (empty($packages)) {
                    break;
                }
            }
        }

        return $containersUsed;
    }

    private function packIntoContainer(AbstractContainer $container, array $packages): array
    {
        $containerWidth = $container->getWidth();
        $rowPackages = $this->fillWidth($packages, $containerWidth);

        $containerLength = $container->getLength();
        $wallPackages = $this->fillLength($rowPackages['remaining'], $containerLength);

        $containerHeight = $container->getHeight();
        $containerPackages = $this->fillHeight($wallPackages['remaining'], $containerHeight);

        return ['container' => $container, 'packages' => $containerPackages['packed']];
    }

    private function fillWidth(array $packages, float $containerWidth): array
    {
        $packed = [];
        $remaining = $packages;
        $currentDimensionTotal = 0.0;

        foreach ($packages as $key => $package) {
            $packageDimension = $package->getWidth();
            if ($currentDimensionTotal + $packageDimension <= $containerWidth) {
                $packed[$key] = $package;
                unset($remaining[$key]);
                $currentDimensionTotal += $packageDimension;
            }
        }

        return ['packed' => $packed, 'remaining' => $remaining];
    }

    private function fillLength(array $packages, float $containerLength): array
    {
        $packed = [];
        $remaining = $packages;
        $currentDimensionTotal = 0.0;

        foreach ($packages as $key => $package) {
            $packageDimension = $package->getLength();
            if ($currentDimensionTotal + $packageDimension <= $containerLength) {
                $packed[$key] = $package;
                unset($remaining[$key]);
                $currentDimensionTotal += $packageDimension;
            }
        }

        return ['packed' => $packed, 'remaining' => $remaining];
    }

    private function fillHeight(array $packages, float $containerHeight): array
    {
        $packed = [];
        $remaining = $packages;
        $currentDimensionTotal = 0.0;

        foreach ($packages as $key => $package) {
            $packageDimension = $package->getHeight();
            if ($currentDimensionTotal + $packageDimension <= $containerHeight) {
                $packed[$key] = $package;
                unset($remaining[$key]);
                $currentDimensionTotal += $packageDimension;
            }
        }

        return ['packed' => $packed, 'remaining' => $remaining];
    }
}
