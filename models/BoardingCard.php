<?php
namespace models;

include_once 'Transportation.php';

class BoardingCard implements Transportation
{

    /**
     * @var mixed
     */
    private $type;
    /**
     * @var mixed
     */
    private $from;
    /**
     * @var mixed
     */
    private $to;
    /**
     * @var mixed
     */
    private $seat;

    /**
     * @param $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param $from
     */
    public function setFrom($from)
    {
        $this->from = $from;
    }

    /**
     * @return mixed
     */
    public function getFrom()
    {
        return $this->from;
    }

    /**
     * @param $to
     */
    public function setTo($to)
    {
        $this->to = $to;
    }

    /**
     * @return mixed
     */
    public function getTo()
    {
        return $this->to;
    }

    /**
     * @param $seat
     */
    public function setSeat($seat)
    {
        $this->seat = $seat;
    }

    /**
     * @return mixed
     */
    public function getSeat()
    {
        return $this->seat;
    }

    /**
     * @param array $dataArray
     */
    public function __construct(array $dataArray)
    {
        if (isset($dataArray['type'])) {
            $this->setType($dataArray['type']);
        }
        if (isset($dataArray['from'])) {
            $this->setFrom($dataArray['from']);
        }
        if (isset($dataArray['to'])) {
            $this->setTo($dataArray['to']);
        }
        if (isset($dataArray['seat'])) {
            $this->setSeat($dataArray['seat']);
        }
    }

    /**
     * @return mixed
     */
    public function generateJourneyString()
    {
        $journeyString = "From " . $this->getFrom() . " to " . $this->getTo() . ".";
        if ($this->getSeat() != "") {
            $journeyString = $journeyString . " Seat " . $this->getSeat() . ".";
        } else {
            $journeyString = $journeyString . " No seat assignment.";
        }
        return $journeyString;
    }

}
