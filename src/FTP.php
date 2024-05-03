<?php
$ftp_server = "172.25.1.103"; //FTP server addressen
$ftp_user = "ftpuser"; // Spesifiser brukenavnet til FTP server
$ftp_pass = "IMKuben1337!"; // Spesifiserer password til FTP server
$file = "/srv/ftp/wolfenstein/Wolfenstein_ET.zip"; // Spesifiserer filen som skal lastes ned
// lager connection
$conn_id = ftp_connect($ftp_server);

// Logger inn i ftp serveren
if (@ftp_login($conn_id, $ftp_user, $ftp_pass)) {
    // går til riktig directory
    ftp_chdir($conn_id, dirname($file));

    // laster ned filen
    $temp = tmpfile();
    if (ftp_fget($conn_id, $temp, basename($file), FTP_BINARY, 0)) {
        // Sender filen til bruker
        header("Content-Disposition: attachment; filename=\"" . basename($file) . "\""); //filnav skal hit
        header("Content-Type: application/octet-stream");
        header("Content-Length: " . filesize($file));
        fpassthru($temp);
    } else {
        echo "Error: Could not download file";
    }

    // lukker ftp connection
    ftp_close($conn_id);
} else {
    echo "Error: Could not connect to FTP server";
}
?>