<?php 

    include_once 'config/init.php';
    include 'includes/autoloader.php'; 
    
?>

<?php
    $template = new Template('templates/frontpage.php');
    $apodView = new APODView();
    $days = 30;

    $current_date = date('Y-m-d');
    $latest_date = $apodView->getLatestDay();
    $latest_date = (isset($latest_date->date)) ? $latest_date->date : null;

    if ($current_date > $latest_date) {
        for ($i = 0; $i < $days; $i++) {
            $current = time();
            $date = date('Y-m-d', strtotime('-' . $i . 'day', $current));
            $apod = $apodView->getPictureByDate($date);

            if (!$apod) {
                $apodAPI = $apodView->showApodPictureWithGivenDate($date);

                if (isset($apodAPI->copyright)) {
                    $copyright = $apodAPI->copyright;
                } else {
                    $copyright = null;
                }

                if (isset($apodAPI->hdurl)) {
                    $hdurl = $apodAPI->hdurl;
                } else {
                    $hdurl = null;
                }

                $apodView->addPicture($copyright, $apodAPI->date, $apodAPI->explanation, $apodAPI->media_type, $hdurl, $apodAPI->title, $apodAPI->url);
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