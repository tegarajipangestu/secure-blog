<?php 
    session_start();
    define ("MAX_INT",500);
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
        $login = $_GET['login'];
        $randomPrivate = generateNumber();

        $sharedPublicServer =  computePublic($number1,$randomPrivate,$number2);
        //masukin ke database

        if($login == 0){
            // not for login
            $stmt = $con->prepare("UPDATE user SET base2=?, random=? WHERE User_Id=?");
            $stmt->bind_param("iii", $number2, $randomPrivate, $_SESSION["myId"]);
        }else{
        $email = $_GET['email'];
            // for login
            $stmt = $con->prepare("UPDATE user SET temp_base2=?, temp_random=? WHERE Email=?");
            $stmt->bind_param("iis", $number2, $randomPrivate, $email);
        }
        $stmt->execute();
        $stmt->close();

        echo $sharedPublicServer;
        die();
    }
    else if ($action==2) {
        $login = $_GET['login'];
        $sharedPublicClient = $_GET['sharedPublicClient'];
        
        if($login == 0){
            $sql="SELECT * FROM user WHERE User_Id=".$_SESSION["myId"]." LIMIT 1";
        }else{
            $email = $_GET['email'];
            $sql="SELECT * FROM user WHERE Email='".$email."' LIMIT 1";
        }
        $result = mysqli_query($con,$sql); 
        $row = mysqli_fetch_array($result);
        if (mysqli_num_rows($result) == 1){                
                // echo $shared_key; echo " ";
                 if($login == 0){
                    $base2 =  $row['base2'];
                    $random = $row['random'];
                    $sharedKey = sharedPrivate($sharedPublicClient,$random,$base2); 
                    $stmt = $con->prepare("UPDATE user SET shared_key=? WHERE User_Id=?");
                    $stmt->bind_param("ii", $sharedKey, $_SESSION["myId"]);
                }else{
                    $base2 =  $row['temp_base2'];
                    $random = $row['temp_random'];
                    $sharedKey = sharedPrivate($sharedPublicClient,$random,$base2); 
                    // for login
                    $stmt = $con->prepare("UPDATE user SET temp_shared_key=? WHERE Email=?");
                    $stmt->bind_param("is", $sharedKey, $email);
                }
                $_SESSION["shared_key"] = $sharedKey;
                $stmt->execute();
                $stmt->close();

                echo $sharedKey;
        }
        die();
    }
 ?>