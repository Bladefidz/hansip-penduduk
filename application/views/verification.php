<div class="page-container">
    <div class="main-content">
        <div class="page-title">
            <div class="title-env">
                <h1 class="title">Verifikasi Permintaan Akses</h1>
                <p class="description">Aplikasi Pihak ke-3</p>
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
                                    <div class='table-responsive'>
                                        <?php form_open("Admin/register"); ?>
                                        <div class='table-toolbar' style='margin-bottom: 15px;'>
                                            <div class='btn-group'>
                                                <button class='btn btn-success btn-xs disabled'><?php echo $numDataCpd; ?> calon peserta didik</button>
                                            </div>
                                            <div class='btn-group'>
                                                <a href=<?php echo HOME.'/pendaftaran/verifikasi' ?>><button class='btn btn-primary btn-xs'>Data Baru <i class='glyphicon glyphicon-plus icon-white'></i></button></a>
                                            </div>
                                            <div class='btn-group pull-right'>
                                                <button data-toggle='dropdown' class='btn btn-default dropdown-toggle btn-xs'>Simpan <span class='caret'></span></button>
                                                <ul class='dropdown-menu'>
                                                    <li><a href='#'>PDF</a></li>
                                                    <li><a href='#'>Excel</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <?php form_close(); ?>
                                    </div>
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
<script>
    function post(path, params, method) {
        method = method || "post"; // Set method to post by default if not specified.

        // The rest of this code assumes you are not using a library.
        // It can be made less wordy if you use one.
        var form = document.createElement("form");
        form.setAttribute("method", method);
        form.setAttribute("action", path);

        for(var key in params) {
            if(params.hasOwnProperty(key)) {
                var hiddenField = document.createElement("input");
                hiddenField.setAttribute("type", "hidden");
                hiddenField.setAttribute("name", key);
                hiddenField.setAttribute("value", params[key]);

                form.appendChild(hiddenField);
             }
        }

        document.body.appendChild(form);
        form.submit();
    }
</script>