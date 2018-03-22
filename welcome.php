<?php include 'header.php';
session_start();
if (isset($_SESSION['username'])):?>
    <div class="w3-panel w3-green">
        <p><?= $_SESSION['username'] ?></p>
    </div>
    <div class="container" style="background-color:#f1f1f1">
        <span class="psw"><a href="logout.php">Logout</a></span>
    </div>
<?php else:
    session_start();
    $_SESSION['error'] = 'Please login';
    header('location:index.php');
    endif;
include 'footer.php';
?>