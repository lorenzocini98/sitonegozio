<?php
	session_start();

	include 'conn.inc.php';

	if($_SESSION['esiste']==0)
	{
		
		$_SESSION['esiste']=0;
		echo "<html>
				<body>
					<form method='post'>
						Username: <input type='text' name='user' value=''></br>
						Password: <input type='password' name='password' value=''></br>
						<input type='submit' name='login' value='Login'>
					</form>
				</body>
			</html>";	
		if(isset($_POST['password']))
		{
			$dbh = new PDO('mysql:host='.$host.';dbname='.$db,$user,$password);
			$stm = $dbh->prepare('SELECT * FROM utente u WHERE u.Password=":password" and u.Username=":username"');
			$stm->bindValue(':username',$_POST['username']);
			$stm->bindValue(':password',$_POST['password']);
			$stm->execute();
			if($stm -> rowCount()==1)
			{
				$_SESSION['esiste']=1;
				header("location: accesso.php");
		    }
			else
			{
		  	echo 'Username o password non valido.';
	    	}
				
	    }
		
	}else
	{
		echo 'Sei gia loggato.';
	}
?>