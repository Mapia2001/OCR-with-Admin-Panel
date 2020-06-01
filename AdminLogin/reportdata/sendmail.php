<?php
    session_start();
    $db = mysqli_connect('localhost', 'root', '', 'multi_login');
    require('./fpdf/fpdf.php');
    $pdf=new FPDF();
    $pdf->AddPage();
    $pdf->SetFont('Arial','B',10);
    $pdf->Ln();
    $pdf->Ln();
    $pdf->SetFont('times','B',10);
    $pdf->Cell(25,7,"Company");
    $pdf->Cell(20,7,"Reg no");
    $pdf->Cell(20,7,"Trailer");
    $pdf->Cell(25,7,"Container no");
    $pdf->Cell(20,7,"Iso");
    $pdf->Cell(20,7,"Seal no");
    $pdf->Cell(20,7,"load");
    $pdf->Cell(30,7,"Date time");
    $pdf->Ln();
    $pdf->Cell(450,7,"----------------------------------------------------------------------------------------------------------------------------------------------------------------------");
    $pdf->Ln();
    $sql = "SELECT * FROM scandata WHERE userid={$_SESSION['user']['id']}";
    $result = mysqli_query($db, $sql);
	if ($result){
	    if ( mysqli_num_rows($result) > 0 ){
	        while( $rows = mysqli_fetch_array($result) ){
	            $company = $rows[1];
                $Regno = $rows[2];
                $Trailer = $rows[3];
                $Containerno = $rows[4];
                $Iso = $rows[5];
                $sealno = $rows[6];
                $loadstatus = $rows[7];
                $Date_time = $rows[8] . "  " . $rows[9];
                $pdf->Cell(25,7,$company);
                $pdf->Cell(20,7,$Regno);
                $pdf->Cell(20,7,$Trailer);
                $pdf->Cell(25,7,$Containerno);
                $pdf->Cell(20,7,$Iso);
                $pdf->Cell(20,7,$sealno);
                $pdf->Cell(20,7,$loadstatus);
                $pdf->Cell(30,7,$Date_time);
                $pdf->Ln();
	        }
	    }else {
	        echo json_encode(array('info' => false,'message' => 'There is no scan data.'));
	        exit();
	    }
	}else {
	    echo json_encode(array('info' => false, 'message' => 'Failed database connect error'));
	    exit();
	}
    $pdf->Output("sendpdf/scandata.pdf","F");
    $filename = 'scandata.pdf';
    $path = './sendpdf';
    $file = $path . "/" . $filename;

    $mailto = $_POST['sendaddress'];
    $subject = 'Check pdf file.';
    $message = 'Here is testii.';

    $content = file_get_contents($file);
    $content = chunk_split(base64_encode($content));

    // a random hash will be necessary to send mixed content
    $separator = md5(time());

    // carriage return type (RFC)
    $eol = "\r\n";

    // main header (multipart mandatory)
    $headers = "From: hermesboss2020@gmail.com" . $eol;
    $headers .= "MIME-Version: 1.0" . $eol;
    $headers .= "Content-Type: multipart/mixed; boundary=\"" . $separator . "\"" . $eol;
    $headers .= "Content-Transfer-Encoding: 7bit" . $eol;
    $headers .= "This is a MIME encoded message." . $eol;

    // message
    $body = "--" . $separator . $eol;
    $body .= "Content-Type: text/plain; charset=\"iso-8859-1\"" . $eol;
    $body .= "Content-Transfer-Encoding: 8bit" . $eol;
    $body .= $message . $eol;

    // attachment
    $body .= "--" . $separator . $eol;
    $body .= "Content-Type: application/octet-stream; name=\"" . $filename . "\"" . $eol;
    $body .= "Content-Transfer-Encoding: base64" . $eol;
    $body .= "Content-Disposition: attachment" . $eol;
    $body .= $content . $eol;
    $body .= "--" . $separator . "--";

    //SEND Mail
    if (mail($mailto, $subject, $body, $headers)) {
        echo json_encode(array('info' => true));
    } else {
        echo json_encode(array('info' => false,'message' => 'send mail failed'));
        print_r( error_get_last() );
    }
?>