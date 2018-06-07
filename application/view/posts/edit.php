<?php
$this->layout('adminlayout');
?>
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Actualiza el Post</h3>
				<form method="POST" action="<?= URL ?>/post/update/<?= $post->id ?>">
                        <div>
                            <label>Titulo</label>
                            <div>
                                <input name="title" value="<?= $post->title ?>">
                            </div>
                        </div>

                        <div>
                            <label>Excerpt</label>
                            <div >
                                <input name="excerpt" value="<?= $post->excerpt ?>">
                            </div>
                        </div>
                         <div>
                            <label>Body</label>
                            <div >
                                <textarea name="body" ><?= $post->body ?></textarea> 
                            </div>
                        </div>
                        <div>
                            <label>Categoria</label>
                            <div >
                            <select name="category">
                                <?php foreach ($categories as $category): ?>
                                <option value="<?= $category->id ?>" <?= ($category->id==$post->category_id)?'selected':''; ?>>
                                	<?= $category->name ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                            </div>
                        </div>
                        <div>
                            <label>Grado</label>
                            <div >
                            <select name="grade">
                                <?php foreach ($grades as $grade): ?>
                                <option value="<?= $grade->id ?>" <?= ($grade->id==$post->grade_id)?'selected':''; ?>>
                                	<?= $grade->name ?>
                                </option>
                                <?php endforeach ?>
                            </select>
                            </div>
                        </div>
                        <div>
                            <div >
                                <input type="hidden" name="id" value="<?= $_SESSION['user_id'] ?>">
                            </div>
                        </div>
                        <br>
                        <br>
                        <div >
                            <div>
                                <button type="submit" class="btn btn-primary">Editar
                                </button>
                            </div>
                        </div>
                  </form>
             </div>
        </div>
    </section>