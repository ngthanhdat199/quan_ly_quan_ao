<?php
class UserModel extends db {

    public function insertNewUser($username,$password,$email,$fullname,$address) {
        $sql = "INSERT INTO users VALUES(null, '$username', '$password', '$email', '$fullname', '$address')";
        $result = false;
        if(mysqli_query($this->con, $sql)){
            $result = true;
        }
        return json_encode($result);
    }
}
?>