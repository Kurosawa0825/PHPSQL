<?php require_once('data.php') ?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Yummys</title>
    <link rel="stylesheet" type="text/css" href="stylesheet.css">
    <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet'>
</head>
<body>
<div class="menu-wrapper container">
        <h1 class="logo">Yummys</h1>
        <form method="post" action="confirm.php">
            <div class="menu-items">
                <?php foreach($menus as $menu): ?>
                    <div class="menu-item">
                        <img src="<?php echo $menu->getImage() ?>" class="menu-item-image">
                        <h3 class="menu-item-name"><?php echo $menu->getName() ?></h3>
                        <p class="price">¥<?php echo $menu->getTaxIncludedPrice() ?> (税込) </p>
                        <input type="text" value="0" name="<?php echo $menu->getName() ?>">
                        <span>個</span>
                    </div>
                    <?php endforeach ?>
            </div>
            <input type="submit" value="注文する">
            </form>
            <?php

$dsn = 'orderhistory.sqlite3';

try{
    $dbh = new PDO( $dsn );
}catch( PDOException $error ){
    echo "接続失敗:".$error->getMessage();
    die();
}

$sql = 'select id, Name, count, order_date from orderhistory';
$stmt = $dbh->query( $sql );

echo "<table>\n";
echo "\t<tr><th>id</th><th>Name</th><th>count</th><th>order_date</th></tr>\n";
while( $result = $stmt->fetch( PDO::FETCH_ASSOC ) ){
    echo "\t<tr>\n";
    echo "\t\t<td>{$result['id']}</td>\n";
    echo "\t\t<td>{$result['Name']}</td>\n";
    echo "\t\t<td>{$result['count']}</td>\n";
    echo "\t\t<td>{$result['order_date']}</td>\n";
    echo "\t</tr>\n";
}
echo "</table>\n";

?>

            </body>
    </div>
</html>