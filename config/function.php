<?php
require_once('connect.php');

function sanitize($value)
{
    return htmlentities(htmlspecialchars(trim(strip_tags($value))));
}
function sanitize2($value)
{
    return htmlentities(htmlspecialchars(trim(strip_tags($value))));
}

function generateAccountID()
{
    global $link;
    $characters = '0123456789';
    $accountID = '';
    $isUnique = false;

    while (!$isUnique) {
        $accountID = '';
        for ($i = 0; $i < 10; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $accountID .= $characters[$index];
        }
        $sql = "SELECT * FROM sellers WHERE account_id ='$accountID'";
        $query = mysqli_query($link, $sql);
        if (mysqli_num_rows($query) == 0) {
            $isUnique = true;
        }
    }

    return $accountID;
}

function GenerateOtp()
{
    global $link;
    $characters = '0123456789';
    $otp = '';
    $isUnique = false;

    while (!$isUnique) {
        $otp = '';
        for ($i = 0; $i < 4; $i++) {
            $index = rand(0, strlen($characters) - 1);
            $otp .= $characters[$index];
        }
        $sql = "SELECT * FROM otp WHERE otp ='$otp'";
        $query = mysqli_query($link, $sql);
        if (mysqli_num_rows($query) == 0) {
            $adding_sql = "INSERT INTO otp (otp,status) VALUES ('$otp','Available')";
            $adding_query = mysqli_query($link, $adding_sql);
            $isUnique = true;
        }
    }


    return $otp;
}

function signup($post)
{
    global $link;
    $error = [];
    extract($post);

    if (!empty($firstname)) {
        $firstname = sanitize($firstname);
    } else {
        $error[] = "Firstname is Required";
    }

    if (!empty($lastname)) {
        $lastname = sanitize($lastname);
    } else {
        $error[] = "Lastname is Required";
    }


    if (!empty($email)) {
        $email = sanitize($email);
        $check_email = "SELECT * FROM sellers WHERE email='$email'";
        $check = mysqli_query($link, $check_email);
        if (mysqli_num_rows($check) == 1) {
            $error[] = "Email Is In Use";
        }
    } else {
        $error = "Email is Required";
    }

    if (!empty($phonenumber)) {
        $check_phone = "SELECT * FROM sellers WHERE phonenumber='$phonenumber'";
        $check = mysqli_query($link, $check_phone);
        if (mysqli_num_rows($check) == 1) {
            $error[] = "This Phone number is in use";
        }
    } else {
        $error = "Phone number is required";
    }

    if (!empty($password)) {
        $password;
    } else {
        $error[] = "Please Create a Pasword";
    }


    if (isset($_FILES['image'])) {
        $profile_pic = $_FILES['image']['name'];
        $post_tmp_name = $_FILES['image']['tmp_name'];

        //Move the file 
        move_uploaded_file($post_tmp_name, "../uploads/$profile_pic");
    }


    $account_id = generateAccountID();
    $otp = GenerateOtp();

    if (!$error) {
        $sql = "INSERT INTO sellers (firstname,lastname,email,phonenumber,profile_pic,account_id,password) VALUES ('$firstname','$lastname','$email','$phonenumber','$profile_pic','$account_id','$password')";
        $query = mysqli_query($link, $sql);

        if ($query) {
            // SEND_MAIL($email, 'Kelvin@gmail.com', $email, 'Verify Your Email');
            return true;

        } else {
            return false;
        }
    } else {
        return $error;
    }
}

function SEND_MAIL($to, $from, $email, $subject, $otp)
{
    $to = $to;
    $subject = $subject;

    $message = "
    <html>
<body bgcolor=\"white\">
<center>
    <h1>Verify your email</h1> 
<h4 style=\"font-family :'Times New Roman', Times, serif\">Thanks for helping us keep your account secure!</h4>
<h4 style=\"font-family:monospace\">Your OTP is" . $otp . " Thank you for registering</h4>
</center>
</body>
</html> 
    ";

    // Always set content-type when sending HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= "From: <$from>" . "\r\n";

    mail($to, $subject, $message, $headers);
}

