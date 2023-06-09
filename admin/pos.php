<?php
require_once('../assets/constants/config.php');

include('header.php');


?>
    <!-- BEGIN: Content-->
<div class="app-content content">
<a href="#sale_report"  data-toggle="modal" data-target=""><img  src="../assets/pos.png"></a>
    </div>
    <div class="modal fade bs-example-modal-lg" id="sale_report" tabindex="-1" role="dialog" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span>
            </button>
            <h4 class="modal-title" id="myModalLabel"></h4>
          </div>
          <div class="modal-body">
            <h4><?php echo $result['title']; ?></h4>
            <p><?php echo $result['description']; ?></p>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>

        </div>
      </div>
    </div>
</div>
    <!-- END: Content-->

    <?php include 'footer.php'; ?>