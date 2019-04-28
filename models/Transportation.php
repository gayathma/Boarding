<?php
namespace models;

interface Transportation
{
    /**
     * generate journey string according to journey types
     * @return mixed
     */
    public function generateJourneyString();
}
