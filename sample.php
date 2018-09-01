<?php
use Dompdf\Dompdf;

require 'vendor/autoload.php';	

/* You can use data from database, array , etc*/

$table =''; 
$table.='<div style="margin: 22px;width: 98%;"><h4 style="width: 90%;text-align: center;text-transform: uppercase;font-size: 16px;">Sample PDF</h4><br />';
	
$table.= '<table style="width: 90%;"><tr><td>
<table style="border-collapse: collapse;line-height: 30px;margin-bottom: 15px;">
<tr><td>Current Time:</td><td>'.date('H:i:s').'</td></tr>
<tr><td>Current Date:</td><td>'.date('d M,Y ').'</td></tr>
</table></td>
<td></td></tr></table>';

$table.= '<table border="1" style="border-collapse: collapse;line-height: 30px;margin-bottom: 15px;width: 85%;">
<tr><td>Sample Title </td><td>Sample Head</td></tr>
<tr><td>Description  </td><td>This a test file</td></tr>
</table>'; 

$filename = date('YmdHis').'.pdf';
$dompfd = new Dompdf();
$dompfd->loadHtml($table);
$dompfd->set_paper('letter', 'landscape');
$dompfd->render();

//Output for Browser
$dompfd->stream($filename, array("Attachment" => false));	

//Output will save in folder
$pdf = $dompfd->output();
file_put_contents("saved_files/".$filename, $pdf);

	
