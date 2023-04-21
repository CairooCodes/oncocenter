<div class="mx-auto max-w-6xl pt-2 about">
  <div class="lg:grid lg:grid-cols-3">
    <?php $stmt = $DB_con->prepare("SELECT * FROM doctors order by name asc, img desc");
    $stmt->execute();
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
      extract($row);
    ?>
      <div class="lg:p-4 doctor py-4 px-2 rounded-xl bg-white group shadow-xl hover:rounded-2xl lg:m-5 m-2">
        <?php if (!empty($title_office)) { ?>
          <p style="word-wrap: break-word;" class="font-bold uppercase text-center text-sm py-2 uppercase">
            <?php echo $title_office; ?>
          </p>
        <?php } ?>
        <div class="flex items-center justify-between">
          <div class="flex mt-6 gap-3">
            <img src="./admin/uploads/doctors/<?php echo $row['img']; ?>" onerror="this.src='./assets/img/semperfil.png'" class="rounded-full object-cover h-24 w-24" />
            <div>
              <p style="width:80%; word-wrap: break-word;" class="text-md font-semibold ">
                <?php echo $name; ?>
              </p>
              <p style="width:80%; word-wrap: break-word;" class="text-sm py-2 uppercase">
                <?php echo $specialty; ?>
              </p>
            </div>
          </div>
        </div>
        <div style="margin-bottom: 0px !important;" class="flex items-center space-x-4 justify-center">
          <p style="word-wrap: break-word;" class="text-sm py-2"><strong class="">
              <?php
              if ($specialty == 'NUTRICIONISTA') {
                echo 'CRN';
              }
              if ($specialty == 'PSICÓLOGA') {
                echo 'CRP';
              }
              if ($specialty == 'FISIOTERAPEUTA') {
                echo 'CREFITO';
              }
              if ($specialty == 'Enfermeira') {
                echo 'COREN';
              }
              if ($specialty == 'Farmacêutico') {
                echo 'CRF';
              }
              if ($specialty == 'PSCICÓLOGA') {
                echo 'CRP';
              }
              if (($specialty != 'PSCICÓLOGA') && ($specialty != 'NUTRICIONISTA') && ($specialty != 'PSICÓLOGA') && ($specialty != 'FISIOTERAPEUTA') && ($specialty != 'Enfermeira') && ($specialty != 'Farmacêutico')) {
                echo 'CRM';
              } ?>

            </strong><?php echo $crm ?></p>
          <div class="flex items-center space-x-1 my-4">
            <?php if (!empty($rqe)) { ?>
              <p style="word-wrap: break-word;" class="text-sm py-2"><strong class="">RQE </strong><?php echo $rqe ?></p>
            <?php } ?>
          </div>
        </div>
        <?php if (!empty($curriculum)) { ?>
          <a href="<?php echo $curriculum ?>" target="blank" class="text-xs"><strong class=""><i class="bi bi-card-list mr-1"></i>Curriculum Lattes</strong> </a>
        <?php } ?>
      </div>
    <?php
    }
    ?>
  </div>
</div>