<section id="menu" class="fondMenu">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <h2>
                    <img src="pictures/couverts.png" class="logoMenu" alt="Couverts">
                    <span class="yellow">LA CARTE</span>
                </h2>
                <span class="titleStars">********************************************</span>
                <br/>
                <span class="titlePhrase"><?= $displayText[2] ?></span>
            </div>
            <?php
                for ($i = 3; $i <= 6; $i++) {
                    ?>
                    <div class="col-xs-4 col-xs-offset-1 menuMargin">
                         <div class="vignettes">
                             <div class="col-xs-12">
                                 <h3><?= $displayText[$i] ?></h3>
                             </div>
                             <img src="pictures/<?= $displayPictureLocalSrc[$i] ?>" alt="<?= $displayPictureName[$i] ?>"/>
                         </div>
                    </div>
                    <?php
                }
            ?>
        </div><!-- row -->
    </div><!-- container -->
</section>
