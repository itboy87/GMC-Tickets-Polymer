
<?php
session_start();
$pageTitle = "GMC - Registration Ticket";
    $isUserLoggedIn = false;

    if(isset($_SESSION['email']) && isset($_SESSION['user_id']))
    {
        $isUserLoggedIn = true;
    }
?>

<!doctype html>
    <html>
<head>
    <title><?php echo $pageTitle; ?></title>

<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-capable" content="yes">

    <script type="text/javascript" src="jquery/jquery-1.11.3.min.js"></script>
    <script src="bower_components/webcomponentsjs/webcomponents-lite.min.js"></script>
    <link rel="import" href="bower_components/iron-flex-layout/iron-flex-layout.html">

    <?
        if($isUserLoggedIn) {
            //User Logged In
            ?>
            <link rel="stylesheet" href="css/styles.css">
            <link rel="import" href="imports.php">

            <?
        }else {
            //User not logged in

            ?>
            <link rel="import" href="elements/login-page.html">

            <link rel="import" href="elements/gmc-logo.php">

            <?
        }
    ?>
</head>

<body unresolved class="fullbleed">

<?php
if($isUserLoggedIn)
{
    require_once"home.php";
}
else
{
    ?>
    <gmc-logo></gmc-logo>
    <login-page></login-page>

    <?php
}
?>
</body>
</html>