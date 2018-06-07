<?php
$this->layout('adminlayout');
?>
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Todos los Usuarios</h3>
              <a href="/user/create" class="btn btn-info pull-right">Crear</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Fecha</th>
                  <th>Nombre</th>
                  <th>email</th>
                  <th>Estado</th>
                  <th>Borrar</th>
                  <th>Editar</th>
                </tr>
                </thead>
                <tbody>
                  <?php foreach ($users as $user): ?>
                     <tr>
                  <td style="width: 8%;"><?= substr($user->updated_at, 0,10)  ?></td>
                  <td><?= $user->name ?></td>
                  <td><?= $user->email?></td>
                  <td><?= $user->status ?></td>
                  <td> <a href="<?= URL ?>/user/delete/<?= $user->id ?>" onclick="return confirm('¿Seguro que quieres borrarlo?')">Borrar</a></td>
                  <td><a href="<?= URL ?>/user/edit/<?= $user->id ?>">Editar</a></td>
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