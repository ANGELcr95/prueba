<?php
    session_start();
    require 'database.php'; 

    $resp = NULL;
    $correo = $_POST['email'];
    $documento = $_SESSION['user_documento'];

    $data = [
        'correo' => $correo,
        'documento' => $documento,
    ];
    $sql = "UPDATE usuarios SET emailUsuario=:correo WHERE documento=:documento";
    $stmt= $conn->prepare($sql);
    $stmt->execute($data);

    if($stmt->execute($data)){
// count total number of rows
        $query = "SELECT COUNT(*) as total_rows FROM codigossmartfit";
        $stmtb = $conn->prepare($query);

        // execute query
        $stmtb->execute();

        // get total rows
        $row = $stmtb->fetch(PDO::FETCH_ASSOC);
        $total_rows = $row['total_rows'];
        echo $total_rows;

       
        // for ($i=0;$i<$total_rows;$i++) {
            
        //     $id = $i;
        //     // 'SELECT  documento, nombre_asociado FROM usuarios WHERE documento=:number'
        //         $stmtc = $conn->prepare("SELECT id, idUsuario FROM codigossmartfit WHERE id=?");
        //         $stmtc->execute([$id]); 
        //         $userc = $stmtc->fetch(PDO::FETCH_ASSOC);
                
        //         $resp = $userc['idUsuario'];
               
      
        //     if ($resp != NULL){
        //         echo $resp;
        //         print_r($resp);
        //         break;
        //     }
           
        // }
        
            for ($i=0;$i<$total_rows;$i++) {
                
                $id = $i;
                // 'SELECT  documento, nombre_asociado FROM usuarios WHERE documento=:number'
                    $stmtc = $conn->prepare("SELECT id, idUsuario FROM codigossmartfit WHERE id=?");
                    $stmtc->execute([$id]); 
                    $userc = $stmtc->fetch(PDO::FETCH_ASSOC);
                    $resp = $userc['idUsuario'];
        
                if ($resp == NULL){
                    return  $resp;
                    $i = $total_rows ;
                }
                
            }
        
      
        //    // even random number is written to array and for-loop continues iteration until original condition is met
        // }
        // echo $resp;

    //     $data2 = [
    //         'documento' => $documento,
    //     ];
    //     $sqli = " UPDATE codigossmartfit SET idUsuario=:documento WHERE idUsuario IS NULL OR idUsuario= ''";
    //     $stmti= $conn->prepare($sqli);
    //     $stmti->execute($data2);
    // }
    
    // if (!empty($_POST['email'])) { 
        
    //     $sql3 = "INSERT INTO codigossmartfit (idUsuario) VALUES (:user_documento)"; 
    //     $stmt3 = $conn2->prepare($sql3); 
    //     $stmt3->bindParam(':user_documento', $_POST['email']); 

    //     $stmt3->execute();
        
        // if($stmt2->execute()){
        //     $message = 'Successfully created new user';
        // }

        // Prepare


        // if($stmt->execute() && $stmt2->execute()) { 
        //     $messagePost = 'Le llegara email al correo '.($_POST['email']);
            
        //     $records = $conn->prepare('SELECT  codigo FROM codigossmartfit WHERE documento=:user_documento'); 
        //     $records->bindParam(':user_documento', $_SESSION['user_documento']); 
        //     $records->execute();  
        //     $results = $records->fetch(PDO::FETCH_ASSOC); 
        //     print_r($results);
        //     print_r($results);
        //     echo $results;
          
        //     if ($records->execute()) {
        //         $codigo = $results['codigo'];

        //       // $_SESSION['user_id'] = $results['id']; // se hace con l aintension de exportar el dato del id a otras paginas
        //         $message1 = 'Este es tu codigo ' .$codigo. ", te lo enviamos a tu correo ";
        //       // header("Location: singUpCC.php"); //redirecciona
        //     } 

        // } else {
        //     $messagePost = 'No fue posible registrar tu email verifica conexion de internet';
        // }
    
    }
?> 

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8"/>
        <title>Coomeva Cupon</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1,maximum-scale=1, minimum-scale=1">
		<link rel="stylesheet" href="SingUpCC.css">
		<link rel="stylesheet" href="conditions.css">
    </head>

    <header>
	<div class="contenedor">

            <?php if(isset($$message)) : ?>
                <p class="message"><?=$message?></p>
            <?php endif; ?>

			<h1>Coomeva Cupon</h1>
				<form action="singUpCC.php" method="post" id="formulario" >
                    <div class="formulario__grupo" id="grupo__email">
                        <div class="formulario__grupo-input">
                            <input type="email" id="password1"  class="formulario__input" name="email" placeholder="Ingresa tu email" >
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">El correo deber contener siguiente estructura:  example@outlook.com .</p>
                    </div>
	
					<input type="submit" id="into1" value="Send" >
			</form> 
		</div>
		<script src="jsSingUpCC.js"></script>
		<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
	</header> 
</html>


