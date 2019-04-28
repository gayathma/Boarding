<?php

include_once 'Api.php';

//get the data from json file
$journeyCollection = json_decode(file_get_contents('cards.json'), true);
//sort and print the result
$api = new Api($journeyCollection);
echo $api->getJourneyDetail();
