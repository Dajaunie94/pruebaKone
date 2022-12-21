<?php include("db.php")?>
<?php include("includes/header.php")?>

<div class="container p-4">
    
     <div class="row">
         <div class="col-md-4">
               <?php if (isset($_SESSION['message'])) { ?>
                       <div class="alert alert-<?= $_SESSION['message_type']?> alert-dismissible fade show" role="alert">
                             <?= $_SESSION['message']?>
                             <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                               <span aria-hidden="true">&times;</span>
                            </button>
                      </div>

               <?php session_unset(); } ?> 
              
               <div class="card card-body">
                 <form action="save.php" method="POST">
                     <div class="form-group">
                         <label for="producto">Agregar mas de Producto  :</label>
                         
                         <?php 
                          $query= "SELECT * FROM producto";
                           $result_task =mysqli_query($conn,$query);?>

                           <select name="producto" id="producto" class="form-control">
                                <option value="">--- Selecione un Producto ---</option>  
                           <?php
                           while ($row=mysqli_fetch_array($result_task)) { ?>                                
                                <option value="<?php echo $row['id'] ?>"><?php echo $row['nombre']  ?></option>

                 
                           <?php } ?>
                           </select>
                         
                     </div>
                     <div class="form-group">
                         <label for="cantidad">Cuanto Llevar :</label>                         
                         <input type="number" name="stock" class="form-control" placeholder="Digite cuanto va llevar " autofocus="">
                     </div>
                     <input type="submit" class="btn btn-success btn-block" name="save_tas1" value="Insertar">
                 </form>

            </div>

         </div>

          <div class="col-md-8">
            <table class="table table-bordered">
                    <thead>
                         <tr>
                            <th>Id</th>  
                            <th>Nombre</th>
                            <th>Cantidad</th>                        
                            
                         </tr>
                    </thead>
                    <tbody>
                         <?php 
                          $query= "SELECT a.id_datos as id,d.nombre as nombre,a.cantidad as cantidad FROM compra a INNER JOIN producto d ON d.id=a.id_datos WHERE a.id_datos= d.id";
                           $result_task =mysqli_query($conn,$query);

                           while ($row=mysqli_fetch_array($result_task)) { ?>
                                
                                  <tr>
                                      <td><?php echo $row['id']  ?></td>
                                      <td><?php echo $row['nombre']  ?></td>  
                                      <td><?php echo $row['cantidad']  ?></td> 
                                       <?php } ?>
                        
                                  </tr>
                               

                          
                              
                    </tbody>
               </table>
         </div>

         <div class="col-md-8">
         	<label> Porducto con mas STOCK</label>
            <table class="table table-bordered">
                    <thead>
                         <tr>
                            <th>Id</th>  
                            <th>Nombre</th>
                            <th>Categoria</th>
                            <th>Cantidad</th>                           
                            <th>Precio</th>
                            
                         </tr>
                    </thead>
                    <tbody>
                         <?php 
                          $query= "SELECT * FROM producto WHERE stock=(select max(stock) from producto)";
                           $result_task =mysqli_query($conn,$query);

                           while ($row=mysqli_fetch_array($result_task)) { ?>
                                
                                  <tr>
                                      <td><?php echo $row['id']  ?></td>
                                      <td><?php echo $row['nombre']  ?></td>
                                       <td><?php echo $row['categoria']  ?></td>   
                                      <td><?php echo $row['stock']  ?></td> 
                                      <td><?php echo $row['precio']  ?></td>  
                                       <?php } ?>
                        
                                  </tr>
                               

                          
                              
                    </tbody>
               </table>
         </div>
         <div class="col-md-8">
         	<label> Porducto con mas Precio</label>
            <table class="table table-bordered">
                    <thead>
                         <tr>
                            <th>Id</th>  
                            <th>Nombre</th>
                            <th>Categoria</th>
                            <th>Cantidad</th>                           
                            <th>Precio</th>
                            
                         </tr>
                    </thead>
                    <tbody>
                         <?php 
                          $query= "SELECT * FROM producto WHERE precio=(select max(precio) from producto)";
                           $result_task =mysqli_query($conn,$query);

                           while ($row=mysqli_fetch_array($result_task)) { ?>
                                
                                  <tr>
                                      <td><?php echo $row['id']  ?></td>
                                      <td><?php echo $row['nombre']  ?></td>
                                       <td><?php echo $row['categoria']  ?></td>   
                                      <td><?php echo $row['stock']  ?></td> 
                                      <td><?php echo $row['precio']  ?></td>  
                                       <?php } ?>
                        
                                  </tr>
                               

                          
                              
                    </tbody>
               </table>
         </div>
     </div>

 </div>


<?php include("includes/footer.php")?>