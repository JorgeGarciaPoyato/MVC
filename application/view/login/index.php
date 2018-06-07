<?php
$this->layout('layout');
?>
</section>
 <section class="s-content">

        <div class="row masonry-wrap">
            <div class="masonry">
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Login</div><br>

                <div class="card-body">
                    <form method="POST" action="<?= URL ?>/login/doLogin">
                        <div class="form-group row">
                            <label for="email" class="col-sm-4 col-form-label text-md-right">Correo</label>

                            <div class="col-md-6">
                                <input id="email" type="email"  name="email">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña</label>
                            <div class="col-md-6">
                                <input id="password" type="password" name="password">
                            </div>
                        </div>
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Enviar
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
     <br>
</section>