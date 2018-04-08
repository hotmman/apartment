<?php
include('../hf/header.php');
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Lease Agreement</h1>

                    <?php
                   $lastmonth = date('m', strtotime('-4 months'));
                   if($lastmonth==8){
                       echo "HEllopp";
                   }
                    // $newDate = date("m", strtotime("-2 month", $date));
                    echo $lastmonth;
                    ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            
            
<?php
include('../hf/footer.php');
?>