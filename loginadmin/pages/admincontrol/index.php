<?php
include('../hf/header.php');
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Admin Control!!</h1>
                </div>
                <!-- Addmember -->
                <form action="#">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class='form-group row'>
                    <div class='col-lg-1'>
                    <h3 class='text-center'>Add</h3>
                    </div>
                  <div class='col-lg-2'>
                  <label>Username</label>
                  <input class='form-control' id='ex2' type='text' name='txt_user_add' >
                  </div>
                  <div class='col-xs-2'>
                  <label>Password</label>
                  <input class='form-control' id='ex2' type='password' name='txt_pass_add' >
                  </div>
                  <div class='col-lg-1'>
                  <label>Titlename</label>
                  <select class="form-control" name="txt_title_add">
                  <option selected>Mr</option>
                  <option>Mrs</option>
                  <option>Miss</option>
                  </select>
                  </div>  
                  <div class='col-lg-2'>
                  <label>Firstname</label>
                  <input class='form-control' id='ex2' type='text' name='txt_name_add' >
                  </div>  
                  <div class='col-lg-2'>
                  <label>Surname</label>
                  <input class='form-control' id='ex2' type='text' name='txt_surname_add' >
                  </div>  
                  <div class='col-lg-1'>
                  <label>Status</label>
                  <select class="form-control" name="status_add">
                  <option selected>0</option>
                  <option>1</option>
                  <option>2</option>
                  </select>
                  </div>    

                  <!-- <hr noshade="noshade"size="6" > -->
                    <div class="col-xs-1">
                    <label>Add</label>
                    <input name="signup" type="submit" class="btn btn-success" id="signup" value="Add" formaction="control.php" />
                    </div>
                </div>
                </form>
                <!-- END ADDMEMBER -->
                <hr noshade="noshade"size="6" >
                <!-- Editmember -->
                <form action="#">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class='form-group row'>
                    <div class='col-lg-1'>
                    <h3 class='text-center'>Edit</h3>
                    </div>
                  <div class='col-lg-1'>
                  <label>ID</label>
                  <input class='form-control' id='ex2' type='text' name='txt_id_edit' >
                  </div> 
                  <div class='col-lg-1'>
                  <label>Status</label>
                  <select class="form-control" name="edit_status">
                  <option selected>0</option>
                  <option>1</option>
                  <option>2</option>
                  </select>
                  </div>    
                    <div class="col-xs-1">
                    <label>Edit</label>
                    <input name="signup" type="submit" class="btn btn-warning" id="signup" value="Edit"  formaction="control.php"/>
                    </div>
                    <div class="col-xs-2">
                    <label>RePassword</label>
                    <input name="signup" type="submit" class="btn btn-warning" id="signup" value="RePassword" formaction="control.php" />
                    </div>
                </div>
                </form>
                <!-- END EDITMEMBER -->
                <hr noshade="noshade"size="6" >

                <!-- Delmember -->
                <form action="#">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <div class='form-group row'>
                    <div class='col-lg-1'>
                    <h3 class='text-center'>Del</h3>
                    </div>
                  <div class='col-lg-2'>
                  <label>ID</label>
                  <input class='form-control' id='ex2' type='text' name='txt_id_del' >
                  </div>  
                  <!-- <hr noshade="noshade"size="6" > -->
                    <div class="col-xs-1">
                    <label>Delete</label> 
                    <input name="signup" type="submit" class="btn btn-danger" id="signup" value="Del"  formaction="control.php"/>
                    </div>
                </div>
                </form>
                <!-- END DEL -->


                <hr noshade="noshade"size="6" >
                <!--SHOWTABLE -->
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Member
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <table width="100%" class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                    <th>#</th>
                                    <th>NumberRoom</th>
                                    <th>Title Name</th>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Username</th>
                                    <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                include("../../../data/config.php");
                                $sql = "SELECT * FROM `user` ORDER BY `user`.`STATUS` DESC";
                                $result = $conn->query($sql);
                                
                                if ($result->num_rows > 0) {
                                    // output data of each row
                                    while($row = $result->fetch_assoc()) {
                                    echo"<tr>
                                    <td>".$row['ID']."</td>
                                    <td>".$row['ROOMNUM']."</td>
                                    <td>".$row['NAME_TITLE']."</td>
                                    <td>".$row['NAME']."</td>
                                    <td>".$row['LASTNAME']."</td>
                                    <td>".$row['USERNAME']."</td>
                                    <td>".$row['STATUS']."</td>
                                    </tr>";
                                    }
                                } else {
                                    echo "0 results";
                                }
                                $conn->close();
                                ?>
                                </tbody>
                            </table>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- SHOWTABLE -->


            </div>
             
            
            
<?php
include('../hf/footer.php');
?>