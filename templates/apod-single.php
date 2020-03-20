<?php include 'includes/header.php'; ?>

      <div class="jumbotron">
        <h1>Astronomy Picture of the Day</h1>
      </div>
        <h3><?php echo $title;; ?></h3>
        <?php  if ($apod != null) { ?>
            <div class="row marketing">
                <div class="col-md-10">
                    <h4><?php echo $apod->copyright . "  |  " . $apod->date; ?></h4>
                    <p>Date: <?php echo $apod->explanation; ?></p>
                    <img class="apod-picture" src="<?php echo $apod->url; ?>" alt="">
                    <br><br>
                    <a href="<?php echo $apod->hdurl; ?>">HD Image</a>
                    <br>
                    <a href="index.php" class="btn btn-default">Go Back</a>
                </div>
        </div>
        <?php } ?>

<?php include 'includes/footer.php'; ?>