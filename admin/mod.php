<?php 
include "config.php";
?>
<!doctype html>
<html>
    <head>
        <title>Dynamically load content in Bootstrap Modal with AJAX</title>
        <link href='bootstrap/css/bootstrap.min.css' rel='stylesheet' type='text/css'>
        <!-- Script -->
        <script src='jquery-3.1.1.min.js' type='text/javascript'></script>
        <script src='bootstrap/js/bootstrap.min.js' type='text/javascript'></script>
    </head>
    <body >
        <div class="card">
  <div class="card-header">
    Quote
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer posuere erat a ante.</p>
      <footer class="blockquote-footer">Someone famous in <cite title="Source Title">Source Title</cite></footer>
    </blockquote>
  </div>
</div>
        <div class="container" >
            <!-- Modal -->
            <div class="modal fade" id="empModal" role="dialog">
                <div class="modal-dialog">
                
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal">&times;</button>
                          <h4 class="modal-title">User Info</h4>
                        </div>
                        <div class="modal-body">
                          
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                  
                </div>
            </div>

            <br/>
            <div class="table-responsive">
                                            <table class="table table-striped table-bordered dom-jQuery-events">
                                                 <thead>
                                                 <tr>
                    <th>Report Id</th>
                    <th>Title</th>
                    <th>Prepared By</th>
                    <th>Telephone</th>
                    <th>Email</th>
                    <th>Sent Date</th>
                    <th>Document</th>
                    <th>&nbsp;</th>
                </tr>
                                                        
                                                       
                                                   
                                                  
                                                </thead>

                
                <?php 
                $query = "SELECT `report_id`, `Title`, `prepare_by`, `contact`, `email`, `sent_date`, `content`, `document` FROM `report`";
                $result = mysqli_query($con,$query);
                while($row = mysqli_fetch_array($result)){
                    $id = $row['report_id'];
?>
<tr><th><?php echo $row['report_id'];?></th>
        <th><?php echo $row['Title'];?></th>
        <th><?php echo $row['prepare_by'];?></th>
        <th><?php echo $row['contact'];?></th>
        <th><?php echo $row['email'];?></th>
        <th><?php echo $row['sent_date'];?></th>
        <th><?php echo $row['document'];?>
        <?php echo "<td><button data-id='".$id."' class='userinfo btn btn-success'>Info</button></td>"; ?>
</tr>
                    <?php
                }
                ?>
            </table>
        </div>
            <script type='text/javascript'>
            $(document).ready(function(){

                $('.userinfo').click(function(){
                   
                    var userid = $(this).data('id');

                    // AJAX request
                    $.ajax({
                        url: 'ajaxfile.php',
                        type: 'post',
                        data: {userid: userid},
                        success: function(response){ 
                            // Add response in Modal body
                            $('.modal-body').html(response); 

                            // Display Modal
                            $('#empModal').modal('show'); 
                        }
                    });
                });
            });
            </script>
        </div>
    </body>
</html>

        