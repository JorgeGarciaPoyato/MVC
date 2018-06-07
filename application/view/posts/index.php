<?php
$this->layout('layout');
?>
    <!-- s-content
    ================================================== -->
    <section class="s-content">

        <div class="row narrow">
            <div class="col-full s-content__header" data-aos="fade-up">
                <h1 style="color: CornflowerBlue" class="lead">Todos los Posts</h1>
            </div>
        </div>
         
        <div class="row masonry-wrap">
            <div class="masonry">

                <div class="grid-sizer"></div>
                
                <?php foreach ($posts as $post): ?>

                <article class="masonry__brick entry format-standard" data-aos="fade-up">
                    <div class="entry__text">
                        <div class="entry__header">
                            <h3 class="entry__title"><a style="color: CornflowerBlue"  href="#"><?= $post->title ?></a></h2>   
                        </div>
                        <div class="entry__excerpt">
                            <p style="color: Black">
                                <?= $post->excerpt ?>
                            </p>
                        </div>
                        <?php if (isset($_SESSION['user_id'])): ?>
                        <div class="entry__excerpt">
                            <a href="/post/show/<?= $post->id ?>">Leer el post</a>
                        </div>
                        <?php endif ?>
                        <?php if (!isset($_SESSION['user_id'])): ?>
                        <div class="entry__excerpt">
                            <p>Logueate para leer el post</a>
                        </div>
                        <?php endif ?>
                        <div class="entry__meta">
                            <span class="entry__meta-links">
                                <p><?= $post->category ?>  <?= $post->grade ?></p>
                           </span>
                      
                        </div>
                        <div class="entry__date">
                                <a href="#"><?= $post->updated_at ?></a>
                        </div>
    
                </article> 
             <?php endforeach ?>
            </div> <!-- end masonry -->
        </div> <!-- end masonry-wrap -->

    </section> <!-- s-content -->
</section>