<?php include 'includes/header.php'; ?>

      <div class="jumbotron">
        <h1><?php echo $title; ?></h1>
      </div>
        <?php  
            if ($apods != null) {
            foreach($apods as $apod): ?>
            <div class="row marketing">
                <div class="col-md-10">
                    <h4><?php echo $apod->title; ?></h4>
                    <p>Date: <?php echo $apod->date; ?></p>
                    <?php
                        if ($apod->media_type == "image") {
                            echo "<a href='apod.php?date=" . $apod->date . "'><img class='apod-picture' src='". $apod->url . "' alt=''></a>";
                        } else {
                            echo "<iframe width=\"670\" height=\"500\" src=\" $apod->url \"></iframe>";
                            echo "<br>";
                            echo "<a class='btn btn-default' href='apod.php?date=" . $apod->date . "'>Video details</a>";
                        }
                    ?>
                </div>
        </div>
        <?php 
            endforeach; 
            }
        ?>
        <br>
        <?php echo $links; ?>
        <br><br>

<?php include 'includes/footer.php'; ?>