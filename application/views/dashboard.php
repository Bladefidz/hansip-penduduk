<body class="page-body">
    <div class="page-container">
        <!-- Sidebar -->
        <?php include_once('layout/sidebar.php'); ?>

        <div class="main-content" style="">
        
        <!-- Navbar -->
        <?php include_once('layout/navbar.php'); ?>

            <div class="row">
                <div class="col-sm-3">
                    <div class="xe-widget xe-counter" data-count=".num" data-from="0" data-to="10000000" data-duration="2" data-easing="true">
                        <div class="xe-icon">
                            <i class="fa-database"></i>
                        </div>
                        <div class="xe-label">
                            <strong class="num">100000000000000</strong>
                            <span>Penduduk</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="xe-widget xe-counter xe-counter-purple" data-count=".num" data-from="0" data-to="10000000" data-duration="2" data-easing="true">
                        <div class="xe-icon">
                            <i class="fa-user"></i>
                        </div>
                        <div class="xe-label">
                            <strong class="num">100000000000000</strong>
                            <span>User</span>
                        </div>
                    </div>
                </div>

                <div class="col-sm-3">
                    <div class="xe-widget xe-counter xe-counter-info" data-count=".num" data-from="0" data-to="10000000" data-duration="2" data-easing="true">
                        <div class="xe-icon">
                            <i class="fa-exchange"></i>
                        </div>
                        <div class="xe-label">
                            <strong class="num">100000000000000</strong>
                            <span>Aktivitas Hari Ini</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">Jumlah Penduduk Berdasarkan Jenis Kelamin</h3>
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
                                var xenonPalette = ['#68b828','#7c38bc','#0e62c7','#fcd036','#4fcdfc','#00b19d','#ff6264','#f7aa47'];

                                jQuery(document).ready(function($)
                                {
                                    var dataSource = [
                                        {sex: "Laki-laki", val: 4119626293},
                                        {sex: "Perempuan", val: 1012956064},
                                    ], timer;
                                    
                                    $("#bar-10").dxPieChart({
                                        dataSource: dataSource,
                                        title: "Populasi Berdasarkan Jenis Kelamin",
                                        tooltip: {
                                            enabled: false,
                                            format:"decimal",
                                            customizeText: function() { 
                                                return this.argumentText + "<br/>" + this.valueText;
                                            }
                                        },
                                        size: {
                                            height: 420
                                        },
                                        pointClick: function(point) {
                                            point.showTooltip();
                                            clearTimeout(timer);
                                            timer = setTimeout(function() { point.hideTooltip(); }, 2000);
                                            $("select option:contains(" + point.argument + ")").prop("selected", true);
                                        },
                                        legend: {
                                            visible: false
                                        },  
                                        series: [{
                                            type: "doughnut",
                                            argumentField: "sex"
                                        }],
                                        palette: xenonPalette
                                    });
                                    
                                });
                            </script>
                            <div id="bar-10" style="height: 450px; width: 100%;"></div>
                        </div>
                    </div>
                        
                </div>
            </div>
        </div>
    </div>
