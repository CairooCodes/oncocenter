<?php
session_start();
date_default_timezone_set('America/Sao_Paulo');
ini_set('default_charset', 'utf-8');
require '../db_config.php';
if (isset($_SESSION['logado'])) :
else :
  header("Location:login.php");
endif;

$id = $_GET['id'];
$post = getPost($id);

function getPost($id)
{
  global $DB_con;
  $stmt = $DB_con->prepare("SELECT * FROM posts WHERE id = :id");
  $stmt->bindParam(':id', $id);
  $stmt->execute();
  return $stmt->fetch(PDO::FETCH_ASSOC);
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
      <form action="./controllers/edit_post.php?id=<?php echo $post['id']; ?>" method="POST" enctype="multipart/form-data">
        <div class="space-y-6">
          <input value="<?php echo $post['title']; ?>" name="title" class="w-full text-sm px-4 py-3 focus:bg-gray-100 border border-gray-300 rounded-none focus:outline-none focus:border-color1" type="" placeholder="Titulo do Post">
          <input value="<?php echo $post['subtitle']; ?>" name="subtitle" class="w-full text-sm px-4 py-3 focus:bg-gray-100 border border-gray-300 rounded-none focus:outline-none focus:border-color1" type="" placeholder="Subtitulo do Post">
          <textarea name="info" id="info"><?php echo $post['info']; ?></textarea>
          <div class="lg:grid lg:grid-cols-2">
            <div class="flex justify-center">
            <input type="file" id="img" name="img">
            </div>
          </div>
          <input id="id" name="id" type="hidden" value="<?php echo $post['id']; ?>">
          <button type="submit" name="btnsave" class=" w-1/2 flex justify-center bg-color1 text-gray-100 p-3  rounded-lg tracking-wide font-semibold  cursor-pointer transition ease-in duration-500">
            Editar Posts
          </button>
        </div>
      </form>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/5.10.2/tinymce.min.js" integrity="sha512-MbhLUiUv8Qel+cWFyUG0fMC8/g9r+GULWRZ0axljv3hJhU6/0B3NoL6xvnJPTYZzNqCQU3+TzRVxhkE531CLKg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

  <script>
    tinymce.init({
      selector: '#info',
      plugins: 'print preview powerpaste casechange importcss tinydrive searchreplace autolink autosave save directionality advcode visualblocks visualchars fullscreen image link media mediaembed template codesample table charmap hr pagebreak nonbreaking anchor toc insertdatetime advlist lists checklist wordcount tinymcespellchecker a11ychecker imagetools textpattern noneditable help formatpainter permanentpen pageembed charmap tinycomments mentions quickbars linkchecker emoticons advtable export',
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