<?php
require "db_config.php";
require "config/helper.php";
require "config/url.class.php";
require "./functions/get.php";

$posts = getPosts();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <?php include "components/heads.php"; ?>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.css" />
  <link rel="stylesheet" href="./assets/css/swiper.css">
</head>


<body>
  <?php include "components/navbar.php"; ?>
  <?php include "components/banners.php"; ?>
  <?php include "components/about.php"; ?>
  <?php include "components/services.php"; ?>
  <?php include "components/agreements.php"; ?>
  <?php include "components/infos_books.php"; ?>

  <?php include "components/feed_instagram.php"; ?>

  <?php
  $stmt = $DB_con->prepare("SELECT * FROM posts");
  $stmt->execute();
  if ($stmt->rowCount() > 0) {
    include "components/blog.php";
  }
  ?>
  <?php include "components/footer.php"; ?>

  <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>
  <script>
    var swiper = new Swiper(".swiper_banners", {
      slidesPerView: 1,
      centeredSlides: true,
      freeMode: true,
    });
  </script>
  <script>
    var swiper = new Swiper(".swiper_blog", {
      centeredSlides: true,
      loop: true,
      breakpoints: {
        300: {
          slidesPerView: 1.1,
          spaceBetween: 1,
        },
        640: {
          slidesPerView: 2,
          spaceBetween: 5,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 5,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 5,
        },
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
      navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
      },
    });
  </script>
  <script>
    var swiper = new Swiper(".swiper_services", {
      loop: true,
      breakpoints: {
        300: {
          slidesPerView: 1.1,
          spaceBetween: 20,
        },
        640: {
          slidesPerView: 2,
          spaceBetween: 30,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
      },
    });
  </script>
  <script>
    var swiper = new Swiper(".swiper_convenios", {
      autoplay: {
        delay: 2000,
      },
      centeredSlides: true,
      freeMode: true,
      loop: true,
      breakpoints: {
        300: {
          slidesPerView: 1.3,
          spaceBetween: 20,
        },
        640: {
          slidesPerView: 2,
          spaceBetween: 30,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
        1024: {
          slidesPerView: 8,
          spaceBetween: 30,
        },
      },
    });
  </script>
  <script>
    var swiper = new Swiper(".swiper_books", {
      centeredSlides: true,
      autoplay: {
        delay: 2000,
      },
      freeMode: true,
      loop: true,
      breakpoints: {
        300: {
          slidesPerView: 1.4,
          spaceBetween: 20,
        },
        640: {
          slidesPerView: 2,
          spaceBetween: 30,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 30,
        },
        1024: {
          slidesPerView: 3,
          spaceBetween: 10,
        },
      },
    });
  </script>
  <script>
    var swiper = new Swiper(".swiper_redes", {
      slidesPerView: 1,
      centeredSlides: true,
      freeMode: true,
    });
  </script>
  <script>
    fetch('/oncocenter/components/instagram.php')
      .then((response) => {
        if (!response.ok) {
          throw new Error('Network response was not ok');
        }
        return response.json(); // Converte a resposta para JSON
      })
      .then((data) => {
        const container = document.querySelector(".InstaFeed");

        if (data.data) {
          data.data.forEach((img, index) => {
            const mediaType = img.media_type;
            const mediaUrl = img.media_url;
            const thumbnailUrl = img.thumbnail_url;
            const permalink = img.permalink;

            let sliderContainer = document.createElement("a");
            sliderContainer.id = index;
            sliderContainer.href = permalink || "#";
            sliderContainer.target = "_blank";
            sliderContainer.classList.add("swiper-slide");
            container.appendChild(sliderContainer);

            if (mediaType === "VIDEO") {
              const video = document.createElement("img");
              video.src = thumbnailUrl;
              video.classList.add("container-video");
              sliderContainer.appendChild(video);
            } else {
              const img = document.createElement("img");
              img.src = mediaUrl;
              img.classList.add("container-img");
              sliderContainer.appendChild(img);
            }
          });
        } else {
          console.log("No media data found.");
        }
      })
      .catch((error) => {
        console.error('Fetch error:', error);
      });
  </script>
  <script>
    var swiper = new Swiper(".mySwiper5", {
      freeMode: true,
      spaceBetween: 20,
      breakpoints: {
        300: {
          slidesPerView: 1.2,
          spaceBetween: 20,
        },
        500: {
          slidesPerView: 2,
          spaceBetween: 20,
        },
        768: {
          slidesPerView: 3,
          spaceBetween: 15,
        },
        1024: {
          slidesPerView: 4.5,
          spaceBetween: 20,
        }
      },
    });
  </script>
</body>

</html>