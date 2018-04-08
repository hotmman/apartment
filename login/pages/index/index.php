<?php
include('../hf/header.php');
?>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header "><div class="animated fadeInDown">Dashboard</div></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary animated fadeIn">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-edit fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Make Receipt!</div>
                                    
                                </div>
                            </div>
                        </div>
                        <a href="../receipt/index.php?id=<?php echo $id; ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Click Now</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green animated fadeIn">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-reply fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Last Receipt!</div>
                                    
                                </div>
                            </div>
                        </div>
                        <a href="../lastreceipt/index.php?id=<?php echo $id; ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Click Now</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6"> 
                    <div class="panel panel-yellow animated fadeIn">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-pencil fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">Lease Agreement!</div>
                                    
                                </div>
                            </div>
                        </div>
                        <a href="../leaseagreement/index.php?id=<?php echo $id; ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Click Now</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red animated fadeIn">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-gears fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">List Statistic</div>
                                </div>
                            </div>
                        </div>
                        <a href="../stat/index.php?id=<?php echo $id; ?>">
                            <div class="panel-footer">
                                <span class="pull-left">Click Now</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /.row -->
            
<?php
include('../hf/footer.php');
?>