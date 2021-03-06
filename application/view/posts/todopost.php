<?php
$this->layout('adminlayout');
?>
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Todos los Posts</h3>
              <a href="/post/create" class="btn btn-info pull-right">Crear</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Titulo</th>
                  <th>Id del usuario</th>
                  <th>Categoria</th>
                  <th>Grado</th>
                  <th>Borrar</th>
                  <th>Editar</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($posts as $post): ?>
                     <tr>
                  <td style="width: 8%;"><?= substr($post->updated_at, 0,10)  ?></td>
                  <td><?= $post->title ?></td>
                  <td><?= $post->user_id?></td>
                  <td><?= $post->category ?></td>
                  <td><?= $post->grade ?></td>
                  <td> <a href="<?= URL ?>/post/delete/<?= $post->id ?>" onclick="return confirm('¿Seguro que quieres borrarlo?')">Borrar</a></td>
                  <td><a href="<?= URL ?>/post/edit/<?= $post->id ?>">Editar</a></td>
                </tr>
                  <?php endforeach ?>

                </tbody>

              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>