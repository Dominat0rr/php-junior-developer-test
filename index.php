<?php 

    include_once 'config/init.php';
    include 'includes/autoloader.php'; 
    
?>

<?php
    $template = new Template('templates/frontpage.php');
    $apodView = new APODView();

    $current_date = date('Y-m-d');
    $latest_date = $apodView->getLatestDay();
    $apods = null;

    if ($current_date > $latest_date) {
        $apods = $apodView->showApodPictures(30);
    }

    if ($apods != null) {
        foreach($apods as $apod) {
            if (!$apodView->getPictureByDate($apod->date)) {
                $apodView->addPicture($apod->copyright, $apod->date, $apod->explanation, $apod->hdurl, $apod->title, $apod->url);
            }
        }
    }

    $perPage = 5;
    $page = (isset($_GET['page'])) ? (int)$_GET['page'] : 1;
    $startAt = $perPage * ($page - 1);

    $totalPages = ceil(30 / $perPage);

    $template->links = "";

    for ($i = 1; $i <= $totalPages; $i++) {
        $template->links .= ($i != $page ) ? "<a class='btn btn-primary' href='index.php?page=$i'>$i</a> ": " $page ";
    }

    $template->apods = $apodView->getAllPicturesWithPagination($startAt, $perPage);

    //$template->apods = $apodView->getAllPictures();
    $template->title = "Astronomy Picture of the Day";

    echo $template;
?>