function login($post)
{
    $errors = [];
    global $link;
    extract($post);

    if (!empty($email)) {
        $email = sanitize($email);
    } else {
        $errors[] = "email is required";
    }


    if (!empty($password)) {
        $password;
    } else {
        $errors[] = "Password is required";
    }


    if (!$errors) {
        $sql = "SELECT * FROM sellers WHERE email='$email' AND password = '$password'";
        $query = mysqli_query($link, $sql);
        if (mysqli_num_rows($query) == 1) {
            $details = mysqli_fetch_assoc($query);
            $_SESSION['id'] = $details['account_id'];
            return $details;
        } else {
            return "Invalid Email or Password";
        }
    } else {
        return $errors;
    }
}
function allow_access($user, $url)
{
    if (!isset($user)) {
        header("Location:$url");
    }
}
function formatNumber($number)
{
    // Convert number to string and add .00 if not already present
    $formattedNumber = number_format((float) $number, 2, '.', '');

    // Add commas for thousands
    $formattedNumber = number_format((float) $formattedNumber, 2, '.', ',');

    return $formattedNumber;
}

function fetch_all($table)
{
    global $link;
    $sql = "SELECT * FROM $table";
    $query = mysqli_query($link, $sql);

    if (mysqli_num_rows($query) > 0) {
        return $query;
    } else {
        return false;
    }
}

function fetch_all_desc($table)
{
    global $link;
    $sql = "SELECT * FROM $table  ORDER BY listing_id DESC";
    $query = mysqli_query($link, $sql);

    if (mysqli_num_rows($query) > 0) {
        return $query;
    } else {
        return false;
    }
}

function get_user($id)
{
    global $link;
    $sql = "SELECT * FROM sellers WHERE account_id = '$id'";
    $query = mysqli_query($link, $sql);

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        return $row;
    } else {
        return false;
    }
}

function createListings($post)
{
    global $link;
    $errors = [];
    extract($post);

    if (!empty($name)) {
        $name = sanitize($name);
    } else {
        $errors[] = "Name is Required";
    }

    if (!empty($lister)) {
        $lister = sanitize($lister);
    } else {
        $errors[] = "An Unexpected Error has Occured , Refresh the page please";
    }
    if (!empty($category)) {
        $category = sanitize($category);
    } else {
        $errors[] = "Select a Categpry";
    }
    if (!empty($price)) {
        $price = sanitize($price);
    } else {
        $errors[] = "Enter an amount";
    }
    if (!empty($details)) {
        $details = sanitize($details);
    } else {
        $errors[] = "Enter your description";
    }
    if (!empty($location)) {
        $location = sanitize($location);
    } else {
        $errors[] = "Enter Location";
    }
    if (!empty($frequency)) {
        $frequency = sanitize($frequency);
    } else {
        $errors[] = "Enter Frequency";
    }

    $status = "Available";



    if (isset($_FILES['image1'])) {
        $profile_pic1 = $_FILES['image1']['name'];
        $post_tmp_name1 = $_FILES['image1']['tmp_name'];

        //Move the file 
        move_uploaded_file($post_tmp_name1, "../uploads/$profile_pic1");
    }

    if (isset($_FILES['image2'])) {
        $profile_pic2 = $_FILES['image2']['name'];
        $post_tmp_name2 = $_FILES['image2']['tmp_name'];

        //Move the file 
        move_uploaded_file($post_tmp_name2, "../uploads/$profile_pic2");
    }

    if (isset($_FILES['image3'])) {
        $profile_pic3 = $_FILES['image3']['name'];
        $post_tmp_name3 = $_FILES['image3']['tmp_name'];

        //Move the file 
        move_uploaded_file($post_tmp_name3, "../uploads/$profile_pic3");
    }

    if (isset($_FILES['image4'])) {
        $profile_pic4 = $_FILES['image4']['name'];
        $post_tmp_name4 = $_FILES['image4']['tmp_name'];
        //Move the file 
        move_uploaded_file($post_tmp_name4, "../uploads/$profile_pic4");
    }

    if (isset($_FILES['image5'])) {
        $profile_pic5 = $_FILES['image5']['name'];
        $post_tmp_name5 = $_FILES['image5']['tmp_name'];
        //Move the file 
        move_uploaded_file($post_tmp_name5, "../uploads/$profile_pic5");
    }


    if (!$errors) {
        $sql = "INSERT INTO listings (lister,name,details,price,frequency,category,location,photo1,photo2,photo3,photo4,photo5,status) VALUES ('$lister','$name','$details','$price','$frequency','$category','$location','$profile_pic1','$profile_pic2','$profile_pic3','$profile_pic4','$profile_pic4','$status')";
        $query = mysqli_query($link, $sql);

        if ($query) {

            return true;

        } else {
            return false;
        }
    } else {
        return $errors;
    }

}

