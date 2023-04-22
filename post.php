<?php
require "db_config.php";
require "config/helper.php";
require "config/url.class.php";
require "config/functions.php";
$URI = new URI();

$url = explode("/", $_SERVER['REQUEST_URI']);
$get_url = $url[3];
$get_url_2 = "";

$stmt = $DB_con->prepare("SELECT * FROM posts");
$stmt->execute();
if ($stmt->rowCount() > 0) {
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		$string1 = remove_symbols_accents(utf8_decode($get_url));
		$string2 = remove_symbols_accents(utf8_decode($title));
		if ($string1 == $string2) {
			$get_url_2 = $title;
		}
	}
}

$stmt = $DB_con->prepare("SELECT * FROM posts where title='$get_url_2'");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	extract($row);
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
	<?php include "components/heads.php"; ?>
</head>

<body>
	<?php include "components/navbar.php"; ?>
	<div class="mx-auto max-w-6xl pt-2">
		<h1 class="text-center text-5xl py-4 font-serif"><?php echo $title ?></h1>
		<h2 class="text-center text-3xl py-4 font-serif"><?php echo $subtitle ?></h1>
		<?php echo $info ?>
	</div>
	<?php include "components/footer.php"; ?>

</body>

</html>