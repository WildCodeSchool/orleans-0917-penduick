<section id="menu" class="fondMenu">

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <h2>
                <img src="pictures/couverts.png" class="img-thumbnail img-responsive CouvertsPhotoLimites" alt="Couverts">
                <span class="Yellow">LA CARTE</span>
            </h2>
            <span class="TitleStars">********************************************</span>
            <br/>
            <span class="TitlePhrase"><?= $displayText[2] ?></span>
        </div>
        <?php
            for ($i = 3; $i <= 6; $i++) {
                ?>
                <div class="col-xs-4 col-xs-offset-1 marginTop">
                     <div class="vignettes">
                         <h3><?= $displayText[$i] ?></h3>
                         <img src="pictures/<?= $displayPictureLocalSrc[$i] ?>" class="pictureEcorne" alt="<?= $displayPictureName[$i] ?>"/>
                     </div>
                </div>
                <?php
            }
        ?>
    </div>
</section>
