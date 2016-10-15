<div class="container">
    <a href="<?php echo base_url('vinculacion/nuevo_usuario') ?>" class="btn btn-default" role="button"><span class="glyphicon glyphicon-plus"> Agregar usuario</span></a>
    <br>
    <table class="table">
        <thead style="width:100%">
            <tr>
                <td width="30%"><strong>Nombre<strong/></td>
                <td width="30%"><strong>Departamento<strong/></td>
                <td width="30%"><strong>Cargo<strong/></td>
                <td width="5%"><strong>Acciones<strong/></td>
            </tr>
        </thead>
        <?php if(count($fila)>0): foreach($fila as $data){
        ?>
        <tbody style="width:100%">
            <tr>
                <td width="30%"><?php echo $data -> nombre ;?></td>
                <td width="30%"><?php echo $data -> departamento ;?></td>
                <td width="30%"><?php echo $data -> cargo ;?></td>
                <td width="5%">
                    <form method="post" action="<?php echo base_url() ?>vinculacion/editar_usuario">
                        <input type="text" name="id_usuario" value="<?php echo $data -> id_usuario ;?>" hidden>
                        <button type="submit" class="btn btn-default" title="Ediar">
                            <span class="glyphicon glyphicon-edit"></span>
                        </button>
                    </form>
                </td>
                <td width="5%">
                    <form method="post" action="<?php echo base_url() ?>vinculacion/borrar_usuario">
                        <input type="text" name="id_usuario" value="<?php echo $data -> id_usuario ;?>" hidden>
                        <button type="submit" class="btn btn-danger" title="Eliminar">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
        <?php
        }endif;
        ?>
    </table>
</div>
<br>
