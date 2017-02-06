<?php
include 'conn.inc.php';
?>
<html>

<body>
<title> Benvenuto nella mia pagina! </title>
<?php

				try
				{
	            $dbh=new PDO('mysql:host='.$host.';dbname='.$db,$user,$password);
                }catch(PDOExeption $e)
				{
	            echo 'errore connessione';
			    }
			
		
?>
<form action="registra.php" >   
	Registrati: <input type="submit" name="registra" value="Registrati"/>	
</form>
<form action="login.php" method="POST">   
	LogIn: <input type="submit" name="login" value="login"/>
</form>
<form action="logout.php" method="GET">   
	LogOut: <input type="submit" name="logout" value="logout"/>
</form>
</body>
</html>