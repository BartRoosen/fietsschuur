<?php

namespace Classes\Services;

use Classes\Entities\Bike;
use Classes\Entities\BikeRepository;

class SpecsRenderer
{
    const TEMPLATE_SPECS = 'templates/bikeSpecs.php';
    const DEFAULT_OUTPUT = '<h2>Specificaties</h2><div>Geen data beschikbaar</div>';

    /**
     * @var string
     */
    private $specsHtml;

    /**
     * @var BikeRepository
     */
    private $bikeRepo;

    /**
     * SpecsRenderer constructor.
     */
    public function __construct()
    {
        $this->getTemplateHtml();
        $this->bikeRepo = new BikeRepository();
    }

    private function getTemplateHtml()
    {
        $this->specsHtml = file_get_contents(self::TEMPLATE_SPECS);
    }

    /**
     * @param int $bikeId
     *
     * @return string
     */
    public function getBikeSpecs($bikeId)
    {
        $bikeArray = $this->bikeRepo->getBikes(['id' => $bikeId]);

        foreach ($bikeArray as $bike) {
            if ($bike instanceof Bike) {
                $price = 'Onbekend';

                if('0.00' !== $bike->getPrice()) {
                    $price = '€ ' . $bike->getPrice();
                }

                return sprintf(
                    $this->specsHtml,
                    true === (bool) $bike->isSold() ? 'danger' : 'info',
                    true === (bool) $bike->isSold() ? 'Verkocht' : 'Te koop',
                    $bike->getBrandName(),
                    $bike->getType(),
                    $bike->getSizeFrame(),
                    $bike->getSizeWheel(),
                    true === (bool) $bike->isSold() ? '' : $price,
                    '' === $bike->getInfo() ? 'Geen extra informatie beschikbaar' : $bike->getInfo()
                );
            }
        }

        return self::DEFAULT_OUTPUT;
    }
}
