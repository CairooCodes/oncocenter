<?php
require "db_config.php";
require "config/helper.php";
require "config/url.class.php";
require "config/functions.php";
$URI = new URI();

$url = explode("/", $_SERVER['REQUEST_URI']);
$get_url = $url[3];
$get_url_2 = "";

$stmt = $DB_con->prepare("SELECT * FROM clinical");
$stmt->execute();
if ($stmt->rowCount() > 0) {
	while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
		extract($row);
		$string1 = remove_symbols_accents(utf8_decode($get_url));
		$string2 = remove_symbols_accents(utf8_decode($name));
		if ($string1 == $string2) {
			$get_url_2 = $name;
		}
	}
}

$stmt = $DB_con->prepare("SELECT * FROM clinical where name='$get_url_2'");
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
		<div class="items-center lg:grid lg:grid-cols-2">
			<div class="lg:p-10 p-2">
				<img class="rounded-md" src="<?php echo $URI->base("/admin/uploads/clinical/$img"); ?>">
			</div>
			<div class="lg:pt-4 lg:p-0 lg:p-10 p-5 text-justify">
				<?php echo $info ?>
			</div>
		</div>
	</div>
	<?php include "components/footer.php"; ?>

</body>

</html>