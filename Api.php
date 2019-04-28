<?php

include_once 'factory/TransportationFactory.php';
include_once 'Sorter.php';

use factory\TransportationFactory;

class Api
{

    /**
     * @var mixed
     */
    private $boardingCards;
    /**
     * @var mixed
     */
    private $journeyCollection;

    /**
     * @param $journeyCollection
     */
    public function __construct($journeyCollection)
    {
        $this->journeyCollection = $journeyCollection;
    }

    /**
     * Get the sorted journey details
     * @return mixed
     */
    public function getJourneyDetail()
    {
        $transportationFactory = new TransportationFactory();

        foreach ($this->journeyCollection as $journey) {
            $modelsArray[] = $transportationFactory::getJourney($journey);
        }

        $sorter = new Sorter($modelsArray);
        $this->boardingCards = $sorter->sort();

        $str = '<ul>';
        for ($counter = 0; $counter < count($this->boardingCards); $counter++) {
            $currentCard = $this->boardingCards[$counter];
            $str .= '<li>' . $currentCard->generateJourneyString() . '</li>' . PHP_EOL;
        }
        //Final statement.
        $str .= '<li>You have arrived at your final destination.</li>' . PHP_EOL;
        $str .= '</ul>';
        return $str;
    }

}
