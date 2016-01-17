<body class="page-body">
    <div class="page-container">
        <!-- Sidebar -->
        <?php include_once('/../layout/sidebar.php'); ?>

        <div class="main-content" style="">
        <!-- Navbar -->
        <?php include_once('/../layout/navbar.php'); ?>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Data Kependudukan</h3>

                    
                    
                    <div class="panel-options">
                        <a href="#" data-toggle="panel">
                            <span class="collapse-icon">&ndash;</span>
                            <span class="expand-icon">+</span>
                        </a>
                        <a href="#" data-toggle="remove">
                            &times;
                        </a>
                    </div>
                </div>
                <div class="panel-body">
                    <script type="text/javascript">
                    jQuery(document).ready(function($)
                    {
                        $("#user_data").dataTable({
                            aLengthMenu: [
                                [10, 25, 50, 100, -1], [10, 25, 50, 100, "All"]
                            ],
                        });
                        
                        // Replace checkboxes when they appear
                        var $state = $("#user_data thead input[type='checkbox']");
                        
                        $("#user_data").on('draw.dt', function()
                        {
                            cbr_replace();
                            
                            $state.trigger('change');
                        });
                        
                        // Script to select all checkboxes
                        $state.on('change', function(ev)
                        {
                            var $chcks = $("#user_data tbody input[type='checkbox']");
                            
                            if($state.is(':checked'))
                            {
                                $chcks.prop('checked', true).trigger('change');
                            }
                            else
                            {
                                $chcks.prop('checked', false).trigger('change');
                            }
                        });
                    });
                    </script>
                    
                    <table class="table table-bordered table-striped" id="user_data">
                        <thead>
                            <tr>
                                <th class="no-sorting">
                                    <input type="checkbox" class="cbr">
                                </th>
                                <th>NIK</th>
                                <th>nama</th>
                                <th>Alamat</th>
                                <th>TTL</th>
                                <th>JK</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        
                        <tbody class="middle-align">
                        
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Randy S. Smith</td>
                                <td>8.7</td>
                                <td>Social and human service</td>
                                <td>Social and human service</td>
                                <td>Social and human service</td>
                                <td>Social and human service</td>
                            </tr>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>