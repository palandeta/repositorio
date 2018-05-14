<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link   href="css/bootstrap.min.css" rel="stylesheet">
        <script src="js/bootstrap.min.js"></script>
    </head>

    <body>
        <div class="container">
            <div class="row">
                <h3>PHP CRUD Grid</h3>
            </div>
            <div class="row">
                <p>
                    <a href="create.php" class="btn btn-success">Create</a>
                </p>

                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Codigo</th>
                            <th>Nombre</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Accion</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include 'database.php';
                        $pdo = Database::connect();
                        $sql = 'SELECT * FROM producto ORDER BY nombre DESC';
                        foreach ($pdo->query($sql) as $row) {
                            echo '<tr>';
                            echo '<td>' . $row['codigo'] . '</td>';
                            echo '<td>' . $row['nombre'] . '</td>';
                            echo '<td>' . $row['precio'] . '</td>';
                            echo '<td>' . $row['cantidad'] . '</td>';
                            echo '<td width=250>';
                            echo '<a class="btn" href="read.php?codigo=' . $row['codigo'] . '">Read</a>';
                            echo '&nbsp;';
                            echo '<a class="btn btn-success" href="update.php?codigo=' . $row['codigo'] . '">Update</a>';
                            echo '&nbsp;';
                            echo '<a class="btn btn-danger" href="delete.php?codigo=' . $row['codigo'] . '">Delete</a>';
                            echo '</td>';
                            echo '</tr>';
                        }
                        Database::disconnect();
                        ?>
                    </tbody>
                </table>
            </div>
        </div> <!-- /container -->
        <?php
		    $url = "https://pruebaoptativa.scm.azurewebsites.net/api/triggeredwebjobs/TrabajoBajoDemanda/run";
    	    $ch = curl_init($url);
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);//Set to true, said the acquisition of content as a string
			curl_setopt($ch, CURLOPT_VERBOSE, true);//Set to true, the abnormal return during the execution of the
			$passwordStr = "$pruebaoptativa:3AFR9ca0lHJbukMKctAuGrRYXN2Hg5QqLr9w29PBw0N6CGgFbEtoSTCZSiT7";//Username: password
			curl_setopt($ch, CURLOPT_USERPWD, $passwordStr);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array("Accept:application/json"));//HTTP request header information
			$successCode = 200;
			$buffer = curl_exec($ch);
			$info = curl_getinfo($ch);
			curl_close($ch);
			if($info['http_code'] != $successCode){
			        $msgStr = "No se pudo invocar al Web Job - El requerimiento falló!";
			        echo $msgStr;
			}else{
			        $msgStr = "Se ha invocado al Web Job - Requerimiento satisfactorio!";
			        echo $msgStr;
            }
        ?>
    </body>
</html>
