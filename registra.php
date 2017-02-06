<?php
include 'conn.inc.php';
?>
<html>
<title>Registrazione </title>
<body>
<h2>Prova Inserimento</h2>
<?php
session_start();
				try
				{
	            $dbh=new PDO('mysql:host='.$host.';dbname='.$db,$user,$password);	
			    if($_GET["nome"] != "" && $_GET["cognome"]!= "" && $_GET["username"] != ""&& $_GET["password"] != ""){
                $stm = $dbh ->prepare('INSERT INTO utente(Nome,Cognome,Username,Password) VALUES (:nome,:cognome,:user,:pass)' );
				$stm -> bindValue(':nome',$_GET['nome']);
				$stm -> bindValue(':cognome',$_GET['cognome']);
				$stm -> bindValue(':user',$_GET['username']);
				$stm -> bindValue(':pass',$_GET['password']);
				if($stm->execute())
				{
					echo 'Inserimento riuscito!';
				    $dbh->lastInsertId();
				 
				}else
				{
					echo 'errore query';
				}		
				}else
				{
				    echo 'Benvenuto! Registrati';	
				}
                }catch(PDOExeption $e)
				{
	            echo 'errore connessione';
			    }
			
?>

<form action="" method="GET">	

		 Inserisci qui il tuo Nome: <input type="text" name="nome" value=""/>
		 <br>
		 Inserisci qui il tuo Cognome: <input type="text" name="cognome" value=""/>
		 </br>
		 Inserisci qui il tuo futuro username: <input type="text" name="username" value=""/>
		 <br>
		 Inserisci qui la tua futura password: <input type="text" name="password" value=""/>
		 </br>
		 Invio:<input type="submit" name="invio" value="Invio"/>
		
		 
</form>
<br> Una volta che ti sei registrato clicca qui!!!!</br>
<form action="login.php" >	
 Login:<input type="submit" name="LOGIN" value="Invio"/>		
</form>

</body>
</html>