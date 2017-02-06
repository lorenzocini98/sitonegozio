<html>
<title> Indovina il numero </title>
<body>

<?php
session_start();
			if(isset($_POST['numero'])){
				$tuoNumero=$_POST['numero'];
				$numero=$_SESSION['corretto'];         
				if($_SESSION["count"]<6){
					if($tuoNumero!=$numero){
						echo "Il tuo numero e' ".$tuoNumero;
						if($tuoNumero<$numero)
							echo "</br>"."Il numero da indovinare e' maggiore!";
						else
							echo "</br>"."Il numero da indovinare e' minore!";
						$_SESSION["count"]=$_SESSION["count"]+1;
					}
					else{
						if($_SESSION["count"]==1)
							echo 'BRAVISSIMO!!';
						else
							echo 'Bravo! Hai indovinato il numero al tentativo '.$_SESSION["count"];
						
					}
				}
				else{
					echo 'Mi dispiace. Hai finito i tentativi.';
				    session_destroy();
				    echo 'vuoi ricominciare?;
				}
			}
			else{
				echo "Benvenuto! ";
				$_SESSION['count']=1;
				$_SESSION['corretto']=rand(1,10);
			}
?>


<form action="" method="post">
			<?php echo $_session["corretto"]; ?></br>
			Tentativo: <?php echo $_session["count"]; ?></br>
			Inserisci il numero: <input type="text" name="numero" value=""></br>
			<input type="submit" name="Invio" value="Invio">
			
			
		</form>
</body>

</html>