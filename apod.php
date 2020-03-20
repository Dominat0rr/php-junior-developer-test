<?php 

    include_once 'config/init.php';
    include 'includes/autoloader.php'; 
    
?>

<?php

    $template = new Template('templates/apod-single.php');
    $apodView = new APODView();

    $apodDate = isset($_GET['date']) ? $_GET['date'] : null;

    if ($apodDate) {
        //$template->apod = $apodView->showApodPictureWithGivenDate($apodDate);
        $template->apod = $apodView->getPictureByDate($apodDate);

        if ($template->apod == null) {
            $template->title = "We hebben geen foto gevonden voor deze datum";
        } else {
            $template->title = $template->apod->title;
        }
    } else {
        $template->title = "We hebben geen foto gevonden voor deze datum";
    }

    echo $template;
?>