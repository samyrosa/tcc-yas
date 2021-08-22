
      <?php 
        function msg_erro($titulo,$msg,$bnt_name,$bnt_ref){
          echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header yas_msg_erro'>
                <h5 class='modal-title' id='exampleModalLabel'> <i class='yas_icon_msg bi bi-x-circle-fill'></i> $titulo</h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
              </div>
              <div class='modal-body'>
                $msg
              </div>
              <div class='modal-footer'>"
              ?>
              
                <button onclick="window.location.href = '<?php echo $bnt_ref ?>'" type='button' class='btn btn-primary'><?php echo $bnt_name ?></button> 
                <?php
                echo" </div>
            </div>
          </div>
        </div>";
        echo "<script src='bootstrap/js/bootstrap.bundle.js'> </script>
        <script>var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {});
    document.onreadystatechange = function () {
      myModal.show();
    };</script>";
        }
      ?>
      <?php 
        function msg_sucesso($titulo,$msg,$bnt_name,$bnt_ref){
          echo "<div class='modal fade' id='exampleModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
          <div class='modal-dialog'>
            <div class='modal-content'>
              <div class='modal-header yas_msg_sucesso'>
                <h5 class='modal-title' id='exampleModalLabel'> <i class='yas_icon_msg bi bi-check-circle-fill'></i> $titulo</h5>
                <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
              </div>
              <div class='modal-body'>
                $msg
              </div>
              <div class='modal-footer'>"
              ?>
              
                <button onclick="window.location.href = '<?php echo $bnt_ref ?>'" type='button' class='btn btn-success'><?php echo $bnt_name ?></button> 
                <?php
                echo" </div>
            </div>
          </div>
        </div>";
        echo "<script src='bootstrap/js/bootstrap.bundle.js'> </script>
        <script>var myModal = new bootstrap.Modal(document.getElementById('exampleModal'), {});
    document.onreadystatechange = function () {
      myModal.show();
    };</script>";
        }
        function msg_local_avisso($msg){
          echo "<div class=' alert alert-light rounded-pill border shadow d-flex align-items-center p-2 yas_font_medium' role='alert'>
          <i class=' yas_msg_avisso yas_icon_msg bi bi-exclamation-circle-fill'></i> &nbsp $msg
          </div>";
        }
      ?>
