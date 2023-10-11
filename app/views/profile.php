<?php
session_start();

// Check if the user is logged in
if (!isset($_COOKIE['user'])) {
    // If the user is not logged in, you can redirect them to the login page
    header('Location: app/views/login.php');
    exit;
}

// Get user data based on the session
$user = unserialize($_COOKIE['user']);

// Here, you would typically retrieve user data from the database using your User model.
// For this example, we assume that $user contains the user data.

?>

<!DOCTYPE html>
<html>
<head>
    <title>User Profile</title>
    <link rel="stylesheet" type="text/css" href="../../public/css/styles.css">

</head>
<body>
    <h1>User Profile</h1>
    
    <!-- Display user information -->
    <p><strong>Email:</strong> <?php echo $user['email']; ?></p>
    <p><strong>Role:</strong> <?php echo $user['role']; ?></p>
    <p><strong>Created At:</strong> <?php echo $user['created_at']; ?></p>

    <!-- You can also add links to edit profile, change password, etc. -->
    <a href="../../index.php?action=edit">Edit Profile</a>
    <a href="../../index.php?action=delete&id=<?php echo $user['id']; ?>">delete Profile</a> 
    <a href="../../index.php?action=logout">logout </a> 

</body>
</html>
