<?php
    session_start();
    include_once "config.php";
    $fname = mysqli_real_escape_string($conn, $_POST['fname']);
    $lname = mysqli_real_escape_string($conn, $_POST['lname']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    if(!empty($fname) && !empty($lname) && !empty($email) && !empty($password)){
        //email validation
        if(filter_var($email, FILTER_VALIDATE_EMAIL)){       //if the email is validate
             //checking the email is already exist or not
            $sql = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
            if(mysqli_num_rows($sql) > 0){                  //if the email is already exist
                echo "$email - This email already exist!";
            }else{
                //checking user upload the file or not
                if(isset($_FILES['image'])){
                     //if the file is uploaded
                    $img_name = $_FILES['image']['name'];//getting user upload image name
                    $img_type = $_FILES['image']['type'];
                    $tmp_name = $_FILES['image']['tmp_name'];//this temporary name is used to save/move file in our folder
                                                            //explode image and get the last extension like jpg/png
                    $img_explode = explode('.',$img_name);
                    $img_ext = end($img_explode);//getting the extension of user upload
    
                    $extensions = ["jpeg", "png", "jpg"]; //valid img extensions
                    if(in_array($img_ext, $extensions) === true){ //if user uploaded img matches with array extension
                        $types = ["image/jpeg", "image/jpg", "image/png"];
                        if(in_array($img_type, $types) === true){
                            $time = time();//return current time
                                                                        //we need this time bcz when user upload img then we can rename it with current time
                                                                        //so all the image file will have a unique name


                                //moving user uploaded img in a particular folder

                            $new_img_name = $time.$img_name;
                            if(move_uploaded_file($tmp_name,"images/".$new_img_name)){//if user upload img move to our folder successfully
                                $ran_id = rand(time(), 100000000);//creating random id for user
                                $status = "Active now";//once user signed up then his/her status will be active now
                                $encrypt_pass = md5($password);

                                //insert all user data inside table
                                $insert_query = mysqli_query($conn, "INSERT INTO users (unique_id, fname, lname, email, password, img, status)
                                VALUES ({$ran_id}, '{$fname}','{$lname}', '{$email}', '{$encrypt_pass}', '{$new_img_name}', '{$status}')");
                                if($insert_query){ //if these data are inserted
                                    $select_sql2 = mysqli_query($conn, "SELECT * FROM users WHERE email = '{$email}'");
                                    if(mysqli_num_rows($select_sql2) > 0){
                                        $result = mysqli_fetch_assoc($select_sql2);
                                        $_SESSION['unique_id'] = $result['unique_id'];//using this seasons we used user unique_id in other php file
                                        echo "success";
                                    }else{
                                        echo "This email address not Exist!";
                                    }
                                }else{
                                    echo "Something went wrong. Please try again!";
                                }
                            }
                        }else{
                            echo "Please upload an image file - jpeg, png, jpg";
                        }
                    }else{
                        echo "Please upload an image file - jpeg, png, jpg";
                    }
                }
            }
        }else{
            echo "$email is not a valid email!";
        }
    }else{
        echo "All input fields are required!";
    }
?>