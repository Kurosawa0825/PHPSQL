<?php
require_once('data.php');

$user = 'root';
$pwd = 'Hosi1998';
$host = 'localhost';
$dbname = 'accessdata';
$dsn = "mysql:host={$host};port=3306;dbname={$dbname};";

$link = mysqli_connect($host, $user, $pwd, $dbname);
if (!$link) {
    print_r('接続失敗です');
}

$conn = new PDO($dsn, $user, $pwd);

$pst = $conn->query('select * from accesscount');

$result = $pst->fetchAll(PDO::FETCH_ASSOC);

echo '<pre>';
print_r($result);
echo '</pre>';
?>
?>

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
                <?php foreach ($menus as $menu) : ?>
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
        <table>
            <tr>
                <th>来訪者</th>
            </tr>
        </table>
</body>
</div>

</html>