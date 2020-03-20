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
                    <a href="apod.php?date=<?php echo $apod->date; ?>"><img class="apod-picture" src="<?php echo $apod->url; ?>" alt=""></a>
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