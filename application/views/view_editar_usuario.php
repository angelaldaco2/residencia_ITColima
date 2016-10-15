<form class="form" method="post" action="<?php echo base_url() ?>vinculacion/actualizar_usuario">
    <div class="container col-lg-6 col-lg-offset-3">
        <div class="container col-lg-12 text-center">
            <h4><strong>Editar usuario</strong></h4>
        </div>
        <?php foreach($fila as $data){
        ?>
        <div class="form-group">
            <label for="usr">Nombre de usuario:</label>
            <input type="text" class="form-control" name="clave" id="usr" value="<?php echo $data -> id_usuario ?>" autocomplete="off" required readonly>
        </div>
        <div class="form-group">
            <label for="nom">Nombre:</label>
            <input type="text" class="form-control" name="nombre" id="nom" value="<?php echo $data -> nombre ?>" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="pwd">Contraseña:</label>
            <input type="password" class="form-control" name="pass" id="pwd" value="<?php echo $data -> contrasena ?>" autocomplete="off" required>
        </div>
        <div class="form-group">
            <label for="sel_dpto">Departamento:</label>
            <select class="form-control" name="departamento" id="sel_dpto">
                <?php switch ($data->departamento){
                    case 'Ciencias de la Tierra': ?>
                        <option selected>Ciencias de la Tierra</option>
                        <option>Ciencias Económico Administrativas</option>
                        <option>Gestión Tecnológica y Vinculación</option>
                        <option>Industrial</option>
                        <option>Eléctrica y Electrónica</option>
                        <option>Química y Bioquímica</option>
                        <option>Recursos Materiales y Servicios</option>
                        <option>Sistemas y Computación</option>
                        <option>Subdirección Académica</option>
                        <?php
                        break;
                    case 'Ciencias Económico Administrativas': ?>
                        <option>Ciencias de la Tierra</option>
                        <option selected>Ciencias Económico Administrativas</option>
                        <option>Gestión Tecnológica y Vinculación</option>
                        <option>Industrial</option>
                        <option>Eléctrica y Electrónica</option>
                        <option>Química y Bioquímica</option>
                        <option>Recursos Materiales y Servicios</option>
                        <option>Sistemas y Computación</option>
                        <option>Subdirección Académica</option>
                        <?php
                        break;
                    case 'Gestión Tecnológica y Vinculación': ?>
                        <option>Ciencias de la Tierra</option>
                        <option>Ciencias Económico Administrativas</option>
                        <option selected>Gestión Tecnológica y Vinculación</option>
                        <option>Industrial</option>
                        <option>Eléctrica y Electrónica</option>
                        <option>Química y Bioquímica</option>
                        <option>Recursos Materiales y Servicios</option>
                        <option>Sistemas y Computación</option>
                        <option>Subdirección Académica</option>
                        <?php
                        break;
                    case 'Industrial': ?>
                        <option>Ciencias de la Tierra</option>
                        <option>Ciencias Económico Administrativas</option>
                        <option>Gestión Tecnológica y Vinculación</option>
                        <option selected>Industrial</option>
                        <option>Eléctrica y Electrónica</option>
                        <option>Química y Bioquímica</option>
                        <option>Recursos Materiales y Servicios</option>
                        <option>Sistemas y Computación</option>
                        <option>Subdirección Académica</option>
                        <?php
                        break;
                    case 'Eléctrica y Electrónica': ?>
                        <option>Ciencias de la Tierra</option>
                        <option>Ciencias Económico Administrativas</option>
                        <option>Gestión Tecnológica y Vinculación</option>
                        <option>Industrial</option>
                        <option selected>Eléctrica y Electrónica</option>
                        <option>Química y Bioquímica</option>
                        <option>Recursos Materiales y Servicios</option>
                        <option>Sistemas y Computación</option>
                        <option>Subdirección Académica</option>
                        <?php
                        break;
                    case 'Química y Bioquímica': ?>
                        <option>Ciencias de la Tierra</option>
                        <option>Ciencias Económico Administrativas</option>
                        <option>Gestión Tecnológica y Vinculación</option>
                        <option>Industrial</option>
                        <option>Eléctrica y Electrónica</option>
                        <option selected>Química y Bioquímica</option>
                        <option>Recursos Materiales y Servicios</option>
                        <option>Sistemas y Computación</option>
                        <option>Subdirección Académica</option>
                        <?php
                        break;
                    case 'Recursos Materiales y Servicios': ?>
                        <option>Ciencias de la Tierra</option>
                        <option>Ciencias Económico Administrativas</option>
                        <option>Gestión Tecnológica y Vinculación</option>
                        <option>Industrial</option>
                        <option>Eléctrica y Electrónica</option>
                        <option>Química y Bioquímica</option>
                        <option selected>Recursos Materiales y Servicios</option>
                        <option>Sistemas y Computación</option>
                        <option>Subdirección Académica</option>
                        <?php
                        break;
                    case 'Sistemas y Computación': ?>
                        <option>Ciencias de la Tierra</option>
                        <option>Ciencias Económico Administrativas</option>
                        <option>Gestión Tecnológica y Vinculación</option>
                        <option>Industrial</option>
                        <option>Eléctrica y Electrónica</option>
                        <option>Química y Bioquímica</option>
                        <option>Recursos Materiales y Servicios</option>
                        <option selected>Sistemas y Computación</option>
                        <option>Subdirección Académica</option>
                        <?php
                        break;
                    case 'Subdirección Académica': ?>
                        <option>Ciencias de la Tierra</option>
                        <option>Ciencias Económico Administrativas</option>
                        <option>Gestión Tecnológica y Vinculación</option>
                        <option>Industrial</option>
                        <option>Eléctrica y Electrónica</option>
                        <option>Química y Bioquímica</option>
                        <option>Recursos Materiales y Servicios</option>
                        <option>Sistemas y Computación</option>
                        <option selected>Subdirección Académica</option>
                        <?php
                        break;
                    default:
                        break;
                } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="sel_cargo">Cargo:</label>
            <select class="form-control" name="cargo" id="sel_cargo">
                <?php switch ($data->cargo){
                    case 'Jefe de departamento': ?>
                        <option selected>Jefe de departamento</option>
                        <option>Subdirector</option>
                        <option>Vinculacion</option>
                        <option>Recursos materiales</option>
                        <?php
                        break;
                    case 'Subdirector': ?>
                        <option>Jefe de departamento</option>
                        <option selected>Subdirector</option>
                        <option>Vinculacion</option>
                        <option>Recursos materiales</option>
                        <?php
                        break;
                    case 'Vinculacion': ?>
                        <option>Jefe de departamento</option>
                        <option>Subdirector</option>
                        <option selected>Vinculacion</option>
                        <option>Recursos materiales</option>
                        <?php
                        break;
                    case 'Recursos materiales': ?>
                        <option>Jefe de departamento</option>
                        <option>Subdirector</option>
                        <option>Vinculacion</option>
                        <option selected>Recursos materiales</option>
                        <?php
                        break;
                    default:
                        break;
                } ?>
            </select>
        </div>
        <?php
        }
        ?>
        <div class="container col-lg-12 text-center">
            <input type="submit" name="submit" class="btn btn-success"  value="Guardar"/>
        </div>
    </div>
</form>