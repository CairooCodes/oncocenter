<?php
session_start();
require "../db_config.php";
require "../functions/get.php";

if (!isset($_SESSION['id'])) {
	header('Location: login.php');
	exit;
}

$user_id = $_SESSION['id'] ?? null;
$sql = "SELECT name, email, img FROM users WHERE id = ?";
$stmt = $DB_con->prepare($sql);
$stmt->execute([$user_id]);
$user = $stmt->fetch();

$doctors = getDoctors();
$categories = getCategories();

$page = 'dash';
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
							<div class="flex space-x-2">
								<i class="bi bi-images"></i>
								<h6>
									BANNERS
									<?php
									$sth = $DB_con->prepare("SELECT count(*) as total from banners");
									$sth->execute();
									print_r($sth->fetchColumn());
									?>
								</h6>
							</div>
						</div>
					</a>
				</div>
				<div class="md:col-span-2 lg:col-span-1">
					<a href="servicos.php">
						<div class="h-full py-8 px-6 space-y-6 rounded-xl text-2xl border border-gray-200 bg-color1 text-white">
							<div class="flex space-x-2">
								<i class="fas fa-briefcase-medical"></i>
								<h6>
									SERVIÇOS
									<?php
									$sth = $DB_con->prepare("SELECT count(*) as total from services");
									$sth->execute();
									print_r($sth->fetchColumn());
									?>
								</h6>
							</div>
						</div>
					</a>
				</div>
				<div class="md:col-span-2 lg:col-span-1">
					<a href="convenios.php">
						<div class="h-full py-8 px-6 space-y-6 rounded-xl text-2xl border border-gray-200 bg-color1 text-white">
							<div class="flex space-x-2">
								<i class="bi bi-hospital"></i>
								<h6>
									CONVÊNIOS
									<?php
									$sth = $DB_con->prepare("SELECT count(*) as total from agreements");
									$sth->execute();
									print_r($sth->fetchColumn());
									?>
								</h6>
							</div>


						</div>
					</a>
				</div>
			</div>
			<div class="relative overflow-x-auto shadow-md sm:rounded-lg">
				<div class="flex items-center justify-between py-4 bg-white">
					<div>
						<h4 class="font-bold text-gray-700">CORPO CLINICO:
							<?php
							$sth = $DB_con->prepare("SELECT count(*) as total from doctors");
							$sth->execute();
							print_r($sth->fetchColumn());
							?> CADASTROS
						</h4>
					</div>
					<div class="flex space-x-2">
						<button id="dropdownActionButton" data-dropdown-toggle="dropdownAction" class="inline-flex items-center text-gray-500 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5" type="button">
							Opções
							<svg class="w-3 h-3 ml-2" aria-hidden="true" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
							</svg>
						</button>
						<div>
							<div id="dropdownAction" class="z-10 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-44">
								<ul class="py-1 text-sm text-gray-700" aria-labelledby="dropdownActionButton">
									<li>
										<button data-modal-target="addDoctorModal" data-modal-show="addDoctorModal" class="block px-4 py-2 hover:bg-gray-100 w-full">Adicionar Médico</button>

									</li>
								</ul>
							</div>
						</div>
						<div class="relative">
							<div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
								<svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
									<path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
								</svg>
							</div>
							<input type="text" id="busca" class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500" placeholder="Busca">
						</div>
					</div>
				</div>
				<table class="w-full text-sm text-left text-gray-500">
					<thead class="text-xs text-gray-700 uppercase bg-gray-50">
						<tr>
							<th scope="col" class="px-6 py-3">
								Nome
							</th>
							<th scope="col" class="px-6 py-3">
								Especialidade
							</th>
							<th scope="col" class="px-6 py-3">
								Conselho Regional
							</th>
							<th scope="col" class="px-6 py-3">
								Ação
							</th>
						</tr>
					</thead>
					<tbody>
						<?php foreach ($doctors as $doctor) { ?>
							<tr class="bg-white border-b">
								<th scope="row" class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap">

									<img class="w-12 h-12 rounded-full" src="./uploads/doctors/<?php echo $doctor['img'] ?>" onerror='this.src="../assets/img/semperfil.png"' />

									<div class="pl-3">
										<div class="text-base font-semibold"><?php echo $doctor['name']; ?></div>
									</div>
								</th>
								<td class="px-6 py-4">
									<?php echo $doctor['specialty']; ?>
								</td>
								<td class="px-6 py-4">
									<?php echo $doctor['crm']; ?>
								</td>
								<td class="px-6 py-4">
									<a href="./editar_doctor.php?id=<?php echo $doctor['id']; ?>" type="button" class="font-medium text-blue-600 hover:underline">Editar</a>
									<a href="./controllers/delete_doctor.php?id=<?php echo $doctor['id']; ?>" type="button" class="font-medium text-red-600 hover:underline">Excluir</a>
								</td>
							</tr>
						<?php } ?>
					</tbody>
				</table>
				<?php include "./components/modal_add_doctor.php"; ?>
			</div>
		</div>
	</div>
	<script>
		const inputBusca = document.querySelector('#busca');
		inputBusca.addEventListener('input', () => {
			const termoBusca = inputBusca.value.toLowerCase();
			filtrarLinhas(termoBusca);
		});

		function filtrarLinhas(termo) {
			const tbody = document.querySelector('table tbody');
			const linhas = tbody.querySelectorAll('tr');

			linhas.forEach((linha) => {
				const textoLinha = linha.textContent.toLowerCase();
				if (textoLinha.includes(termo)) {
					linha.classList.remove('hidden');
				} else {
					linha.classList.add('hidden');
				}
			});
		}
	</script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/1.6.4/flowbite.min.js"></script>
</body>

</html>