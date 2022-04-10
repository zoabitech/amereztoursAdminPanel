<?php

if (
    isset($_POST['location']) && isset($_POST['availablity']) && isset($_POST['cost'])
    && isset($_POST['journey_duration']) && isset($_POST['tourit_guide']) && isset($_POST['description']) && isset($_POST['attraction_image'])
) {
    require_once("dbClass.php");
    require_once("validate.php");
    $location = validate($_POST['location']);
    $availablity = validate($_POST['availablity']);
    $cost = validate($_POST['cost']);
    $journey_duration = validate($_POST['journey_duration']);
    $tourit_guide = validate($_POST['tourit_guide']);
    $description = validate($_POST['description']);
    $attraction_image = validate($_POST['attraction_image']);
    $db = new dbClass();
    $a = new Attraction(
        $location,
        $availablity,
        $cost,
        $journey_duration,
        $tourit_guide,
        $description,
        $attraction_image
    );
    $result = $db->insertAttraction($a);
    if ($result)
        header('Location: http://127.0.0.1:5500/PHP/neworders.htm');
    else
        echo "failure";
}
