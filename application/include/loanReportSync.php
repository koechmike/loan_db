<?php
require_once('../../EJ/AutoLoad.php');
?>
<body>
    <div class="cols-sample-area">
        <?php
        $reportviewer = new EJ\ReportViewer('groupingaggregate_reportViewer');		
        echo "test";
        echo $reportviewer->reportServiceUrl("http://js.syncfusion.com/ejservices/api/ReportViewer" )->processingMode("Remote")->reportPath("../reports/loans.rdl")->render();
        ?>
    </div>
    <style>
         .cols-sample-area
        {
            width: 100%;
            margin: 0 auto;
            float: none;
        }
		#groupingaggregate_reportViewer{
			height: 550px;
			display: block;
		}
    </style>
</body>