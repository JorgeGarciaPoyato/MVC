<?php
$this->layout('layout');
?>
 <section class="s-content s-content--narrow s-content--no-padding-bottom">

        <article class="row format-standard">
            <div class="s-content__header col-full">
                <h1 style="color: CornflowerBlue;" class="s-content__header-title">
                    <?= $posts->title ?>
                </h1>
                <ul class="s-content__header-meta">
                    <li>
                        <p style="color: CornflowerBlue;"><?= $posts->category ?>  <?= $posts->grade ?></p>
                        
                    </li>
                </ul>
            </div> <!-- end s-content__header -->
            <div>

                <p style="color: white;"class="lead"><?= $posts->body ?></p>
                
            </div>
            <p class="date"><?= $posts->updated_at ?></p>
        </article>
</section>


