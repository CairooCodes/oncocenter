<?php
$URI = new URI();
$url = explode("/", $_SERVER['REQUEST_URI']);
$url_site = $url[1];

$stmt = $DB_con->prepare("SELECT * FROM heads");
$stmt->execute();
while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	extract($row);
}
?>
<title><?php echo $title; ?></title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta content="<?php echo $keywords; ?>" name="keywords">
<meta content="<?php echo $description; ?>" name="description">
<meta name="author" content="Cairo Felipe Developer">

<meta property="og:title" content="<?php echo $title; ?>" />
<meta property="og:url" content="<?php echo $url_site; ?>" />
<meta property="og:image" content="<?php echo $URI->base("/assets/img/$icon"); ?>" />
<meta property="og:description" content="<?php echo $description; ?>" />

<link rel="stylesheet" href="<?php echo $URI->base('/assets/css/style.css') ?>">
<link href="<?php echo $URI->base("/assets/img/$icon"); ?>" rel="icon">
<link href="<?php echo $URI->base("/assets/img/$icon"); ?>" rel="apple-touch-icon">
<script src="https://cdn.tailwindcss.com"></script>
<script>
	tailwind.config = {
		theme: {
			extend: {
				colors: {
					color1: '<?php echo $color1 ?>',
					color2: '<?php echo $color2 ?>',
					color3: '<?php echo $color3 ?>',
				}
			}
		}
	}
</script>