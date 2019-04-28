<?php

class Sorter
{

    /**
     * @var mixed
     */
    private $boardingCards;

    /**
     * @var array
     */
    private $toIndex = array();
    /**
     * @var array
     */
    private $fromIndex = array();

    /**
     * @param $boardingCards
     */
    public function Sorter($boardingCards)
    {
        $this->boardingCards = $boardingCards;
    }

    /**
     * Arrange the boarding cards
     */
    private function arrangeBoardingCards()
    {
        for ($counter = 0; $counter < count($this->boardingCards); $counter++) {

            $boardingCard = $this->boardingCards[$counter];

            $this->toIndex[$boardingCard->getTo()] = $boardingCard;
            $this->fromIndex[$boardingCard->getFrom()] = $boardingCard;
        }
    }

    /**
     * Get the start location
     * @return mixed
     */
    private function getStartLocation()
    {
        for ($counter = 0; $counter < count($this->boardingCards); $counter++) {

            $from = $this->boardingCards[$counter]->getFrom();
            /*
             * The start location is a place we depart from but never arrived
             */
            if (!array_key_exists($from, $this->toIndex)) {
                return $from;
            }
        }
        return null;
    }

    /**
     * Sort the boarding cards
     * @return mixed
     */
    public function sort()
    {
        /*
         * This arrange step takes O(n) time.
         *
         *  Arrange the from and to locations for fast lookup.
         */
        self::arrangeBoardingCards();
        /*
         * This next step also takes O(n) time.
         */
        $startLocation = self::getStartLocation();
        /*
         *  From the start location, traverse the boarding cards, creating a sorted list as we go.
         *
         * This step takes O(n) time.
         */
        $sortedBoardingCards = array();
        $currentLocation = $startLocation;
        /*
         * Assign respective boarding card while checking for undefined index
         */
        while ($currentBoardingCard = (array_key_exists($currentLocation, $this->fromIndex)) ? $this->fromIndex[$currentLocation] : null) {

            /*
             *  Add the boarding card to our sorted list.
             */
            array_push($sortedBoardingCards, $currentBoardingCard);
            /*
             *  Get our next location.
             */
            $currentLocation = $currentBoardingCard->getTo();
        }
        /*
         * After O(3n) operations, we can now return the sorted boarding cards.
         */
        return $sortedBoardingCards;
    }
}
