<?php

class QrCode {
    
    private $apiUrl = 'http://chart.apis.google.com/chart';
    
    private $data;

    
    public function URL($url = null) {
        $this->data = preg_match("#^https?\:\/\/#", $url) ? $url : "http://{$url}";
    }

    
    public function TEXT($text) {
        $this->data = $text;
    }

    
    public function EMAIL($email = null, $subject = null, $message = null) {
        $this->data = "MATMSG:TO:{$email};SUB:{$subject};BODY:{$message};;";
    }

    
    public function PHONE($phone) {
        $this->data = "TEL:{$phone}";
    }

   
    public function SMS($phone = null, $msg = null) {
        $this->data = "SMSTO:{$phone}:{$msg}";
    }

  
    public function CONTACT($name = null, $address = null, $phone = null, $email = null) {
        $this->data = "MECARD:N:{$name};ADR:{$address};TEL:{$phone};EMAIL:{$email};;";
    }


    
    public function QRCODE($size = 400, $filename = null) {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->apiUrl);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, "chs={$size}x{$size}&cht=qr&chl=" . urlencode($this->data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        $img = curl_exec($ch);
        curl_close($ch);
        if ($img) {
            if ($filename) {
                if (!preg_match("#\.png$#i", $filename)) {
                    $filename .= ".png";
                }
                return file_put_contents($filename, $img);
            } else {
            }
        }
        return false;
    }



    public function QRCODEPDF($path)
{
    include("pdf/fpdf.php");
$pdf=new FPDF();
$pdf->AddPage();
$pdf->SetFont('Times','B',25);
$pdf->SetTextColor(205,35,205);
$pdf->Cell(0,0,"CERTIFICATO DI VACCINAZIONE ",0,0,'C');
$imgpath="./images/primula.png";
$pdf->Cell(0,0,$pdf->Image("$imgpath",90,25,25) ,0,1,'C');
$pdf->SetFont('Times','',15);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0,100,"Ecco a te il tuo certificato di vaccinazione COVID. COMPLIMENTI",0,1,'C');
$pdf->Cell(0,0,$pdf->Image("$path",55,100,100),0,1,'C');
    $parti=explode('/',$path);
    $pdf01=$parti[2];
    $parti2=explode('.',$pdf01);
    $pdfPath=$parti2[0];
    $filename="certificati/".$pdfPath.".pdf";
$pdf->Output($filename,'F');
unlink($path);
return $filename;
}

}
?>