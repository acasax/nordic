<?php
require_once '../../connection.php';
require_once "../class/class.user.php";
$user_class = new USER();

//if (isset($_SESSION["user_login"])){
  //  header("location: home.php");
//}

if(isset($_POST['login_button'])){
    $email    = strip_tags($_REQUEST["reg_email"]);
    $password = strip_tags($_REQUEST["reg_password"]);

    try {
        //Izvršavanje kverija
        $select_stm = $db->prepare("SELECT * FROM acc WHERE email=:uemail");
        $select_stm->execute(array( ':uemail' => $email));
        $row = $select_stm->fetch(PDO::FETCH_ASSOC);
        $num_of_company = $select_stm->rowCount();
        if ($num_of_company > 0) { //Provera da li je iz baze učitan podatak
            if($email == $row["email"]){ //Provera sa kojim podacima iz baze se poklapa
                if(md5($password) == $row["password"]){ //Provera šifre
                    $_SESSION["user_login"] = $row["acc_id"]; // Sesiji se dodeljuje id korisnika
                    $user_class->returnJSON("OK",'Uspešno ste se prijavili');
                    return;
                } else{
                    $user_class->returnJSON('ERROR', "Wrong password");
                    return;
                }
            } else{
                $user_class->returnJSON('ERROR', "Wrong email");
                return;
            }
        } else{
            $user_class->returnJSON('ERROR', "Email don't exist");
            return;
        }

    } catch (PDOException $e) {
        $e->getMessage();
    }
}
