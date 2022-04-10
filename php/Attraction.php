<?php

//use Admin as GlobalAdmin;

class Attraction
{
    protected $location;
    protected $availablity;
    protected $cost;
    protected $journey_duration;
    protected $tourit_guide;
    protected $description;
    protected $attraction_image;

    function __construct(
        $location,
        $availablity,
        $cost,
        $journey_duration,
        $tourit_guide,
        $description,
        $attraction_image
    ) {
        $this->location = $location;
        $this->availablity = $availablity;
        $this->cost = $cost;
        $this->journey_duration = $journey_duration;
        $this->tourit_guide = $tourit_guide;
        $this->description = $description;
        $this->attraction_image = $attraction_image;
    }

    //Geter and Setter
    public function getLocation()
    {
        return $this->location;
    }

    public function setLocation($location)
    {
        $this->location = $location;
    }

    public function getAvailablity()
    {
        return $this->availablity;
    }

    public function setAvailablity($Availablity)
    {
        $this->availablity = $Availablity;
    }

    public function getCost()
    {
        return $this->cost;
    }

    public function setCost($cost)
    {
        $this->cost = $cost;
    }

    public function getJourneyDuration()
    {
        return $this->journey_duration;
    }

    public function setJourneyDuration($journey_duration)
    {
        $this->journey_duration = $journey_duration;
    }

    public function getTouritGuide()
    {
        return $this->tourit_guide;
    }

    public function setTouritGuide($tourit_guide)
    {
        $this->tourit_guide = $tourit_guide;
    }

    public function getDescription()
    {
        return $this->description;
    }

    public function setDescription($description)
    {
        $this->description = $description;
    }

    public function getAttractionImage()
    {
        return $this->attraction_image;
    }

    public function setAttractionImage($attraction_image)
    {
        $this->attraction_image = $attraction_image;
    }
}
