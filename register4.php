<?php
include_once 'config.php';
$link_address = '/login4.php';
// Check data submition
if (!isset($_POST['username'], $_POST['password'], $_POST['email'])) {
	// If could not get the data
	exit('Please complete the registration form!');
}
// Make sure the submitted values are not empty
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['email'])) {
	// One or more values are empty
	exit('Please complete the registration form');
}

// We need to check if the account with that username exists.
if ($stmt = $con->prepare('SELECT id, password FROM studentfacultyaccounts WHERE username = ?')) {
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	$stmt->store_result();
	if ($stmt->num_rows > 0) {
		// Username already exists
		echo 'Username exists, please choose another!';
	} else {
        // Username doesnt exists, insert new account
        if ($stmt = $con->prepare('INSERT INTO studentfacultyaccounts (username, password, email) VALUES (?, ?, ?)')) {
            // using the hash password function to secure the password in database
            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $stmt->bind_param('sss', $_POST['username'], $password, $_POST['email']);
            $stmt->execute();
            echo "You have successfully registered, click <a href='$link_address'>HERE</a> to login!";
        } else {
            // Error with sql statement.
            echo 'Could not prepare statement!';
        }
 
	}
	$stmt->close();
} else {
	// Something is wrong with the sql statement, check to make sure accounts table exists with all 3 fields.
	echo 'Could not prepare statement!';
}
$con->close();
?>
