<?php
namespace models;

class FlightBoardingCard extends BoardingCard implements Transportation
{
    /**
     * @var mixed
     */
    private $flightNo;
    /**
     * @var mixed
     */
    private $gateNo;
    /**
     * @var mixed
     */
    private $counter;

    /**
     * @param $flightNo
     */
    public function setFlightNo($flightNo)
    {
        $this->flightNo = $flightNo;
    }

    /**
     * @return mixed
     */
    public function getFlightNo()
    {
        return $this->flightNo;
    }

    /**
     * @param $gateNo
     */
    public function setGateNo($gateNo)
    {
        $this->gateNo = $gateNo;
    }

    /**
     * @return mixed
     */
    public function getGateNo()
    {
        return $this->gateNo;
    }

    /**
     * @param $counter
     */
    public function setCounter($counter)
    {
        $this->counter = $counter;
    }

    /**
     * @return mixed
     */
    public function getCounter()
    {
        return $this->counter;
    }

    /**
     * @param array $dataArray
     */
    public function __construct(array $dataArray)
    {
        if (isset($dataArray['gate'])) {
            $this->setGateNo($dataArray['gate']);
        }
        if (isset($dataArray['counter'])) {
            $this->setCounter($dataArray['counter']);
        }
        if (isset($dataArray['number'])) {
            $this->setFlightNo($dataArray['number']);
        }
        parent::__construct($dataArray);

    }

    /**
     * @return mixed
     */
    public function generateJourneyString()
    {
        $journeyString = "From " . $this->getFrom() . ", take flight " . $this->getFlightNo() . " to " . $this->getTo() . ".";
        if ($this->getGateNo() != "") {
            $journeyString .= " Gate " . $this->getGateNo() . ",";
        } else {
            $journeyString .= " No gate assignment.";
        }

        if ($this->getSeat() != "") {
            $journeyString .= " Seat " . $this->getSeat() . ".";
        } else {
            $journeyString .= " No seat assignment.";
        }

        if ($this->getCounter() != "") {
            $journeyString .= " Baggage drop at ticket counter " . $this->getCounter() . ".";
        } else {
            $journeyString .= " Baggage will we automatically transferred from your last leg.";
        }

        return $journeyString;
    }
}
