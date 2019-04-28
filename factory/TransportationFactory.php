<?php
namespace factory;

include_once 'models/BoardingCard.php';
include_once 'models/BusBoardingCard.php';
include_once 'models/FlightBoardingCard.php';
include_once 'models/TrainBoardingCard.php';

use models\BoardingCard;
use models\BusBoardingCard;
use models\FlightBoardingCard;
use models\TrainBoardingCard;

class TransportationFactory
{
    /**
     * get journey depend on its type
     * @param array $journeyArray which contain journey information, 'type' key is required
     * @return Transportation|boolean return object of type transportation or false if not found
     */
    public static function getJourney(array $journeyArray)
    {
        if (!isset($journeyArray['type'])) {
            return false;
        }
        if ($journeyArray['type'] == 'bus') {
            return new BusBoardingCard($journeyArray);
        } else if ($journeyArray['type'] == 'flight') {
            return new FlightBoardingCard($journeyArray);
        } else if ($journeyArray['type'] == 'train') {
            return new TrainBoardingCard($journeyArray);
        } else {
            return new BoardingCard($journeyArray);
        }
    }
}
