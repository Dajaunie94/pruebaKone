<?php 
  include("db.php");

     if (isset($_GET['id'])) {
     	 $id=$_GET['id'];
     	 $query="SELECT * FROM producto WHERE id=$id";
     	 $result=mysqli_query($conn,$query);
     	 if (mysqli_num_rows($result)==1) {
     	 	$row=mysqli_fetch_array($result);
     	 	$name=$row['nombre'];
     	 	$referencia=$row['referencia'];
         $precio=$row['precio'];
         $peso=$row['peso'];
         $categoria=$row['categoria'];
         $stock=$row['stock'];
         $fecha=$row['fecha'];

     	 }
     }

     if (isset($_POST['update'])) {
	 $id=$_GET['id'];
	 $name=$_POST['name'];
	 $referencia=$_POST['referencia'];
    $precio=$_POST['precio'];
    $peso=$_POST['peso'];
    $categoria=$_POST['categoria'];
    $stock=$_POST['stock'];
    $fecha=$_POST['fecha'];
    
    $query ="UPDATE producto SET nombre='$name', referencia='$referencia', precio='$precio', peso='$peso',categoria='$categoria', stock='$stock',fecha='$fecha' WHERE id=$id";

     mysqli_query($conn,$query);
     
     $_SESSION['message']='Dato Actualizado';
     $_SESSION['message_type']='warning'; 
     
     header("location:index.php");
}
 ?>
 <?php include("includes/header.php") ?> 
    <div class="container p-4">
 	
     <div class="row">
     	 <div class="col-md-4 mx-auto">
              
     	 	<div class="card card-body">
     	 		 <form action="edit.php?id=<?php echo $_GET['id'];  ?>" method="POST">
     	 		 	 <div class="form-group">
     	 		 	 	 <input type="text" name="name" class="form-control" value="<?php echo $name; ?>" placeholder="Actualize Nombre">
     	 		 	 </div>
     	 		 	 <div class="form-group">
     	 		 	 	 <input type="text" name="referencia" class="form-control" value="<?php echo $referencia; ?>" placeholder="Actualize Referencia">
     	 		 	 </div>
                <div class="form-group">
                   <input type="number" name="precio" class="form-control" value="<?php echo $precio; ?>" placeholder="Actualize Precio">
                </div>
                <div class="form-group">
                   <input type="number" name="peso" class="form-control" value="<?php echo $peso; ?>" placeholder="Actualize Peso">
                </div>
                <div class="form-group">
                  
                    <select name="categoria" id="categoria" class="form-control">
                                <option value=""><?php echo $categoria; ?></option>
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
                   <input type="number" name="stock" class="form-control" value="<?php echo $stock; ?>" placeholder="Actualize Stock">
                </div>
                <div class="form-group">
                   <input type="date" name="fecha" class="form-control" value="<?php echo $fecha; ?>" placeholder="Actualize Fecha">
                </div>
     	 		 	<button class="btn btn-success" name="update">Acutualizar</button>
     	 		 </form>

     	 	</div>

     	  </div>
        </div>
    </div>
 
  <?php include("includes/footer.php") ?> 