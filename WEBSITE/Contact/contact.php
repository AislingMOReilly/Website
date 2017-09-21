<?php
/* Set e-mail recipient */
$myemail  = "aislingor90@hotmail.com";

/* define variables and set to empty values */
$name = $email = $subject = $message = "";

/* Check all form inputs using check_input function */
$name = check_input($_POST['name'], "Enter your name");
$email = check_input($_POST['email'],"Enter your email");
$subject  = check_input($_POST['subject'], "Enter an email subject");
$message = check_input($_POST['message'], "Enter message");

$from = $email;

/* If e-mail is not valid show error message */
if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/", $email))
{
    show_error("E-mail address not valid");
}

/* Prepare the message for the e-mail*/ 
$EmailMessage = "
Your Enquiry form has been submitted by:

Name: $name
E-mail: $email
Subject: $subject


Message:
$message

End of message
";

/* Send the message using mail() function */
mail($myemail, $subject, $EmailMessage, "From:".$from);

/* Redirect visitor to the thank you page */
header('Location: thanks.html');
exit();

/* Functions we used */
function check_input($data, $problem='')
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if ($problem && strlen($data) == 0)
    {
        show_error($problem);
    }
    return $data;
}

function show_error($myError)
{
?>
    <html>
		<head>
			<title>Anne Mulcahy Career Coach</title>
			<link rel="stylesheet" type="text/css" href="../Stylesheet/styleAM.css"/>
			
			<meta charset="UTF-8">
			<meta name="description" content="enquiry form error">
			<meta name="keywords" content="enquiry form, error">
			<meta name="author" content="Aisling O'Reilly">
			<meta name="robots" content="index, follow">
			<meta http-equiv="pragma" content="no-cache">
			<meta name="expires" content="sun, 31 dec 2017">
			

			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">		
			
		</head>
		
		
		<body>
			<h1>
				<a href="../index.html"><img src="../Images/Logos/logoNew.PNG" alt="heading banner" width="70%" id="banner"/></a>
			</h1>
			
			<div id = "navbar">	
				<ul>
				  <a href="../index.html"><li><b>Home</b></li></a>
				  <a href="../Services/servicesAM.html"><li><b>Services</b></li></a>
				  <a href="../Benefits/benefitsAM.html"><li><b>Benefits</b></li></a>
				  <a href="../About/aboutAM.html"><li><b>About Me</b></li></a>
				  <a href="../Contact/contactAM.html"><li><b>Contact</b></li></a>
				</ul>
			</div>
			
			
			<div id = "content">
				<h3>Please correct the following error:</h3><br />
				<?php echo $myError; ?>
				
				<br /><br /><br /><a href="../Contact/contactAM.html"><b><p id="btn">Return to Form</p></b></a>
			</div>
				
				
			<div id ="footer">
				<p id="footmenu" align="center"><b><a href="../index.html">Home</a> | <a href="../Benefits/benefitsAM.html">Benefits</a> | <a href="../Services/servicesAM.html">Services</a> | <a href="../About/aboutAM.html">About Me</a> | <a href="../Contact/contactAM.html">Contact</a></b>
				<p align="center">&nbsp;</p>
				<p align="center">Phone: 353 (0)87 2830 530 | Email: <a href="mailto:annemulcahycoach@gmail.com">annemulcahycoach@gmail.com</a></p><br />
				<p> 
					&copy; 2017.  	All Rights Reserved.<br /><br />
				</p>
			</div>
			
		</body>
	</html>
<?php
exit();
}
?>