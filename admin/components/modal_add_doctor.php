<div id="addDoctorModal" tabindex="-1" aria-hidden="true" class="fixed z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] md:h-full">
  <div class="relative w-full h-full max-w-7xl md:h-auto">
    <!-- Modal content -->
    <form action="./controllers/add_doctor.php" method="post" enctype="multipart/form-data" class="relative bg-white rounded-lg shadow">
      <!-- Modal header -->
      <div class="flex items-start justify-between p-4 border-b rounded-t">
        <h3 class="text-xl font-semibold text-gray-900">
          Adicionar Médico
        </h3>
        <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center" data-modal-hide="addDoctorModal">
          <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
          </svg>
        </button>
      </div>
      <!-- Modal body -->
      <div class="p-6 space-y-6">
        <div class="grid grid-cols-6 gap-6">
          <div class="col-span-6 sm:col-span-3">
            <label class="block mb-2 hidden text-sm font-medium text-gray-900">Nome</label>
            <input type="text" name="name" id="name" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Nome" required="">
          </div>
          <div class="col-span-6 sm:col-span-3">
            <label class="block mb-2 hidden text-sm font-medium text-gray-900">Imagem</label>
            <input type="file" id="img" name="img" accept="image/*">
          </div>
          <div class="col-span-6 sm:col-span-3">
            <label>Especialidade</label>
            <select name="specialty" class="w-full text-sm px-4 py-3 focus:bg-gray-100 border border-gray-300 rounded-none focus:outline-none focus:border-color1">
              <?php
              $stmt = $DB_con->prepare("SELECT specialty from doctors group by specialty");
              $stmt->execute();
              while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                extract($row);
              ?>
                <option value="<?php echo $specialty ?>">
                  <?php
                  $specialty2 = str_replace('<br>', '/', $specialty);
                  echo $specialty2;
                  ?>
                </option>
              <?php } ?>
              <option value="<?php echo $specialty ?>"> <?php echo $specialty ?> (selecionado)</option>
            </select>
          </div>
          <div class="col-span-6 sm:col-span-3">
            <label class="block text-sm font-medium text-gray-900">Link</label>
            <input type="text" name="link" id="link" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Link de redirecionamento" required="">
          </div>
          <div class="col-span-6 sm:col-span-3">
            <label for="title_office" class="block text-sm font-medium text-gray-900">Título de Cargo</label>
            <input type="text" name="title_office" id="title_office" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Titulo de cargo" required="">
          </div>
          <div class="col-span-6 sm:col-span-3">
            <label class="block text-sm font-medium text-gray-900">CRM</label>
            <input type="text" name="crm" id="crm" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="CRM" required="">
          </div>

          <div class="col-span-6 sm:col-span-3">
            <label class="block text-sm font-medium text-gray-900">Contato</label>
            <input type="text" name="contact" id="contact" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Contato" required="">
          </div>
          <div class="col-span-6 sm:col-span-3">
            <label for="date_nasc" class="block text-sm font-medium text-gray-900">Data de Nascimento</label>
            <input type="date" name="date_nasc" id="link" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Data de Nascimento" required="">
          </div>
          <div class="col-span-6 sm:col-span-3">
            <label class="block text-sm font-medium text-gray-900">Email</label>
            <input type="text" name="email" id="email" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Email" required="">
          </div>

          <div class="col-span-6 sm:col-span-3">
            <label class="block text-sm font-medium text-gray-900">Instagram</label>
            <input type="text" name="instagram" id="instagram" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Instagram" required="">
          </div>
          <div class="col-span-6 sm:col-span-3">
            <label class="block text-sm font-medium text-gray-900">Currículo</label>
            <input type="text" name="curriculum" id="curriculum" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="Curriculum Lates" required="">
          </div>
          <div class="col-span-6 sm:col-span-3">
            <label class="block text-sm font-medium text-gray-900">RQE</label>
            <input type="text" name="rqe" id="rqe" class="shadow-sm bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-600 focus:border-blue-600 block w-full p-2.5" placeholder="RQE" required="">
          </div>
        </div>
        <!-- Modal footer -->
        <div class="flex items-center">
          <button type="submit" class="text-white bg-color1 hover:bg-color1 focus:ring-4 focus:outline-none focus:ring-color1 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Cadastrar Médico</button>
        </div>
    </form>
  </div>
</div>