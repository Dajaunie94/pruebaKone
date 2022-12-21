<?php

include("db.php");

if (isset($_POST['save_task'])) {
	$name=$_POST['name'];
	$referencia=$_POST['referencia'];
    $precio=$_POST['precio'];
    $peso=$_POST['peso'];
    $categoria=$_POST['categoria'];
    $stock=$_POST['stock'];
    $fecha=$_POST['fecha'];
    
    $query ="INSERT INTO producto(nombre,referencia,precio,peso,categoria,stock,fecha) VALUES ('$name','$referencia','$precio','$peso','$categoria','$stock','$fecha')";

     $result=mysqli_query($conn,$query);
     if (!$result) {
     	die("Query Failed");
     }
     $_SESSION['message']='Dato Guardado';
     $_SESSION['message_type']='success'; 
     
     header("location:index.php");
}

if (isset($_POST['save_tas1'])) {
    $nom=$_POST['producto'];
    $cant=$_POST['stock'];

    $query="SELECT * FROM producto WHERE id=$nom";
    $result1=mysqli_query($conn,$query);
    if (mysqli_num_rows($result1)==1) {
        $row=mysqli_fetch_array($result1);
        $stock=$row['stock'];
         
    }
    
    //
                       
             if ($stock>0) {
             $query ="INSERT INTO compra(id,id_datos,cantidad) VALUES (NULL,'$nom','$cant')";

             $result=mysqli_query($conn,$query);
               if (!$result) {
                  die("Query Failed");
               }
            $_SESSION['message']='Dato Guardado';
            $_SESSION['message_type']='success';
         }else{
            $_SESSION['message']='no se puede vender por que no tiene stock';
            $_SESSION['message_type']='warning';
         }
          
         $total= $stock-$cant;
         $query ="UPDATE producto SET stock = '$total' WHERE producto.id =$nom";

             $result=mysqli_query($conn,$query);
               if (!$result) {
                  die("Query Failed");
               }

     header("location:compra.php");
}

?>

?>