function show_my_listings($id)
{
    global $link;

    $sql = "SELECT * FROM listings WHERE lister = '$id'";
    $query = mysqli_query($link, $sql);
    if (mysqli_num_rows($query) > 0) {
        return $query;
    } else {
        return false;
    }
}

function list_num($id)
{
    global $link;
    $sql = "SELECT * FROM listings WHERE lister= '$id'";
    $query = mysqli_query($link, $sql);

    if (mysqli_num_rows($query) > 0) {
        $count = mysqli_num_rows($query);
        return $count;
    } else {
        return 0;
    }
}

function booked_list_num($id)
{
    global $link;
    $sql = "SELECT * FROM listings WHERE lister= '$id' AND status= 'occupied'";
    $query = mysqli_query($link, $sql);

    if (mysqli_num_rows($query) > 0) {
        $count = mysqli_num_rows($query);
        return $count;
    } else {
        return 0;
    }
}

function get_listing($id)
{
    global $link;
    $sql = "SELECT * FROM listings WHERE listing_id = '$id'";
    $query = mysqli_query($link, $sql);

    if (mysqli_num_rows($query) > 0) {
        $row = mysqli_fetch_assoc($query);
        return $row;
    } else {
        return false;
    }
}

function get_all($table)
{
    global $link;
    $sql = "SELECT * FROM $table";
    $query = mysqli_query($link, $sql);

    if (mysqli_num_rows($query) > 0) {
        return $query;
    } else {
        return false;
    }
}

function UpdateListings($post, $listing_id)
{
    global $link;
    $errors = [];
    extract($post);

    if (!empty($name)) {
        $name = sanitize($name);
    } else {
        $errors[] = "Name is Required";
    }

    if (!empty($lister)) {
        $lister = sanitize($lister);
    } else {
        $errors[] = "An Unexpected Error has Occured , Refresh the page please";
    }
    if (!empty($category)) {
        $category = sanitize($category);
    } else {
        $errors[] = "Select a Category";
    }
    if (!empty($price)) {
        $price = sanitize($price);
    } else {
        $errors[] = "Enter an amount";
    }
    if (!empty($details)) {
        $details = sanitize($details);
    } else {
        $errors[] = "Enter your description";
    }
    if (!empty($location)) {
        $location = sanitize($location);
    } else {
        $errors[] = "Enter Location";
    }
    if (!empty($frequency)) {
        $frequency = sanitize($frequency);
    } else {
        $errors[] = "Enter Frequency";
    }

    if (!empty($status)) {
        $status = sanitize($status);
    } else {
        $errors[] = "Enter Status";
    }

    $profile_pic1 = $post['oldimage1'];
    $profile_pic2 = $post['oldimage2'];
    $profile_pic3 = $post['oldimage3'];
    $profile_pic4 = $post['oldimage4'];
    $profile_pic5 = $post['oldimage5'];

    if (isset($_FILES['image1'])) {
        $profile_pic1 = $_FILES['image1']['name'];
        $post_tmp_name1 = $_FILES['image1']['tmp_name'];

        //Move the file 
        move_uploaded_file($post_tmp_name1, "../uploads/$profile_pic1");
    }

    if (isset($_FILES['image2'])) {
        $profile_pic2 = $_FILES['image2']['name'];
        $post_tmp_name2 = $_FILES['image2']['tmp_name'];

        //Move the file 
        move_uploaded_file($post_tmp_name2, "../uploads/$profile_pic2");
    }

    if (isset($_FILES['image3'])) {
        $profile_pic3 = $_FILES['image3']['name'];
        $post_tmp_name3 = $_FILES['image3']['tmp_name'];

        //Move the file 
        move_uploaded_file($post_tmp_name3, "../uploads/$profile_pic3");
    }

    if (isset($_FILES['image4'])) {
        $profile_pic4 = $_FILES['image4']['name'];
        $post_tmp_name4 = $_FILES['image4']['tmp_name'];
        //Move the file 
        move_uploaded_file($post_tmp_name4, "../uploads/$profile_pic4");
    }

    if (isset($_FILES['image5'])) {
        $profile_pic5 = $_FILES['image5']['name'];
        $post_tmp_name5 = $_FILES['image5']['tmp_name'];
        //Move the file 
        move_uploaded_file($post_tmp_name5, "../uploads/$profile_pic5");
    }
    if (!$errors) {
        $sql = "UPDATE listings SET name = '$name' , details = '$details', price = '$price' , frequency = '$frequency', location = '$location' , photo1 = '$profile_pic1', photo2 = '$profile_pic2', photo3 = '$profile_pic3', photo4 = '$profile_pic4' , photo5 = '$profile_pic5' , status = '$status' WHERE listing_id = '$listing_id'";
        $query = mysqli_query($link, $sql);

        if ($query) {

            return true;

        } else {
            return false;
        }
    } else {
        return $errors;
    }

}

