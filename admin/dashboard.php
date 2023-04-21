<?php
session_start();
require '../db_config.php';
if (isset($_SESSION['logado'])) :
else :
	header("Location:login.php");
endif;
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
	<?php include "components/heads.php" ?>
	<?php include "config/twconfig.php"; ?>
</head>

<body>
	<?php include "components/sidebar.php" ?>
	<div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
		<?php include "components/header.php" ?>
		<div class="px-6 pt-6 2xl:container">
			<div class="grid gap-6 md:grid-cols-2 lg:grid-cols-3 pb-6">
				<div class="md:col-span-2 lg:col-span-1">
					<a href="banners.php">
						<div class="h-full py-8 px-6 space-y-6 rounded-xl text-2xl border border-gray-200 bg-color1 text-white">
							<i class="bi bi-images"></i>
							BANNERS
						</div>
					</a>
				</div>
				<div class="md:col-span-2 lg:col-span-1">
					<a href="servicos.php">
						<div class="h-full py-8 px-6 space-y-6 rounded-xl text-2xl border border-gray-200 bg-color1 text-white">
							<i class="fas fa-briefcase-medical"></i>
							SERVIÇOS
						</div>
					</a>
				</div>
				<div class="md:col-span-2 lg:col-span-1">
					<a href="corpo_clinico.php">
						<div class="h-full py-8 px-6 space-y-6 rounded-xl text-2xl border border-gray-200 bg-color1 text-white">
							<i class="bi bi-hospital"></i>
							CORPO CLÍNICO
						</div>
					</a>
				</div>
			</div>
			<?php include "components/analytics.php" ?>
		</div>
	</div>
</body>

</html>