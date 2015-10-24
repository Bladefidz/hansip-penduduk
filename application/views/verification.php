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
                                                <th>Email</th>
                                                <th>Instansi</th>
                                                <th>Alamat Instansi</th>
                                                <th>Provinsi</th>
                                                <th>Level</th>
                                                <th>Tanggal Daftar</th>
                                                <th>Level</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        <?php foreach ($app as $a): ?>
                                            <tr>
                                                <td name="app_name" value="<?php echo $a['app_name'] ?>"><?php echo $a['app_name'] ?></td>
                                                <td name="email" value="<?php echo $a['email'] ?>"><?php echo $a['email'] ?></td>
                                                <td><?php echo $a['instansi'] ?></td>
                                                <td><?php echo $a['alamat_instansi'] ?></td>
                                                <td name="region" value="<?php echo $a['region'] ?>"><?php echo $a['region'] ?></td>
                                                <td><?php echo $a['level'] ?></td>
                                                <td><?php echo $a['date_created'] ?></td>
                                                <?php echo form_open("Admin/verifikasi"); ?>
                                                <td>
                                                    <select name="level" class="form-control">
                                                        <option value="1">Low</option>
                                                        <option value="2">Medium</option>
                                                        <option value="3">High</option>
                                                    </select>
                                                </td>
                                                <td>
                                                    <input type="hidden" name="id" value="<?php echo $a['id'] ?>">
                                                    <input class="btn btn-success" type="submit" name="allow" value="Allow">
                                                </td>
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