function delete($table, $id_name, $id)
{
    global $link;
    $sql = "DELETE FROM $table WHERE $id_name = $id";
    $query = mysqli_query($link, $sql);

    if ($query) {
        return true;
    } else {
        return false;
    }

}

function UpdateUser($post, $seller_id)
{
    global $link;
    $errors = [];
    extract($post);

    if (!empty($firstname)) {
        $firstname = sanitize($firstname);
    } else {
        $error[] = "Firstname is Required";
    }

    if (!empty($lastname)) {
        $lastname = sanitize($lastname);
    } else {
        $error[] = "Lastname is Required";
    }


    if (!empty($email)) {
        $email = sanitize($email);
        $check_email = "SELECT * FROM sellers WHERE email='$email'";
        $check = mysqli_query($link, $check_email);
        if (mysqli_num_rows($check) == 1) {
            $error[] = "Email Is In Use";
        }
    } else {
        $error = "Email is Required";
    }

    if (!empty($phonenumber)) {
        $check_phone = "SELECT * FROM sellers WHERE phonenumber='$phonenumber'";
        $check = mysqli_query($link, $check_phone);
        if (mysqli_num_rows($check) == 1) {
            $error[] = "This Phone number is in use";
        }
    } else {
        $error = "Phone number is required";
    }

    if (!empty($password)) {
        $password;
    } else {
        $error[] = "Please Create a Pasword";
    }



    if (isset($_FILES['image'])) {
        $profile_pic = $_FILES['image']['name'];
        $post_tmp_name = $_FILES['image']['tmp_name'];

        //Move the file 
        move_uploaded_file($post_tmp_name, "../uploads/$profile_pic");
    } else {
        $profile_pic = $oldimage;
    }


    if (!$errors) {
        $sql = "UPDATE sellers SET firstname = '$firstname' , lastname = '$lastname' , email = '$email' , phonenumber = '$phonenumber' , password = '$password' , profile_pic = '$profile_pic'  WHERE seller_id = '$seller_id'";
        $query = mysqli_query($link, $sql);

        if ($query) {

            return true;

        } else {
            return false;
        }
    } else {
        return $error;
    }

}

function SendMessage($post)
{
    extract($post);
    $firstname = sanitize($firstname);
    $lastname = sanitize($lastname);
    $subject = sanitize($subject);
    $message = sanitize($message);
    $to = 'ckelvin196@gmail.com';
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

    // More headers
    $headers .= "From: <$firstname $lastname>" . "\r\n";


    try {
        mail($to, $subject, $message, $headers);
        return true;
    } catch (\Throwable $th) {
        $errors[] = $th;
    }
}

