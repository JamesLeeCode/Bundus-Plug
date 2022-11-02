<?php
  function generateRandomString($length = 13) {
  $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
  $charactersLength = strlen($characters);
  $randomString = '';
  for ($i = 0; $i < $length; $i++) {
    $randomString .= $characters[rand(0, $charactersLength - 1)];
  }
  return $randomString;
  }

    if(isset($_REQUEST['login'])){
        $username = $_REQUEST['email'];
        $password = $_REQUEST['password'];

    }


    if(isset($_REQUEST['addService'])){

    $service_id  = generateRandomString();

    $title = $_REQUEST['title'];
    $description = $_REQUEST['description'];
    $location = $_REQUEST['location'];
    $price = $_REQUEST['price'];
    $user_id = $_REQUEST['user_id'];


  if(!$conn -> query(
    " INSERT INTO Service (title, service_id, description,	location,price, user_id	)
    VALUES ('$title','$service_id','$description', '$location','$price', '$user_id')"
    ))
    {
      echo("Error description: ". $conn->error);
    }
    header("Location: dashboard.php");
    exit();
    }

    if(isset($_REQUEST['passwordRest'])){

    $email = $_REQUEST['email'];
    $password =  password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
    $q1 = $_REQUEST['q1'];
   $q2 = $_REQUEST['q2'];

   $query = "SELECT * FROM users WHERE email	= '$email' AND q1 ='$q1' AND q2 ='$q2'  ";
    $result = mysqli_query( $conn,  $query);



    if(mysqli_num_rows( $result)==1)
    {
      if(!$conn -> query(
       "UPDATE users SET password	='$password' Where email	= '$email' "
       ))
       {
         echo("Error description: ". $conn->error);
       }
   header("Location:login.php?resetted=true");
   exit();
   }
   else {
   header("Location:forgotPassword.php.php?resseting=error");
   exit();
   }
    }



    if(isset($_REQUEST['delete_Serv'])){

    $id = $_REQUEST['id'];


    if(!$conn -> query(
      " Delete FROM service WHERE service_id = '$id'"
      ))
      {
        echo("Error description: ". $conn->error);
      }
    header("Location: dashboard.php");
    exit();
    }


        if(isset($_REQUEST['delete_Prod'])){

        $id = $_REQUEST['id'];


        if(!$conn -> query(
          " Delete FROM products WHERE product_id = '$id'"
          ))
          {
            echo("Error description: ". $conn->error);
          }
        header("Location: dashboard.php");
        exit();
        }

        if(isset($_REQUEST['addProduct'])){
          if(isset($_FILES["pic"]) && $_FILES["pic"]["error"] == 0){
                $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
                $filename = $_FILES["pic"]["name"];
                $filetype = $_FILES["pic"]["type"];
                $filesize = $_FILES["pic"]["size"];

                // Verify file extension
                $ext = pathinfo($filename, PATHINFO_EXTENSION);
                if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

                // Verify file size - 5MB maximum
                $maxsize = 5 * 1024 * 1024;
                if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

                // Verify MYME type of the file
                if(in_array($filetype, $allowed)){
                    // Check whether file exists before uploading it
                    if(file_exists("upload/" . $filename)){
                        echo $filename . " is already exists.";
                    } else{
                        move_uploaded_file($_FILES["pic"]["tmp_name"], "upload/" . $filename);
                          $pic = $filename;
                    }
                } else{
                    echo "Error: There was a problem uploading your file. Please try again.";
                }
            } else{
                echo "Error: " . $_FILES["pic"]["error"];
            }

        $product_id  = generateRandomString();

        $title = $_REQUEST['title'];
        $short_description = $_REQUEST['short_description'];
        $full_description = $_REQUEST['full_description'];
        $location = $_REQUEST['location'];
        $price = $_REQUEST['price'];
        $user_id = $_REQUEST['user_id'];
        $date   = new DateTime();

        $date_released = date_format($date,"l jS \of F Y");
        $category = $_REQUEST['category'];


      if(!$conn -> query(
        " INSERT INTO products (title, product_id, short_description,	full_description,	location,price, user_id, date_released,image, category	)
        VALUES ('$title','$product_id','$short_description','$full_description', '$location','$price', '$user_id', '$date_released', '$pic', '$category')"
        ))
        {
          echo("Error description: ". $conn->error);
        }
        header("Location: dashboard.php");
        exit();
        }



    if(isset($_REQUEST['register'])){
      $pic = "user.png";
      if(isset($_FILES["pic"]) && $_FILES["pic"]["error"] == 0){
            $allowed = array("jpg" => "image/jpg", "jpeg" => "image/jpeg", "gif" => "image/gif", "png" => "image/png");
            $filename = $_FILES["pic"]["name"];
            $filetype = $_FILES["pic"]["type"];
            $filesize = $_FILES["pic"]["size"];

            // Verify file extension
            $ext = pathinfo($filename, PATHINFO_EXTENSION);
            if(!array_key_exists($ext, $allowed)) die("Error: Please select a valid file format.");

            // Verify file size - 5MB maximum
            $maxsize = 5 * 1024 * 1024;
            if($filesize > $maxsize) die("Error: File size is larger than the allowed limit.");

            // Verify MYME type of the file
            if(in_array($filetype, $allowed)){
                // Check whether file exists before uploading it
                if(file_exists("upload/" . $filename)){
                    echo $filename . " is already exists.";
                } else{
                    move_uploaded_file($_FILES["pic"]["tmp_name"], "upload/" . $filename);
                      $pic = $filename;
                }
            } else{
                echo "Error: There was a problem uploading your file. Please try again.";
            }
        } else{
            echo "Error: " . $_FILES["pic"]["error"];
        }

    $user_id  = generateRandomString();

    $user_name = $_REQUEST['user_name'];
    $user_surname = $_REQUEST['user_surname'];
    $phone = $_REQUEST['phone'];
    $password =  password_hash($_REQUEST['password'], PASSWORD_DEFAULT);
    $email = $_REQUEST['email'];
    $q1 = $_REQUEST['q1'];
   $q2 = $_REQUEST['q2'];


  if(!$conn -> query(
    " INSERT INTO users (user_id, user_name,	user_surname,	phone,password, profile, email, q1, q2	)
    VALUES ('$user_id','$user_name','$user_surname', '$phone','$password', '$pic', '$email','$q1','$q2' )"
    ))
    {
      echo("Error description: ". $conn->error);
    }
    header("Location: login.php");
    exit();
    }



    if(isset($_REQUEST['logout'])){
        session_destroy();
        header("Location: index.php");
        exit();
    }
?>
