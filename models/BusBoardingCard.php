<?php
namespace models;

class BusBoardingCard extends BoardingCard implements Transportation
{

    /**
     * @param array $dataArray
     */
    public function __construct(array $dataArray)
    {
        parent::__construct($dataArray);
    }

    /**
     * @return mixed
     */
    public function generateJourneyString()
    {
        $journeyString = "Take the airport bus from " . $this->getFrom() . " to " . $this->getTo() . ".";
        if ($this->getSeat() != "") {
            $journeyString .= " Seat " . $this->getSeat() . ".";
        } else {
            $journeyString .= " No seat assignment.";
        }
        return $journeyString;
    }
}
