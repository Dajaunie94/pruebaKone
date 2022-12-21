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
     	 		 	 	 <input type="text" name="name" class="form-control" placeholder="Digite el Nombre " autofocus="" required>
     	 		 	 </div>
     	 		 	 <div class="form-group">
     	 		 	 	 <input type="text" name="referencia" class="form-control" placeholder="Digite la Referencia " autofocus="" required>
     	 		 	 </div>
                     <div class="form-group">
                         <input type="number" name="precio" class="form-control" placeholder="Digite la Precio " autofocus="" required>
                     </div>
                     <div class="form-group">
                         <input type="number" name="peso" class="form-control" placeholder="Digite la Peso " autofocus="" required>
                     </div>
                     <div class="form-group">
                         <select name="categoria" id="categoria" class="form-control" required>
                                <option value="">--- Selecione una Categoria ---</option>
                                <option value="Dulces">Dulces</option>
                                <option value="Aseo">Aseo</option>    
                                <option value="Comida">Comida</option> 
                                <option value="Vegetales">Vegetales</option>                           
                                <option value="Lacteos">Lacteos</option> 
                                <option value="Drogas">Drogas</option>
                                <option value="Tecnologia">Tecnologia</optio>
                        </select>
                     </div>
                     <div class="form-group">
                         <input type="number" name="stock" class="form-control" placeholder="Digite la Stock " autofocus="" required>
                     </div>
                     <div class="form-group">
                         <input type="date" name="fecha" class="form-control" placeholder="Digite la Fecha " autofocus="" required>
                     </div>
                     
     	 		 	 <input type="submit" class="btn btn-success btn-block" name="save_task" value="Guardar">
     	 		 </form>

     	 	</div>

     	 </div>

     	 <div class="col-md-8">
     	 	<table class="table table-bordered">
                    <thead>
                         <tr>
                            <th>#</th>  
                            <th>Nombre</th>
                            <th>Referencia</th>
                            <th>Precio</th>
                            <th>Peso</th>
                            <th>Categoria</th>
                            <th>Stock</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                         </tr>
                    </thead>
                    <tbody>
                         <?php 
                          $query= "SELECT * FROM producto";
                           $result_task =mysqli_query($conn,$query);

                           while ($row=mysqli_fetch_array($result_task)) { ?>
                                
                                  <tr>
                                      <td><?php echo $row['id']  ?></td> 
                                      <td><?php echo $row['nombre']  ?></td> 
                                      <td><?php echo $row['referencia']  ?></td>
                                      <td><?php echo $row['precio']  ?></td>
                                      <td><?php echo $row['peso']  ?></td>
                                      <td><?php echo $row['categoria']  ?></td>
                                      <td><?php echo $row['stock']  ?></td>
                                      <td><?php echo $row['fecha']  ?></td> 
                                      <td>
                                           <a href="edit.php?id=<?php echo $row['id']  ?>"class="btn btn-secondary" ><i class="fas fa-marker"></i></a>
                                           <a href="delete.php?id=<?php echo $row['id']  ?>"class="btn btn-danger" ><i class="far fa-trash-alt"></i></a>
                                      </td> 
                                  </tr>
                               

                           <?php } ?>
                              
                    </tbody>
               </table>
     	 </div>
     </div>

 </div>


<?php include("includes/footer.php")?>