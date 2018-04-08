<?php
include('../hf/header.php');
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Make Receipt</h1>
                </div>

                <form action="#">
                <input type="hidden" name="id" value="<?php echo $id; ?>">

                <div class='form-group row'>
                <div class='col-lg-2'>
                    
                    </div>
                    <div class='col-lg-4'>
                    <h2 class='text-center animated fadeInDown'>เดือน : <?php echo $thaimonth[date('m')-1]; ?></h2>
                    </div>
                    
                    </div>

                <?php 
                include('createtable.php');
                include("../../../data/config.php");
                include('../hf/array.php');
                $datenow = date('my');
                for ($i=0; $i < 26; $i++) { 
                  $sql = "SELECT * FROM a_$datenow WHERE ID=$i+1";
                  $result = $conn->query($sql);
                  
                  if ($result->num_rows > 0) {
                      $row = $result->fetch_assoc() ;
                      $roomrate = $row['roomrate'];

                      $net = $row['net'];
                      $waterunit = $row['waterunit'];
                      $electricityunit = $row['electricityunit'];
                  }
                  
                    echo"
                    <div class='form-group row animated fadeInDown'>
                    <div class='col-lg-2'>
                    <h1 class='text-center'>".$room[$i]."</h1>
                    </div>
                      <div class='col-lg-1'>
                      <label>ค่าห้องพัก</label>
                      <input class='form-control' id='ex2' type='text' name='p_room_".$room[$i]."' value='$roomrate' required>
                      </div>
                      <div class='col-xs-1'>
                        <label for='ex2'>Internet</label>
                        <input class='form-control' id='ex2' type='text' name='net_room_".$room[$i]."' value='$net' required>
                      </div>
                      <div class='col-xs-1'>
                        <label for='ex2'>ยูนิตน้ำ</label>
                        <input class='form-control' id='ex2' type='text' name='w_room_".$room[$i]."' value='$waterunit' required>
                      </div>
                      <div class='col-xs-1'>
                        <label for='ex2'>ยูนิตไฟ</label>
                        <input class='form-control' id='ex2' type='text' name='e_room_".$room[$i]."' value='$electricityunit' required>
                    </div>
                    </div>";
                    if($i ==13){
                        echo" <hr noshade='noshade'size='6' >";
                    }
                }
                ?>
                <!-- <div class="form-group row">
                <div class="col-lg-2">
                <h1 class="text-center">101</h1>
                </div>
                  <div class="col-lg-1">
                  <label>ค่าห้องพัก</label>
                  <input class="form-control" id="ex2" type="text" name="t_name">
                  </div>
                  <div class="col-xs-1">
                    <label for="ex2">Internet</label>
                    <input class="form-control" id="ex2" type="text" name="t_name">
                  </div>
                  <div class="col-xs-1">
                    <label for="ex2">ยูนิตน้ำ</label>
                    <input class="form-control" id="ex2" type="text" name="t_name">
                  </div>
                  <div class="col-xs-1">
                    <label for="ex2">ยูนิตไฟ</label>
                    <input class="form-control" id="ex2" type="text" name="t_name">
                </div>
                </div> -->

                <div class="form-group row">
                <hr noshade="noshade"size="6" >
                <div class='col-xs-2'>
                       
                      </div>
                <div class="col-xs-2">
                <input name="signup" type="submit" class="btn btn-success btn-block" id="signup" value="บันทึก" formaction="save.php" />
                </div>
                <form action="#">
                <div class="col-xs-2">
                <input name="signup" type="submit" class="btn btn-warning btn-block" id="signup" value="พิมพ์ใบเสร็จ" formaction="print.php">
                </div>
                </from>
                </div>

                <hr noshade="noshade"size="6" >
                
                </div>
                
            </form>
            </div>
             
            
            
<?php
include('../hf/footer.php');
?>