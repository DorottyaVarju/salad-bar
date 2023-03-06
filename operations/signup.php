<?php
if(isset($_POST['submit2']))
{   
    if(isset($_POST['firstname'],$_POST['lastname'],$_POST['address']) && !empty($_POST['email']) && !empty($_POST['password']) && !empty($_POST['passwordConfirmation']))
    {
        $firstname = htmlspecialchars(trim($_POST['firstname']));
		$lastname = htmlspecialchars(trim($_POST['lastname']));
		$address = htmlspecialchars(trim($_POST['address']));
		$email = htmlspecialchars(trim($_POST['email']));
        $password = htmlspecialchars(trim($_POST['password']));
		$passwordConfirmation = htmlspecialchars(trim($_POST['passwordConfirmation']));

        $hashPassword = sha1($passwordConfirmation);
 
        if(filter_var($email, FILTER_VALIDATE_EMAIL))
		{
            $stmt = $conn->prepare("SELECT * FROM users WHERE email = :email");
            $p = [':email'=>$email];
            $stmt->execute($p);
            $result=$stmt->fetchAll(PDO::FETCH_NUM);
            echo "<br>";
            if($stmt->rowCount() == 0 && $password == $passwordConfirmation)
            {
                try{
                    $handle = $conn->prepare("INSERT INTO users (firstname, lastname, pw, email, address) VALUES(:firstname, :lastname, :password, :email, :address)");
                   
                    $params = [
                        ':firstname'=>$firstname,
                        ':lastname'=>$lastname,
                        ':password'=>$hashPassword,
                        ':email'=>$email,
                        ':address'=>$address
                    ];
            
                    $handle->execute($params);
                    $success = 'Registration is <strong>successful</strong>.';
                    
                }
                catch(connException $e){
                    if(isset($emailTaken)) $emailTaken = $e->getMessage();
                    else if(isset($noMatchingPw)) $noMatchingPw = $e->getMessage();
                    else if(isset($noValidEmail)) $noValidEmail = $e->getMessage();
                    else if(isset($noFirstName)) $noFirstName = $e->getMessage();
                    else if(isset($noLastName)) $noLastName = $e->getMessage();
                    else if(isset($noAddress)) $noAddress = $e->getMessage();
                    else if(isset($noEmail)) $noEmail = $e->getMessage();
                    else if(isset($noPassword)) $noPassword = $e->getMessage();
                    else if(isset($noPasswordConf)) $noPasswordConf = $e->getMessage();
                }
            }
			else if($stmt->rowCount() > 0 && $password == $passwordConfirmation)
            {
                $emailTaken = 'This email address is already taken.';
            }
            else if($stmt->rowCount() == 0 && $password != $passwordConfirmation)
            {
                $noMatchingPw = 'Passwords do not match.';
            }
		}
		else
		{
			$noValidEmail = "Please enter a valid email address.";
		}
    }
    else
    {
        if(!isset($_POST['firstname']) || empty($_POST['firstname']))
        {
            $noFirstName = 'Please enter a firstname.';
        }
 
        if(!isset($_POST['lastname']) || empty($_POST['lastname']))
        {
            $noLastName = 'Please enter a lastname.';
        }
 
        if(!isset($_POST['address']) || empty($_POST['address']))
        {
            $noAddress = 'Please enter an address.';
        }

        if(!isset($_POST['email']) || empty($_POST['email']))
        {
            $noEmail = 'Please enter an email.';
        }

		if(!isset($_POST['password']) || empty($_POST['password']))
        {
            $noPassword = 'Please enter a password.';
        }

        if(!isset($_POST['passwordConfirmation']) || empty($_POST['passwordConfirmation']))
        {
            $noPasswordConf = 'Please, confirm the password.';
        }
        
    }
}
?>
