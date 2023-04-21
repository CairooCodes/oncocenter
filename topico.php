<?php
require "db_config.php";
require "config/helper.php";
require "config/url.class.php";
require "config/functions.php";
$URI = new URI();

$url = explode("/", $_SERVER['REQUEST_URI']);
$get_url = $url[4];
$get_url_2 = "";

$stmt = $DB_con->prepare("SELECT * FROM services");
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

$stmt = $DB_con->prepare("SELECT * FROM services where name='$get_url_2'");
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
				<img class="rounded-md" src="<?php echo $URI->base("/admin/uploads/services/$img"); ?>">
			</div>
			<div class="lg:pt-4 mt-4 lg:p-0 lg:p-10 p-5 text-justify">
			<div class="bg-white px-6 py-3 rounded-lg">
				<h3 class="mb-4 text-xl font-base py-2 text-center text-color1"><?php echo $name; ?></h3>
				<?php echo $info ?>
				<br>
				<div class="flex justify-between mt-6">
				<div></div>
				<div><a href="<?php echo $URI->base("/quem-somos"); ?>" class="my-4 text-lg font-base py-2 text-right text-color1"><i class="bi bi-arrow-left"></i> Voltar Quem Somos</a></div>
				</div>
			</div>
			</div>
		</div>
	</div>
	<?php include "components/footer.php"; ?>

</body>

</html>