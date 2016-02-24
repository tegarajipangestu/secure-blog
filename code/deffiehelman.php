<?php 

    define ("MAX_INT",2147483647);
    include 'mainviewer.php';


    function generateNumber() {
        return random_int(0,MAX_INT);
    }

    function computePublic($number1, $power, $number2) {

        return pow($number1, $power) % $number2;
    }

    function sharedPrivate($number1, $power, $number2) {

        return pow($number1, $power) % $number2;
    }


    function deffiehelman() {
        var xhttp = new XMLHttpRequest();

        number1 = generateNumber();
        number2 = generateNumber();
        xhttp.open("GET", "deffiehelman.php?action=1&number1="+number1+"&number2="+number2, false);
        xhttp.send();

        sharedPublicServer = xhttp.responseText;

        randomPrivate = generateNumber();
        sharedPublicClient = computePublic(number1,number2);

        var xhttp = new XMLHttpRequest();
        xhttp.open("GET", "deffiehelman.php?action=2&sharedPublicClient"+sharedPublicClient, false);
        xhttp.send();

        sharedKey = sharedPrivate(sharedPublicServer,randomPrivate,number2);

        return sharedKey;
    }

    $action = $_GET['action'];
    if ($action==1) {
        $number1 = $_GET['number1'];
        $number2 = $_GET['number2'];
        $randomPrivate = generateNumber();

        sharedPublicServer =  computePublic($number1,$randomPrivate,$number2);
        //masukin ke database
        $con = phpsqlconnection();
        $sql = "INSERT INTO post (Post_Id, Creator_Id, Title, Date, Contents, Image) 
            VALUES (NULL".",".$creatorid.","."'".$Judul."'".","."'".$Tanggal."'".","."'".$Konten."'".","."'".$target_file."')";
        if (mysqli_multi_query($con, $sql)) {
            // echo "Huba";
            header("Location: index.php");
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }


        echo sharedPublicServer;
    }
    else if ($action==2) {
        $number1 = $_GET['number1'];
        sharedKey = sharedPrivate()                
    }

 ?>