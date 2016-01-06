<?php

if(!isset($_SESSION)) { 
        session_start(); 
    } 


include_once 'dbactions.php';
database_connect();
			
			$sql = "SELECT GEBRUIKERSNAAM, WACHTWOORD FROM GEBRUIKER";
			$result = sqlsrv_query($conn, $sql);
			$message = "";
			
			$loggedon = $_SESSION['logged'];
			$_SESSION['logged'] = $loggedon;
			$Username = $_SESSION['username'];
			$_SESSION['username'] = $Username;
							
			if(isset($_POST['doLogin'])) {
				
				if(empty($_POST['username']) == false && empty($_POST['password']) == false) {
					$user = $_POST['username'].$_POST['password'];
		
					while($row = sqlsrv_fetch_array($result, SQLSRV_FETCH_ASSOC)) {
						
						if ($user == implode($row)) {
							$_SESSION['logged'] = true;
							$_SESSION['username'] = $_POST['username'];
							
							$query = "SELECT VOORNAAM FROM GEBRUIKER WHERE GEBRUIKERSNAAM = '".$_SESSION['username']."'";
							$resultquery = sqlsrv_query($conn, $query, null);
							while($name = sqlsrv_fetch_array($resultquery, SQLSRV_FETCH_ASSOC)) {
								
                                $message = "Welcome ".implode($name);
							}
						}
						else if ($_SESSION['logged']  == false) {
							$message = "The entered combination of username and password is not correct";
                        }
					}
				}
				
				else {
					$message = "Username or Password is empty";
				}
			}
			
			
			if(isset($_POST['logoff'])) {
				$message = "You Have Successfully Logged Out";
				$_SESSION['logged'] = false;
			}
			
		?>
<?php
echo '<div class="content">';
  if (!$result) {
    echo "sorry, u bent niet geregistreerd";
  }
  else {
      $username="";
      $_SESSION['username'] = $username;
    echo "Welkom $username";
  }
  ?>

</div>

}

<?php
database_disconnect();
?>

</body>
  

