<?php
namespace models;

class TrainBoardingCard extends BoardingCard implements Transportation
{
    /**
     * @var mixed
     */
    private $trainNo;

    /**
     * @param $trainNo
     */
    public function setTrainNo($trainNo)
    {
        $this->trainNo = $trainNo;
    }

    /**
     * @return mixed
     */
    public function getTrainNo()
    {
        return $this->trainNo;
    }

    /**
     * @param array $dataArray
     */
    public function __construct(array $dataArray)
    {
        if (isset($dataArray['number'])) {
            $this->SetTrainNo($dataArray['number']);
        }
        parent::__construct($dataArray);
    }

    /**
     * @return mixed
     */
    public function generateJourneyString()
    {
        $journeyString = "Take train " . $this->getTrainNo() . " from " . $this->getFrom() . " to " . $this->getTo() . ".";
        if ($this->getSeat() != "") {
            $journeyString .= " Sit in seat " . $this->getSeat() . ".";
        } else {
            $journeyString = $journeyString . " No seat assignment.";
        }
        return $journeyString;
    }
}
