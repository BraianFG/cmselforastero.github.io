<?php
 include '../database.php';
?>
<div id="categorias" class="uk-container  uk-container-large wrap">
    <ul class="lista">
          <li class="lista__item"><a href="#agregar__producto-categorias"  uk-toggle class="button primary"> <i class="fas fa-plus"></i> Agregar</a></p></li>
     </ul>      
    <div class="uk-overflow-auto">     
    <table class="uk-table uk-table-striped ">
              <caption> <i class="fas fa-store"></i> categorias de productos</caption>
         <thead>    
             <tr>
                <th>N"</th>
                <th>NOMBRE</th>
                <th>ELIMINAR</th>
                <th>EDITAR</th>
            </tr>
        </thead>        
   <?php $productosp1 = 'SELECT * FROM `categorias` ORDER BY `id` ASC' ;     
          $result3 = mysqli_query($conn,$productosp1);
        
        ?>
        
        
         <?php
           while($mostrar_productosp1 = mysqli_fetch_array($result3)){
         ?>    
         <tbody>
              <tr>
                   <td><?php echo $mostrar_productosp1['0'] ?></td>
                   <td><?php echo $mostrar_productosp1['1'] ?></td>
                 <td><a href="#eliminar__categorias_<?php echo $mostrar_productosp1['0'] ?>" uk-toggle class="button primary"><i class="fas fa-trash "></i> Eliminar</a></td>  
                 <td><a href="#editar__productos-categorias_<?php echo $mostrar_productosp1['0'] ?>"  uk-toggle class="button primary"> <i class="fas fa-pen"></i> Editar</a></td>

              </tr>
            </tbody>
            
  <?php
 }
?>  
            </table>
            
       <?php $productos = 'SELECT * FROM `categorias` ORDER BY `id` ASC' ;     
          $result3 = mysqli_query($conn,$productos);
        
        ?>
        
        
         <?php
           while($ver = mysqli_fetch_array($result3)){
      
         ?>  
    

<div id="editar__productos-categorias_<?php echo $ver['0']?>" uk-modal>
    <div class="uk-modal-dialog">

        <button class="uk-modal-close-default" type="button" uk-close></button>

        <div class="modal__header">Editar categoria</div>
   
        <div class="uk-modal-body" id="productos" uk-overflow-auto>
          <form method="post" action="productos/editar_categorias.php/">
        <label class="datos">Ingrese número de la categoría</label>           
         <input  name="id" type="number" min="1" placeholder="Ingrese numero de categoría" value="<?php echo $ver[0] ?>" >
          <label class="datos">Ingrese nombre de la categoría</label> 
               <input  name="nombre" type="text" placeholder="Ingrese nombre de la categoría" value="<?php echo $ver[1] ?>" required >
        </div>

        <div class="uk-modal-footer uk-text-right">
            
          <button type="submit" class="button primary compradores"  value="editar_categorias"> <i class="fas fa-pen"></i> Editar categoria</button>
          </form>
        </div>
    </div>
</div>

<div id="eliminar__categorias_<?php echo $ver['0'] ?>" uk-modal>
    <div class="uk-modal-dialog">
     <div class="uk-modal-body">      
    <h3 class="uk-text-center">¿Desea eliminar a esta categoría?</h3>
      <button class="uk-modal-close-default" type="button" uk-close></button>
      <div class="eliminar">
            <a class="button primary eliminar__si" onclick="eliminar((id =<?php echo $ver['0'] ?>)) ">Si <i class="fas fa-check"></i></a>
            <a class="button primary  uk-modal-close">No <i class="fas fa-times"></i></a>
     </div>     
      </div>    
    </div>
</div>

<?php
}
?>

 <div id="agregar__producto-categorias" uk-modal>
    <div class="uk-modal-dialog">

        <button class="uk-modal-close-default" type="button" uk-close></button>

        <div class="modal__header">Agregar Categoria</div>
   
        <div class="uk-modal-body" uk-overflow-auto>
          <form method="post" action="productos/agregar_categorias.php">
            <label class="datos">Ingrese número de la categoría</label> 
             <input name="id" type="number" placeholder="Ingrese número de la categoría" min="1" value="" required >
            <label class="datos">Ingrese nombre de la categoría</label> 
            <input name="nombre" type="text" placeholder="Ingrese el nombre de la categoría" value="" required >
          

        </div>

        <div class="uk-modal-footer uk-text-right">
            <button type="submit" class="button primary compradores" value="agregar_categoria"> <i class="fas fa-plus"></i> Cargar categoria</button>
            </form>
        </div>
    </div>
</div>

<script>
    function eliminar(id){
       $.post( "productos/eliminar_categorias.php", { id : id } );

    }
</script>