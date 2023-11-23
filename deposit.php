<!DOCTYPE html>

<html>

   <head>

      <meta charset = "utf-8">

      <title> Deposit </title>

      <!-- background image -->
      <style>

         body 
         {

            background-image: url(images/back2.jfif);
            background-repeat: no-repeat;
            background-attachement: fixed;
            background-size: cover;
         }

      </style>


   </head>


   <body>

      <?php

           
        // Connect to MySQL
        if ( !( $connection = mysqli_connect( "localhost", "u112", "u112", "db112" ) ) )  
        {           
           die( "Could not connect to database </body></html>" );
	}

	//name the variables according to information from form
       	$name       =    $_POST["name"];

	$number     =    $_POST["account"];

	$pin        =    $_POST["pin"];

	$deposit    =    $_POST["money"];
	
	//prepare the query as a string
	$sql = "SELECT Amount FROM accounts WHERE Number = '$number' AND Pin= '$pin'";

	//send query
	if($result = mysqli_query($connection, $sql))
	{

		// if there is a match for the information provided
		if (mysqli_num_rows($result) > 0) 
		{

			//get the account that matches
			$row = mysqli_fetch_row($result); 
			
			//add the amount they want to deposit
			$balance= $row[0]+$deposit;
		
			//prepare update query
			$sql = "UPDATE accounts SET Amount='" .$balance."' WHERE Number= '$number' AND Pin= '$pin'";

			//if the query is successfull tell the user, along with the new balance
			if (mysqli_query($connection, $sql)) 
			{
				echo "<h2>Amount deposited Successfully.</h2>";
		 		echo "<h2> Your New Balance is $".$balance.".</h2><br>";
			}
		 
			//otherwise inform them there has been an error
			else
			{
				echo "<h2> Error While making deposit: ". mysqli_error($connection)."</h2><br>";
			}
		}
		// there was no account matching the information provided
		else 
		{
			echo "<h2> Error: No account found for that account number and pin.</h2><br>";
		}


	}

	//there was an error sending the first query
	else
	{
		echo "<h2> Error While making deposit: ". mysqli_error($connection)."</h2><br>";
	}

	//close connection
	mysqli_close($connection);

//end php code
?> 
	<!--Home button-->
      
      <a href = "index.html">

            <img src = "images/home.png" width = "100"
 
               height = "100" alt = "Home Page">

      </a>

     </body>

</html>
