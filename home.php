<?php
include_once 'add_user.php';
if (!$mySQL->is_loggedin()) {
  $mySQL->redirect('index.php');
}
$user_id = $_SESSION['user_session'];
$userRow = $mySQL->getUserById($user_id);
$mySQL->logout();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>welcome - <?php print($userRow['email']); ?></title>
</head>

<body>

<div class="content">
  <h3> Welcome: <?php print($userRow['name']); ?></h3>
  <p>Message send successfully! Check your E-mail!</p>
</div>
</body>
</html>