<?php

// Check if the user is logged in
if (!isset($_COOKIE['user'])) {
    // If the user is not logged in, you can redirect them to the login page
    header('Location: app/views/login.php');
    exit;
}

// Get user data based on the session
$user = unserialize($_COOKIE['user']);

// Assume $user contains the user's information, e.g., email, role, etc.


?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Profile</title>
    <link rel="stylesheet" type="text/css" href="../../public/css/styles.css">

</head>
<body>
    <h1>Edit Profile</h1>

    <form method="post" action="index.php?action=edit">
        <label for="new_email">New Email:</label>
        <input type="email" name="new_email" value="<?php echo $user['email']; ?>" required><br>

        <label for="new_password">New Password:</label>
        <input type="password" name="new_password" placeholder="Leave blank to keep the current password" ><br>

        <!-- Add more fields for other profile information -->

        <input type="submit" value="Save Changes">
    </form>

</body>
</html>
