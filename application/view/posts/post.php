<?php
$this->layout('layout');
?>
</section>
 <section class="s-content s-content--narrow">
        <div class="row">
             <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                    <?= $posts->title ?>
                </h1>
            </div>
            <ul>
                        <p style="color: CornflowerBlue; text-align: center;"><?= $posts->category ?>  <?= $posts->grade ?></p>
                        
               
            </ul> <!-- end s-content__header -->
            <div>

                <p class="lead"><?= $posts->body ?></p>
                
            </div>
            <p class="date"><?= $posts->updated_at ?></p>
        </article>
</section>


