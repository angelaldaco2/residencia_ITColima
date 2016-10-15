<div class="container">
    <a href="<?php echo base_url('vinculacion/nueva_empresa') ?>" class="btn btn-default" role="button"><span class="glyphicon glyphicon-plus"> Agregar empresa</span></a>
</div>
<?php if(count($fila)>0){ ?>
<div class="container">
    <table class="table">
        <thead>
            <tr>
                <td><strong>Nombre<strong/></td>
                <td><strong>Teléfono 1<strong/></td>
                <td><strong>Teléfono 2<strong/></td>
                <td><strong>Correo electrónico<strong/></td>
                <td><strong>Dirección<strong/></td>
                <td><strong>Acciones<strong/></td>
            </tr>
        </thead>
        <?php foreach($fila as $data){ ?>
        <tbody>
            <tr>
                <td><?php echo $data -> nombre ;?></td>
                <td><?php echo $data -> tel_1 ;?></td>
                <td><?php echo $data -> tel_2 ;?></td>
                <td><?php echo $data -> correo ;?></td>
                <td><?php echo $data -> direccion ;?></td>
                <td>
                    <form method="post" action="<?php echo base_url() ?>vinculacion/editar_empresa">
                        <input type="text" name="id_empresa" value="<?php echo $data -> id_empresa ;?>" hidden>
                        <button type="submit" class="btn btn-default" title="Ediar">
                            <span class="glyphicon glyphicon-edit"></span>
                        </button>
                    </form>
                </td>
                <td>
                    <form method="post" action="<?php echo base_url() ?>vinculacion/borrar_empresa">
                        <input type="text" name="id_empresa" value="<?php echo $data -> id_empresa ;?>" hidden>
                        <button type="submit" class="btn btn-danger" title="Ediar">
                            <span class="glyphicon glyphicon-trash"></span>
                        </button>
                    </form>
                </td>
            </tr>
        </tbody>
        <?php } ?>
    </table>
</div>
<?php } ?>
<br>