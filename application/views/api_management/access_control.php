<body class="page-body">
    <div class="page-container">
        <!-- Sidebar -->
        <?php include_once('/../layout/sidebar.php'); ?>

        <div class="main-content" style="">
        <!-- Navbar -->
        <?php include_once('/../layout/navbar.php'); ?>

            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Pengendalian Akses</h3>
                    
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
                                <th>Student Name</th>
                                <th>Average Grade</th>
                                <th>Curriculum / Occupation</th>
                                <th>Actions</th>
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
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Ellen C. Jones</td>
                                <td>7.2</td>
                                <td>Education and development manager</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Carl D. Kaya</td>
                                <td>9.5</td>
                                <td>Express Merchant Service</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Jennifer J. Jefferson</td>
                                <td>10</td>
                                <td>Maxillofacial surgeon</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>April L. Baker <span class="label label-success">New Applicant</span></td>
                                <td>6.8</td>
                                <td>Set and exhibit designer</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Lillian J. Earl</td>
                                <td>7.6</td>
                                <td>Social and human service assistant</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Ellen C. Jones</td>
                                <td>7.2</td>
                                <td>Education and development manager</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Randy S. Smith</td>
                                <td>8.7</td>
                                <td>Social and human service</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Jennifer J. Jefferson</td>
                                <td>10</td>
                                <td>Maxillofacial surgeon</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Carl D. Kaya</td>
                                <td>9.5</td>
                                <td>Express Merchant Service</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Lillian J. Earl</td>
                                <td>7.6</td>
                                <td>Social and human service assistant</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>April L. Baker <span class="label label-success">New Applicant</span></td>
                                <td>6.8</td>
                                <td>Set and exhibit designer</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                        
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Randy S. Smith</td>
                                <td>8.7</td>
                                <td>Social and human service</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Ellen C. Jones</td>
                                <td>7.2</td>
                                <td>Education and development manager</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Carl D. Kaya</td>
                                <td>9.5</td>
                                <td>Express Merchant Service</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Jennifer J. Jefferson</td>
                                <td>10</td>
                                <td>Maxillofacial surgeon</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>April L. Baker <span class="label label-success">New Applicant</span></td>
                                <td>6.8</td>
                                <td>Set and exhibit designer</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Lillian J. Earl</td>
                                <td>7.6</td>
                                <td>Social and human service assistant</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Ellen C. Jones</td>
                                <td>7.2</td>
                                <td>Education and development manager</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Randy S. Smith</td>
                                <td>8.7</td>
                                <td>Social and human service</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Jennifer J. Jefferson</td>
                                <td>10</td>
                                <td>Maxillofacial surgeon</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Carl D. Kaya</td>
                                <td>9.5</td>
                                <td>Express Merchant Service</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Lillian J. Earl</td>
                                <td>7.6</td>
                                <td>Social and human service assistant</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>April L. Baker <span class="label label-success">New Applicant</span></td>
                                <td>6.8</td>
                                <td>Set and exhibit designer</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                        
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Randy S. Smith</td>
                                <td>8.7</td>
                                <td>Social and human service</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Ellen C. Jones</td>
                                <td>7.2</td>
                                <td>Education and development manager</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Carl D. Kaya</td>
                                <td>9.5</td>
                                <td>Express Merchant Service</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Jennifer J. Jefferson</td>
                                <td>10</td>
                                <td>Maxillofacial surgeon</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>April L. Baker <span class="label label-success">New Applicant</span></td>
                                <td>6.8</td>
                                <td>Set and exhibit designer</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Lillian J. Earl</td>
                                <td>7.6</td>
                                <td>Social and human service assistant</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Ellen C. Jones</td>
                                <td>7.2</td>
                                <td>Education and development manager</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Randy S. Smith</td>
                                <td>8.7</td>
                                <td>Social and human service</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Jennifer J. Jefferson</td>
                                <td>10</td>
                                <td>Maxillofacial surgeon</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Carl D. Kaya</td>
                                <td>9.5</td>
                                <td>Express Merchant Service</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Lillian J. Earl</td>
                                <td>7.6</td>
                                <td>Social and human service assistant</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>April L. Baker <span class="label label-success">New Applicant</span></td>
                                <td>6.8</td>
                                <td>Set and exhibit designer</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                        
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Randy S. Smith</td>
                                <td>8.7</td>
                                <td>Social and human service</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Ellen C. Jones</td>
                                <td>7.2</td>
                                <td>Education and development manager</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Carl D. Kaya</td>
                                <td>9.5</td>
                                <td>Express Merchant Service</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Jennifer J. Jefferson</td>
                                <td>10</td>
                                <td>Maxillofacial surgeon</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>April L. Baker <span class="label label-success">New Applicant</span></td>
                                <td>6.8</td>
                                <td>Set and exhibit designer</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Lillian J. Earl</td>
                                <td>7.6</td>
                                <td>Social and human service assistant</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Ellen C. Jones</td>
                                <td>7.2</td>
                                <td>Education and development manager</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Randy S. Smith</td>
                                <td>8.7</td>
                                <td>Social and human service</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Jennifer J. Jefferson</td>
                                <td>10</td>
                                <td>Maxillofacial surgeon</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Carl D. Kaya</td>
                                <td>9.5</td>
                                <td>Express Merchant Service</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Lillian J. Earl</td>
                                <td>7.6</td>
                                <td>Social and human service assistant</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>April L. Baker <span class="label label-success">New Applicant</span></td>
                                <td>6.8</td>
                                <td>Set and exhibit designer</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                        
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Randy S. Smith</td>
                                <td>8.7</td>
                                <td>Social and human service</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Ellen C. Jones</td>
                                <td>7.2</td>
                                <td>Education and development manager</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Carl D. Kaya</td>
                                <td>9.5</td>
                                <td>Express Merchant Service</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Jennifer J. Jefferson</td>
                                <td>10</td>
                                <td>Maxillofacial surgeon</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>April L. Baker <span class="label label-success">New Applicant</span></td>
                                <td>6.8</td>
                                <td>Set and exhibit designer</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Lillian J. Earl</td>
                                <td>7.6</td>
                                <td>Social and human service assistant</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Ellen C. Jones</td>
                                <td>7.2</td>
                                <td>Education and development manager</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Randy S. Smith</td>
                                <td>8.7</td>
                                <td>Social and human service</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Jennifer J. Jefferson</td>
                                <td>10</td>
                                <td>Maxillofacial surgeon</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Carl D. Kaya</td>
                                <td>9.5</td>
                                <td>Express Merchant Service</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>Lillian J. Earl</td>
                                <td>7.6</td>
                                <td>Social and human service assistant</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                            <tr>
                                <td>
                                    <input type="checkbox" class="cbr">
                                </td>
                                <td>April L. Baker <span class="label label-success">New Applicant</span></td>
                                <td>6.8</td>
                                <td>Set and exhibit designer</td>
                                <td>
                                    <a href="#" class="btn btn-secondary btn-sm btn-icon icon-left">
                                        Edit
                                    </a>
                                    
                                    <a href="#" class="btn btn-danger btn-sm btn-icon icon-left">
                                        Delete
                                    </a>
                                    
                                    <a href="#" class="btn btn-info btn-sm btn-icon icon-left">
                                        Profile
                                    </a>
                                </td>
                            </tr>
                            
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</div>