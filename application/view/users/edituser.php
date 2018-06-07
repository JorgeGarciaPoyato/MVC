<?php
$this->layout('adminlayout');
?>
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Crea un Usuario</h3>
				<form method="POST" action="<?= URL ?>/user/update/<?= $users->id ?>">
                        <div>
                            <label>Nombre</label>
                            <div>
                                <input name="name" value="<?= $users->name ?>">
                            </div>
                        </div>
                        <div>
                            <label>Email</label>
                            <div >
                                <input type="email" name="email" value="<?= $users->email ?>">
                            </div>
                        </div>
                        <div>
                            <label>Contraseña</label>
                            <div >
                                <input type="password" name="password">
                            </div>
                        </div>
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