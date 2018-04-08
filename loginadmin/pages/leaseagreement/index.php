<?php
include('../hf/header.php');
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">ทำสัญญาเช่าห้องพัก</h1>
                </div>
                <form action="pdf.php">
                <div class="form-group row">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                  <div class="col-lg-2">
                  <label>เลือกหมายเลขห้อง</label>
                  <select class="form-control" name="roomnum">
                  <?php
                  for ($i=0; $i < 26 ; $i++) { 
                  echo "<option>$room[$i]</option>";
                  }
                  ?>
                  </select>
                  </div>
                  <div class="col-xs-2">
                    <label for="ex2">เดือนที่เข้าอยู่</label>
                    <select class="form-control" name="month">
                  <?php
                  $lastmonth = date('m', strtotime('0 months'));
                  for ($i=0; $i < 12 ; $i++) { 
                    if($i==$lastmonth){
                        echo "<option selected>$thaimonth[$i]</option>";
                    }else{
                  echo "<option>$thaimonth[$i]</option>";
                    }
                  }
                  ?>
                  </select>
                  </div>
                  <div class="col-xs-1">
                    <label for="ex2">ปีที่เข้าอยู่</label>
                    <select class="form-control" name="year">
                  <?php
                  $year = date('Y')+543;
                  for ($i=0; $i < 5 ; $i++) {
                      $ye = $year+$i;
                  echo "<option>$ye</option>";
                  }
                  ?>
                  </select>
                  </div>
                  <div class="col-xs-1">
                    <label for="ex2">ราคาห้องพัก</label>
                    <input class="form-control" id="ex2" type="text" name="roomprice" value="2400" maxlength="4">
                  </div>
                  
                  
                  
                </div>
                <hr noshade="noshade"size="6" >
                <div class="form-group row">
                <div class="col-lg-12">
                    <h3>ชื่อ</h3>
                </div>
                <div class="col-xs-1">
                    <label for="ex2">คำนำหน้า</label>
                    <input class="form-control" id="ex2" type="text" name="t_name">
                  </div>

                  <div class="col-xs-3">
                    <label for="ex3">ชื่อ</label>
                    <input class="form-control" id="ex3" type="text" name="name">
                  </div>

                  <div class="col-xs-3">
                    <label for="ex3">นามสกุล</label>
                    <input class="form-control" id="ex3" type="text" name="l_name">
                  </div>
                </div>

                <hr noshade="noshade"size="6" >
                <div class="form-group row">
                <div class="col-lg-12">
                    <h3>ที่อยู่</h3>
                </div>
                <div class="col-xs-1">
                <label for="ex3">บ้านเลขที่</label>
                    <input class="form-control" id="ex3" type="text" name="a_1">
                </div>
                <div class="col-xs-1">
                <label for="ex3">หมู่ที่</label>
                    <input class="form-control" id="ex3" type="text" name="a_2">
                </div>
                <div class="col-xs-2">
                <label for="ex3">ถนน</label>
                    <input class="form-control" id="ex3" type="text" name="a_3">
                </div>
                <div class="col-xs-3">
                <label for="ex3">แขวง/ตำบล</label>
                    <input class="form-control" id="ex3" type="text" name="a_4">
                </div>
                <div class="col-xs-3">
                <label for="ex3">เขต/อำเภอ</label>
                    <input class="form-control" id="ex3" type="text" name="a_5">
                </div>
                <div class="col-xs-2">
                <label for="ex3">จังหวัด</label>
                    <input class="form-control" id="ex3" type="text" name="a_6">
                </div>
                </div>
                <div class="form-group row">
                <hr noshade="noshade"size="6" >
                <div class="col-xs-2">
                <input name="signup" type="submit" class="btn btn-success btn-block" id="signup" value="บันทึก"  />
                </div>
                </div>
            </form>
                <!-- /.col-lg-12 -->
            </div>
        </div>
            
            
<?php
include('../hf/footer.php');
?>