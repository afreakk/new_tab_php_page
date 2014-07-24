<html content="text/html; charset=utf-8">
<head>
    <link href='http://fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <title>(EDIT)</title>
</head>
<body>
    <h1>*___*</h1>
    <?php include("php/list_links_edit.php"); ?>
    <ul class="btm">
        <form action="php/sql_new_link.php" method="post">
            <li>
                arrange NO.:<input type="text" name="arrange">
                title:<input type="text" name="title">
                url:<input type="text" name="url">
                imgurl:<input type="text" name="img">
                <input type="submit" value="new link">
            </li>
        </form>
        <form action="index.php">
            <input type="submit" value="Back">
        </form>
    </ul>
</body>
</html>
