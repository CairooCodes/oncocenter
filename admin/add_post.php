<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
ini_set('default_charset', 'utf-8');
require '../db_config.php';
if (isset($_SESSION['logado'])) :
else :
  header("Location:login.php");
endif;

if (isset($_POST['btnsave'])) {
  $title = $_POST['title'];
  $info = $_POST['info'];

  $imgFile = $_FILES['user_image']['name'];
  $tmp_dir = $_FILES['user_image']['tmp_name'];
  $imgSize = $_FILES['user_image']['size'];

  if (empty($title)) {
    $errMSG = "Por favor, insira o nome do Curso";
  } else {
    $upload_dir = 'uploads/posts/';
    $imgExt =  strtolower(pathinfo($imgFile, PATHINFO_EXTENSION));
    $valid_extensions = array('jpeg', 'jpg', 'png', 'webp');
    $userpic = rand(1000, 1000000) . "." . $imgExt;


    if (in_array($imgExt, $valid_extensions)) {
      if ($imgSize < 59000000) {
        move_uploaded_file($tmp_dir, $upload_dir . $userpic);
      } else {
        $errMSG = "Imagem muito grande.";
      }
    }
  }
  if (!isset($errMSG)) {
    $stmt = $DB_con->prepare('INSERT INTO posts (title,info,img) VALUES(:utitle,:uinfo,:upic)');
    $stmt->bindParam(':utitle', $title);
    $stmt->bindParam(':uinfo', $info);
    $stmt->bindParam(':upic', $userpic);

    if ($stmt->execute()) {
      echo ("<script>
        alert (\"Post adicionado com sucesso\")
        window.location.href = './blog.php';
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
  <?php include "config/twconfig.php"; ?>
</head>

<body>
  <?php include "components/sidebar.php" ?>
  <div class="ml-auto mb-6 lg:w-[75%] xl:w-[80%] 2xl:w-[85%]">
    <?php include "components/header.php" ?>
    <div class="px-6 pt-6 2xl:container">
      <form action="" method="POST" enctype="multipart/form-data">
        <div class="flex w-full justify-center">
          <div class="space-y-6">
            <input name="title" class="w-full text-sm px-4 py-3 focus:bg-gray-100 border border-gray-300 rounded-none focus:outline-none focus:border-color1" type="" placeholder="Titulo da postagem">
            <textarea name="info" id="default" placeholder="Conteúdo do post"></textarea>
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
            <button type="submit" name="btnsave" class="w-1/2 flex justify-center bg-color1 text-gray-100 p-3  rounded-lg tracking-wide font-semibold  cursor-pointer transition ease-in duration-500">
              Adicionar Post
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