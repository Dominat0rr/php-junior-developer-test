<?php include 'includes/header.php'; ?>

      <div class="jumbotron">
        <h1>Astronomy Picture of the Day</h1>
      </div>
        <h3><?php echo $title;; ?></h3>
        <?php  if ($apod != null) { ?>
            <div class="row marketing">
                <div class="col-md-10">
                    <?php 
                        $pic_heading = "";
                        if (isset($apod->copyright)) {
                            $pic_heading = $apod->copyright . "  |  " . $apod->date;
                        } else {
                            $pic_heading = $apod->date;
                        }
                    ?>
                    <h4><?php echo $pic_heading; ?></h4>
                    <p><?php echo $apod->explanation; ?></p>
                    <img class="apod-picture" src="<?php echo $apod->url; ?>" alt="">
                    <br><br>

                    <?php
                        if (isset($apod->hdurl)) {
                            echo "<a href='<?php echo $apod->hdurl; ?>'>HD Image</a>";
                        }

                    ?>
                    <br>
                    <a href="index.php" class="btn btn-default">Go Back</a>
                </div>
        </div>
        <?php } ?>

<?php include 'includes/footer.php'; ?>