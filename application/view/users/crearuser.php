<?php
$this->layout('adminlayout');
?> 
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Crea un Usuario</h3>
				<form method="POST" action="<?= URL ?>/user/store">
                        <div>
                            <label>Nombre</label>
                            <div>
                                <input name="name">
                            </div>
                        </div>
                        <div>
                            <label>Email</label>
                            <div >
                                <input type="email" name="email">
                            </div>
                        </div>
                        <div>
                            <label>Contraseña</label>
                            <div >
                                <input type="password" name="password">
                            </div>
                        </div>
                        <br>
                       <div class="form-group">
                            <label>Roles</label>
                            <select name="role_id" class="form-control select1" style="width: 100%;">
                              <?php foreach ($roles as $role): ?>

                                   <option value="<?= $role->id ?>"> <?= $role->name ?></option>

                              <?php endforeach ?>
                            </select>
                          </div>
                        <br>
                        <br>
                        <div >
                            <div>
                                <button type="submit" class="btn btn-primary">Crear
                                </button>
                            </div>
                        </div>
                  </form>
             </div>
        </div>