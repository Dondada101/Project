<?php
require __DIR__ .'/vendor/autoload.php';
use Dompdf\Dompdf;
use Dompdf\Options;
$options= new Options();
$options->setChroot(__DIR__);
$dompdf=new Dompdf($options);
$dompdf->setPaper('A4','landscape');
$htmlContent = $_POST['htmlContent'];
$dompdf->loadHtml('<link rel="stylesheet" type="text/css" href="styles/admin.css">'.$htmlContent);
$dompdf->render();
$dompdf->addInfo('Title','Appointments');
$dompdf->stream('appointments.pdf',['Attachment'=>0]);