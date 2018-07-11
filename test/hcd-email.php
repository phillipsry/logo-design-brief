<?php
$html = <<<EOF
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>HCD Email Template</title>
<meta name="x-apple-disable-message-reformatting">
</head>

<body>
  <style>
    h1 {
  color: #D1A151;
  font-family: "Helvetica", arial, sans-serif;
}

p {
  font-family: "Helvetica", arial, sans-serif;
  line-height: 1.4;

}

.italic {
  font-family: "Helvetica", arial, sans-serif;
  color: #000000;
  font-weight: 900;
  font-style: italic;
}
ul, ol {
    margin-left: -25px;
}
.requests {
  font-family: "Helvetica", arial, sans-serif;
  color: #000000;
  font-weight: normal;
}
	body {
	background: #dbdbdb!important;
	}
	.body {
		background: #dbdbdb!important;
	background-color: #dbdbdb!important;
	padding-top: 0px!important;
	}
	.contain {
		max-width: 566px;
    margin: 0px auto 25px auto;
    background: #FFF;
    padding: 30px 30px 80px 30px;
	}
	.head-section {
	text-align: center;
	}

	.head-section img {
		padding-bottom: 0px!important;
	}
.float-center {
	display: block;
	margin: 0 auto;
	}
ol {
  list-style: number;
  font-family: "Helvetica", arial, sans-serif;
  color: #000000;
  font-weight: bold;
}
.link {
	color: #000;
	}
ul li {
  list-style-type: disc;
  color: #000000;
  font-weight: normal
}

.examples {
  margin: 20px 0 20px 0;
}

.body {
  padding: 0px 25px 40px 25px;
}
  </style>
  <div class="body">
	<img src="http://www.hotcoffeydesign.com/wp-content/uploads/2016/02/HCD-logo2015-outlines.png" alt="" align="center" class="float-center">
	<div class="contain">
	<div class="head-section"><img style="width: 100%; height: auto; padding-bottom: 50px; margin: auto;" src="http://www.hotcoffeydesign.com/wp-content/uploads/2018/06/hcd-front.jpg"></div>
 <h1>Logo & Corporate Identity Design Brief</h1>
 <p class="italic">Helping you stand out from the rest!</p>
<br>
<p>To produce the perfect logo design, I need to know exactly what you're looking for. The more information you provide the quicker and simpler the process will be. Here is the information I need from you to start your project:</p>
<br>
<hr>
<br>

<ol>
  <li class="requests">What is your business name?</li>
  <br>
  <li class="requests">In a senctence or two, describe what your business does.</li>
  <br>
  <li class="requests">Who is your target audience?</li>
  <br>
  <li class="requests">Who do you supply your product or service(s) to?</li>
  <br>
  <li class="requests">What do you want your logo to achieve?</li>
  <br>
  <li class="requests">What message would you like it to convey?</li>
  <br>
  <li class="requests">How would you like your logo to "look" or "feel"?</li>
  <br>
  <li class="requests">Please supply the exact text that you want included in your logo e.g. the company name and strapline/caption if required.</li>
  <br>
  <li class="requests">Select the type of logo you prefer:</li>
  <img src="http://www.hotcoffeydesign.com/wp-content/uploads/2018/07/brand-types-w391.jpg" alt="types of logos" class="examples">
  <br>
  <li class="requests">Do you have any example logos you like? Providing me with examples helps me identify the style and aesthetic you like.</li>
  <br>
  <li class="requests">Do you have any specific colors in mind?</li>
  <br>
  <li class="requests">Are there any colors you dislike?</li>
  <br>
  <li class="requests">Do you have any images, sketches, or documents that might be helpful?</li>
  <br>
  <li class="requests">Anything else you'd like to communicate to me about your logo?</li>
  <br>
  <li class="requests">If you have ordered stationary please provide your - Full name, job title, office telephone, mobile, email, website url, office address, social pages, company registration number.</li>
  <br>
</ol>
</div><a style="display: block; margin: 25px auto;color: #000!important;text-decoration: none;text-align: center;" href="http://hotcoffeydesign.com" title="Hot Coffey Design">Hot Coffey Design</a></div>
</body>
</html>
EOF;

// Auth Check
session_start();

if (isset($_POST['password']) && $_POST['password'] === 'hcd2018Brew!') {
	$_SESSION['pin'] = 'hcd2018Brew!';
}

if ( ! isset($_SESSION['pin']) || $_SESSION['pin'] != 'hcd2018Brew!') {
?>
<html>
	<head>
		<title>HCD Emailer</title>
	</head>
	<body>
		<form method="post">Password: <input type="password" name="password" /> <button>Login</button></form>
	</body>
</html>
<?php
} else {

	if (isset($_POST['send_to'])) {
		$to = $_POST['send_to'];
		$subject = $_POST['subject'];
		$from = $_POST['send_from'] . ' <' . $_POST['send_from_email'] . '>';
echo $to . ' sub: ' . $subject . ' -from- ' . $from;
		// To send HTML mail, the Content-type header must be set
		$headers  = 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

		// Create email headers
		$headers .= 'From: '. $from;

		// Compose a simple HTML email message

		// Sending email
		if(mail($to, $subject, $html, $headers)){
			echo 'Your mail has been sent successfully.';
		} else{
			echo 'Unable to send email. Please try again.';
		}



//		$mail = new PHPMailer(true);                              // Passing `true` enables exceptions
//		try {
//			$mail->isMail();
//			//Recipients
//			$mail->setFrom($_POST['send_from_email'], $_POST['send_form']);
//			$mail->addBCC('coffey@hotcoffeydesign.com');
//			$mail->isHTML(true);                                  // Set email format to HTML
//			$mail->Subject = $_POST['subject'];
//			$mail->Body    = $html;
//			$mail->AltBody = "Welcome to Hot Coffey Design!\n\nWe’re glad to have you on board!\n\nHot Coffey Design was founded out of the need for businesses to have a one-stop creative agency where they could get access to all of the marketing resources and tools they need to be successful and stay ahead. We appreciate you choosing us and look forward to helping you by providing you the best in the services we have to offer!\n\nNow, before we get started on your project we will need a few things from you first. This will help us to better understand your business and give us what we need to move forward.";
//			$mail->send();
//			echo 'Message has been sent';
//		} catch (Exception $e) {
//			echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
//		}
	} else {
?>
<html>
	<head>
		<title>HCD Emailer</title>
	</head>
	<body>
		<form method="post">Subject: <input type="text" name="subject" /><br/>Send To: <input type="text" name="send_to" /><br/>Send From Name: <input type="text" value="Hot Coffey Design" name="send_from" /><br/>Send From Email: <input type="text" value="no-reply@hotcoffeydesign.com" name="send_from_email" /><br/><button>Send</button></form>
	</body>
</html>
<?php
	}

}
