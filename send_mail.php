$to = "charlene.caruk@gmail.com"; 
						    $from = $_POST['email']; 
						    $name = $_POST['name'];
						    $subject = "Contact depuis le formulaire";
						    $subject2 = "Copie de votre message envoyé à APE";
						    $message = $name .  " a écrit:" . "\n\n" . $_POST['message'];
						    $message2 = "Votre message : " . $name . "\n\n" . $_POST['message'];

						    $headers = "De:" . $from;
						    $headers2 = "De:" . $to;
						    mail($to,$subject,$message,$headers);
						    mail($from,$subject2,$message2,$headers2); 
						    $this->page_controller->send_message();