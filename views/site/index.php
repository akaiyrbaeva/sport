<?php
$this->title = 'Спорт мектебінің контингентін есепке алу';
?>

<br>
<div class="site-index">
    <div class="container">
        <div class="row">

            <div class="jumbotron">
            </div>

            <div class="jumbotron">
                <h2>
                    <?php
                    if (!Yii::$app->user->isGuest) {
                        echo 'Құрметті, ' . Yii::$app->user->identity->fio . '!<br/>Спорт мектебінің контингентін есепке алудың ақпараттық жүйесіне қош келдіңіз!';
                    } else {
                        echo 'Құрметті, қонақ!<br/>Спорт мектебінің контингентін есепке алудың ақпараттық жүйесіне қош келдіңіз!';
                    } ?>
                </h2>
                <!--                <p class="lead"></p>-->
            </div>

        </div>
    </div>
</div>