<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
ini_set('default_charset', 'utf-8');
require '../db_config.php';
if (isset($_SESSION['logado'])) :
else :
  header("Location:login.php");
endif;

if (isset($_GET['edit_id']) && !empty($_GET['edit_id'])) {
  $id = $_GET['edit_id'];
  $stmt_edit = $DB_con->prepare('SELECT * FROM doctors WHERE id =:uid');
  $stmt_edit->execute(array(':uid' => $id));
  $edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
  extract($edit_row);
} else {
  header("Location: dashboard.php");
}

if (isset($_POST['btnsave'])) {
    $name = $_POST['name'];
    $specialty = $_POST['specialty'];
    $crm = $_POST['crm'];
    $contact = $_POST['contact'];
    $old_date = $_POST['date_nasc']; 
    if(!empty($old_date)){
    $date_nasc = date('d/m/Y',strtotime($old_date));
  }
    $email = $_POST['email'];
    $instagram = $_POST['instagram'];
    $curriculum = $_POST['curriculum'];
    $rqe = $_POST['rqe'];

  $imgFile = $_FILES['user_image']['name'];
  $tmp_dir = $_FILES['user_image']['tmp_name'];
  $imgSize = $_FILES['user_image']['size'];

  if (empty($name)) {
    $errMSG = "Por favor, insira o nome do Profissional";
  }
  if ($imgFile) {
    $upload_dir = 'uploads/doctors/';
    $imgExt =  strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
    $valid_extensions = array('jpeg', 'jpg', 'png', 'webp');

    $userpic = rand(1000, 1000000) . "." . $imgExt;

    // allow valid image file formats
    if (in_array($imgExt, $valid_extensions)) {
      // Check file size '5MB'
      if ($imgSize < 5000000) {
        move_uploaded_file($tmp_dir, $upload_dir . $userpic);
      } else {
        $errMSG = "Imagem muito grande.";
      }
    }
  } else {
    $userpic = $img;
  }
  if (!isset($errMSG)) {
    $stmt = $DB_con->prepare('UPDATE doctors
    SET 
    name=:uname,
    specialty=:uspecialty,
    crm=:ucrm,
    contact=:ucontact,
    date_nasc=:udate_nasc,
    email=:uemail,
    instagram=:uinstagram,
    curriculum=:ucurriculum,
    img=:upic,
    rqe=:urqe
    WHERE id=:uid ;');
    $stmt->bindParam(':uname', $name);
    $stmt->bindParam(':uspecialty', $specialty);
    $stmt->bindParam(':ucrm', $crm);
    $stmt->bindParam(':ucontact', $contact);
    $stmt->bindParam(':udate_nasc', $date_nasc);
    $stmt->bindParam(':uemail', $email);
    $stmt->bindParam(':uinstagram', $instagram);
    $stmt->bindParam(':ucurriculum', $curriculum);
    $stmt->bindParam(':upic', $userpic);
    $stmt->bindParam(':urqe', $rqe);
    $stmt->bindParam(':uid', $id);

    if ($stmt->execute()) {
      echo ("<script>
        alert (\"Profissional atualizado com sucesso\")
        window.location.href = './corpo_clinico.php';
        </script>"
      );
    } else {
      $errMSG = "Erro..";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php include "components/heads.php" ?>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="./assets/css/swiper.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            color1: '#006CAC',
            color2: '#FFFFFF',
            color3: '#0070AC',
          }
        }
      }
    }
  </script>
</head>

<body>
  <?php include "components/sidebar.php" ?>
  <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
    <?php include "components/header.php" ?>
    <div class="px-6 pt-6 2xl:container">
    <form action="" method="POST" enctype="multipart/form-data">
        <div class="flex w-full justify-center">
          <div class="space-y-6 w-full">
            <div class="grid md:grid-cols-2 gap-6">
              <input name="name" value="<?php echo $name ?>" class="w-full text-sm px-4 py-3 focus:bg-gray-100 border border-gray-300 rounded-none focus:outline-none focus:border-color1" type="" placeholder="Nome">
              <input name="crm" value="<?php echo $crm ?>" class="w-full text-sm px-4 py-3 focus:bg-gray-100 border border-gray-300 rounded-none focus:outline-none focus:border-color1" type="" placeholder="CRM">
              <input style="height:45px" name="contact" value="<?php echo $contact ?>" class="w-full md:mt-6 text-sm px-4 py-3 focus:bg-gray-100 border border-gray-300 rounded-none focus:outline-none focus:border-color1" type="" placeholder="Contato">
              <div class="grid">
                <label for="date_nasc">Data de nascimento: <?php echo $date_nasc ?></label>
                <input name="date_nasc" class="w-full text-sm px-4 py-3 focus:bg-gray-100 border border-gray-300 rounded-none focus:outline-none focus:border-color1" type="date" placeholder="Data de Nascimento">
              </div>  
              <input name="email" value="<?php echo $email ?>" class="w-full text-sm px-4 py-3 focus:bg-gray-100 border border-gray-300 rounded-none focus:outline-none focus:border-color1" type="" placeholder="Email">
              <input name="instagram" value="<?php echo $instagram ?>" class="w-full text-sm px-4 py-3 focus:bg-gray-100 border border-gray-300 rounded-none focus:outline-none focus:border-color1" type="text" placeholder="Instagram">
              <input name="curriculum" value="<?php echo $curriculum ?>"class="w-full text-sm px-4 py-3 focus:bg-gray-100 border border-gray-300 rounded-none focus:outline-none focus:border-color1" type="text" placeholder="Curriculum Lates">
              <input name="rqe" value="<?php echo $rqe ?>" class="w-full text-sm px-4 py-3 focus:bg-gray-100 border border-gray-300 rounded-none focus:outline-none focus:border-color1" type="text" placeholder="RQE">
              <div>
                <label>Especialidade</label>
                <select name="specialty" class="w-full text-sm px-4 py-3 focus:bg-gray-100 border border-gray-300 rounded-none focus:outline-none focus:border-color1">
                    <option value="<?php echo $specialty ?>"> <?php echo $specialty?> (selecionado)</option>
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
                </select>
              </div>
            </div>
            <div class="items-center lg:grid lg:grid-cols-2">
            <div class="flex justify-center"><img class="h-72 " src="./uploads/doctors/<?php echo $img; ?>" onerror="this.src='../assets/img/semperfil.png'" alt="Profile"></div>
            <div x-data="showImage()" class="flex items-center justify-centermt-32 mb-32">
              <div class="bg-white rounded-lg shadow-xl md:w-9/12 lg:w-1/2">
                <div class="m-4">
                  <label class="inline-block mb-2">Imagens - Pré-visualização</label>
                  <div class="flex items-center justify-center w-full">
                    <label class="flex flex-col w-full h-40 border-4 border-dashed hover:bg-gray-100 hover:border-gray-300">
                      <div class="relative flex flex-col items-center justify-center pt-7">
                        <img id="preview" class="absolute inset-0 w-full h-40">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-12 h-12 text-gray-400 group-hover:text-gray-600" viewBox="0 0 20 20" fill="currentColor">
                          <path fill-rule="evenodd" d="M4 3a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V5a2 2 0 00-2-2H4zm12 12H4l4-8 3 6 2-4 3 6z" clip-rule="evenodd" />
                        </svg>
                        <p class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600">
                          Escolha uma foto</p>
                      </div>
                      <input type="file" name="user_image" class="opacity-0" accept="image/*" @change="showPreview(event)" />
                    </label>
                  </div>
                </div>
              </div>
            </div>
            </div>
            <button type="submit" name="btnsave" class="w-1/2 flex justify-center bg-color1 text-gray-100 p-3  rounded-lg tracking-wide font-semibold  cursor-pointer transition ease-in duration-500">
              Editar Profissional
            </button>
          </div>
          <div class="items-center lg:grid lg:grid-cols-2">
      </form>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.2/tinymce.min.js" integrity="sha512-MbhLUiUv8Qel+cWFyUG0fMC8/g9r+GULWRZ0axljv3hJhU6/0B3NoL6xvnJPTYZzNqCQU3+TzRVxhkE531CLKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <script>
    tinymce.init({
      selector: 'textarea#default',
      plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker imagetools textpattern noneditable help formatpainter permanentpen pageembed charmap tinycomments mentions quickbars linkchecker emoticons advtable export',
      menu: {
        tc: {
          title: 'Comments',
          items: 'addcomment showcomments deleteallconversations'
        }
      },
      menubar: 'file edit view insert format tools table tc help',
      toolbar: 'undo redo | bold italic underline strikethrough | fontselect fontsizeselect formatselect | alignleft aligncenter alignright alignjustify | outdent indent |  numlist bullist checklist | forecolor backcolor casechange permanentpen formatpainter removeformat | pagebreak | charmap emoticons | fullscreen  preview save print | insertfile image media pageembed template link anchor codesample | a11ycheck ltr rtl | showcomments addcomment'
    });
  </script>
  <script>
    function showImage() {
      return {
        showPreview(event) {
          if (event.target.files.length > 0) {
            var src = URL.createObjectURL(event.target.files[0]);
            var preview = document.getElementById("preview");
            preview.src = src;
            preview.style.display = "block";
          }
        }
      }
    }
  </script>
</body>

</html>