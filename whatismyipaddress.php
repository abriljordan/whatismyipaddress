<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>What Is My IP?</title>
        <style type="text/css">
            body {
                margin: 0;
                padding: 0;
                background: #fff;
            }
            #main-content {
                margin: 30px;
                text-align: center;
                color: #3D2339;
            }
            #main-content h1 {
                font: 40px "Helvetica Neue",Helvetica,Arial;
            }
            #main-content p {
                font: 24px "Helvetica Neue",Helvetica,Arial;
            }
            #main-content p strong{
                font-size: 70px;
                color: #000000;
            }
        </style>
</head>

<body>
    <?php
    $hostname = getHostByName(trim(getHostName()));
    ?>
    <br />
        <?php
        /*
            To get the external IP address of the local machine would be to query the routing table. We can get the system 
            to do it for us by binding a UDP socket to a public address, and getting its address. 

            socket_connect will not cause any network traffic because it's an UDP socket.
        */ ?>

    <?php
    $sock = socket_create(AF_INET, SOCK_DGRAM, SOL_UDP);
    socket_connect($sock, "8.8.8.8", 53);
    socket_getsockname($sock, $name); // $name passed by reference
    // This is the local machine's external IP address
    $localAddr = $name;
    ?>

    <div id="main-content">
        <h1>What Is My IP?</h1>

        <p>Local hostname: <br />
            <strong><?php echo $hostname; ?></strong>
        </p>
        <p>External IP address: <br />
            <strong><?php echo $localAddr; ?></strong>
        </p>

    </div>
</body>

</html>