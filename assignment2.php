<html>
<head>
<link href = "assignment2.css" rel="stylesheet">
<title> Assignment 2 </title>
</head>

<body>

<?php

#checking input for required fields and validity of characters used
$first_nameErr = $last_nameErr = $email_addressErr = $telephoneErr = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	if(empty($_POST["first_name"]))
		{$first_nameErr = "  **First Name is Required** ";}
	 else
		{
		$first_name = $_POST['first_name'];
	 	if(!preg_match("/^[a-zA-Z ]*$/",$first_name))
			{$first_nameErr = "  **First Name can contain only letters and white spaces**  ";}
		}


	if(empty($_POST["last_name"]))
		{$last_nameErr = "  **Last Name is Required**  ";}
	 else
		{
		$last_name = $_POST["last_name"];
	 	if(!preg_match("/^[a-zA-Z]*$/",$last_name))
			{$last_nameErr = "  *Last Name can contain only letters and white spaces**  ";}
		}


	if(empty($_POST["email_address"]))
		{$email_addressErr = "  **E-mail is required**  ";}
	 else
		{
		$Email = $_POST["email_address"];
	 	if(!filter_var($Email,FILTER_VALIDATE_EMAIL))
			{$email_addressErr = "  **E-mail Address is not valid**  ";}
		}


	if(!empty($_POST['telephone']))
	 {
		$telephone = $_POST['telephone'];
		if(!preg_match('/^\d+$/',$telephone))
		{$telephoneErr = "  **Telphone number can contain numbers only**  ";}
	 }

	
	$comment = $_POST['comment'];

	#For checking if all correctly defined and sending mail
	if($first_nameErr=="" and $last_nameErr=="" and $email_addressErr=="" and $telephoneErr=="")
	{
		#Sending Mail
		#The message
		$msg = "Form Details below. \r\nFirst Name: $first_name \r\nLast Name: $last_name \r\nEmail: $Email \r\n\r\n\r\nTelephone: $telephone \r\nComments: $comment\r\n";
		$msg = wordwrap($msg , 70 ,"\r\n");
		$To = "abhinavchoudhury.04@gmail.com";

		mail($To,"Group_Assignment 2",$msg);
	}

}
?>





<!Making form>

<form action="ass2.php" method="POST">
	<table>
		<!First Name>
		<tr>
			<td class="data">
				First Name <span class="required">*</span>   
			</td>
			<td>
				<input type="text" placeholder="First Name" name="first_name"><span class="error"><?php echo $first_nameErr ?></span>
			</td>
		</tr>
		<!Last Name>
		<tr>
			<td class="data">
				Last Name <span class="required">*</span>
			</td>
			<td>
				<input type="text" placeholder="Last Name" name="last_name"><span class="error"><?php echo $last_nameErr; ?></span>
			</td>
		</tr>
		<!Email-address>
		<tr>
			<td class="data">
				Email Address <span class="required">*</span>
			</td>
			<td>
				<input type="text" placeholder="Mail id" name="email_address"><span class="error"><?php echo $email_addressErr;?></span>
			</td>
		</tr>
		<!Telephone Number>
		<tr>
			<td class="data">
				Telephone Number
			</td>
			<td>
				<input type="text" placeholder="Number" name="telephone"><span class="error"><?php echo $telephoneErr; ?></span>
			</td>
		</tr>
		<!comment>
		<tr>
			<td class="data">
				Comments <span class="required">*</span>
			</td>
			<td>
				<textarea name="comment" rows="6"  id = "comm"> 
				<?php echo "Hi,\r\n\r\nMy group number is.This is a solution to the 2nd assignment question." ?>   						          
				</textarea>	
			</td>
		</tr>
	</table><br>
	<input type="submit" name="submit" value="Submit">  
</form>


</body>
</html>
