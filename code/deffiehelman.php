<?php 
    session_start();
    define ("MAX_INT",2000);
//    include 'mainviewer.php';


    function phpsqlconnection ()
    {
        $con=mysqli_connect("mysql:3306","root","dev","simpleblog");
        if (mysqli_connect_errno()){
            echo "Failed to connect to MySQL: " . mysqli_connect_error();
            echo "Error: Unable to connect to MySQL." . PHP_EOL;
            echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
            echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
        exit;
        }
        return $con;
    }


    function generateNumber() {
        return rand(0,MAX_INT);
    }

    function computePublic($number1, $power, $number2) {

        return bcpowmod((string)$number1, (string)$power, (string)$number2);
    }

    function sharedPrivate($number1, $power, $number2) {

        return bcpowmod((string)$number1, (string)$power, (string)$number2);
    }

    $action = $_GET['action'];

    $con = phpsqlconnection();

    if ($action==1) {
        // echo "action = ".$action; echo " ";
        $number1 = $_GET['number1'];
        $number2 = $_GET['number2'];
        $randomPrivate = generateNumber();

        $sharedPublicServer =  computePublic($number1,$randomPrivate,$number2);
        //masukin ke database

        $sql =  "UPDATE user SET base2=".$number2.", random=".$randomPrivate." WHERE User_Id=".$_SESSION["myId"];
        mysqli_query($con,$sql);

//        echo "Sini";
        // echo "number1 = "+$number1; echo " ";
        // echo "number2 = "+$number2; echo " ";
        // echo "randomPrivate = "+$randomPrivate; echo " ";
        // echo "sharedPublicServer = "+$sharedPublicServer; echo " ";
        echo $sharedPublicServer;
        die();
    }
    else if ($action==2) {
        $sharedPublicClient = $_GET['sharedPublicClient'];
        $sql="SELECT * FROM user WHERE User_Id=".$_SESSION["myId"]." LIMIT 1";

        $result = mysqli_query($con,$sql);   

        $row = mysqli_fetch_array($result);
        if (mysqli_num_rows($result) == 1){ 
                $base2 =  $row['base2'];
                $random = $row['random'];
                $sharedKey = sharedPrivate($sharedPublicClient,$random,$base2);                
                // echo $shared_key; echo " ";
                $sql =  "UPDATE user SET shared_key=".$sharedKey." WHERE User_Id=".$_SESSION["myId"];
                mysqli_query($con,$sql);
                echo $sharedKey;
        }
        die();
    }
 ?>