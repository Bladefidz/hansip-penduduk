<div class="page-container">
    <!-- Sidebar -->
    <?php include_once('layout/sidebar.php'); ?>

    <div class="main-content">
        <div class="page-title">
            <div class="title-env">
                <h1 class="title">Log Data</h1>
                <p class="description">Log Data Akses Aplikasi Client-Site</p>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    <h3 class="panel-title">OCFA System</h3>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="panel-body">
                                <div class="form-horizontal" role="form">
                                    <script type="text/javascript">
                                        jQuery(document).ready(function($)
                                        {
                                            $("#example-1").dataTable({
                                                aLengthMenu: [
                                                    [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
                                                ]
                                            });
                                        });
                                    </script>
                                    <table id="example-1" class="table table-striped table-bordered" cellspacing="0" width="100%">
                                        <thead>
                                            <tr>
                                                <th>Nama Aplikasi</th>
                                                <th>Record</th>
                                                <th>Method</th>
                                                <th>date</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($logs as $log): ?>
                                            <tr>
                                                <td><?php echo $log['app_name']; ?></td>
                                                <td><?php echo $log['field']; ?></td>
                                                <td><?php echo $log['method']; ?></td>
                                                <td><?php echo $log['date']; ?></td>
                                                <?php echo form_open("Admin/verifikasi"); ?>
                                                <?php echo form_close(); ?>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        <footer class="main-footer sticky footer-type-1">
            <div class="footer-inner">
                <!-- Add your copyright text here -->
                <div class="footer-text">
                    &copy; 2015 
                    <strong>OCFA System</strong> 
                </div>
                
                
                <!-- Go to Top Link, just add rel="go-top" to any link to add this functionality -->
                <div class="go-up">
                
                    <a href="#" rel="go-top">
                        <i class="fa-angle-up"></i>
                    </a>
                    
                </div>
                
            </div>
            
        </footer>
    </div>
</div>