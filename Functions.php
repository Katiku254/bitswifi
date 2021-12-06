<?php

class Functions {

    function dbConnect() {
        $db = "bitswifi";
        $host = "localhost";
        $user = "root";
        $pass = "";

        return new mysqli($host, $user, $pass, $db);
    }

    function registerClient($query) {
        $conn = $this->dbConnect();
        $res = $conn->query($query);
        $conn->close();
    }

    function editAccount($post, $phone) {
        $conn = $this->dbConnect();
        $sql = "update user SET fname = '".$post["fname"]."', lname = '".$post["lname"].
                "', email = '".$post["email"]."', password = '".$post["password"].
                "' WHERE phone = '$phone'";
        $res = $conn->query($sql);
        $conn->close();
    }

    function checkClientExists($phone) {
        $conn = $this->dbConnect();
        $sql = "select fname from user where phone = '$phone'";
        $res = $conn->query($sql);
        $ret = 0;
        
        if($res->num_rows > 0) {
            $ret = 1;
        }
        $conn->close();
        return $ret;
    }

    function loginClient($data) {
        $conn = $this->dbConnect();
        $sql = "select * from user where phone = '".$data["phone"]."' and password = '".$data["password"]."'";
        $res = $conn->query($sql);
        $row = array();

        if($res->num_rows > 0) {
            $row = $res->fetch_assoc();
        }
        $conn->close();
        return $row;
    }

    function getPackage($ID) {
        $conn = $this->dbConnect();
        $sql = "select * from package where ID = '".$ID."'";
        $res = $conn->query($sql);
        $row = array();

        if($res->num_rows > 0) {
            $row = $res->fetch_assoc();
        }
        $conn->close();
        return $row;
    }

    function insertPayment($paymentData) {
        $conn = $this->dbConnect();
        $sql = 'insert into payment(ID, userID, date, packageID, transaction_code, status, phone) values ("", "'.
                $paymentData[0].'", "'.$paymentData[1].'", "'.$paymentData[2].'", "'.$paymentData[3].'", "0", "'.
                $paymentData[4].'")';
        $res = $conn->query($sql);
        $conn->close();
    }

    function checkPaymentExists($tr_code) {
        $conn = $this->dbConnect();
        $sql = "select date, phone from payment where transaction_code = '$tr_code'";
        $res = $conn->query($sql);
        $row = array();

        if($res->num_rows > 0) {
           $row = $res->fetch_assoc();
        }
        $conn->close();
        return $row;
    }

    function getInvoices($userID) {
        $conn = $this->dbConnect();
        $sql = "select * from payment where userID = '$userID'";
        $res = $conn->query($sql);
        $invoices = array();

        if($res->num_rows > 0) {
            $i = 0;

            while($row = $res->fetch_assoc()) {                
                $date = $row["date"];
                $package = $this->getPackage($row["packageID"]);
                $pkgSummary = $this->packageToString($package);
        
                $invoices[$i++] = array($date, $pkgSummary, $package["price"], 
                                    $row["transaction_code"], $row["status"], $row["phone"]);
            }
        }
        $conn->close();
        return $invoices;
    }

    function packageToString($package) {
        $details = "";

        if($package["bundle"] == -1) {
            $details .= "Unlimited ";
        } else {
            $details .= $package["bundle"]." GB ";
        }

        $details .= "bundle @ ".$package["speed"]." Mbps for ";

        if($package["duration"] == 30) {
            $details .= "1 Month";
        }
        if($package["duration"] == 7) {
            $details .= "1 Week";
        }
        if($package["duration"] == -1) {
            if($package["price"] == 80) {
                $details .= "1 Day";
            } else {
                $details .= "1 Hour";
            }
        }
        return $details;
    }

    function insertMessage($post) {
        $conn = $this->dbConnect();
        $sql = 'insert into messages(ID, name, email, phone, user, message) values ("", "'.
                $post["fname"].'", "'.$post["email"].'", "'.$post["phone"].'", "'.$post["user"].
                '", "'.$post["message"].'")';
        $res = $conn->query($sql);
        $conn->close();
    }

    function uploadImage($imageName) {
        $file = $_FILES['profile']['tmp_name']; // the name attribute is given as name="image" the the enctype="multipart/form-data" for the form
        $sourceProperties = getimagesize($file);
        $fileNewName = $imageName;
        $folderPath = "profiles/";
        $ext = pathinfo($_FILES['profile']['name'], PATHINFO_EXTENSION);
        $imageType = $sourceProperties[2];
        // Determine the file by its type/extension
        switch ($imageType) {

            case IMAGETYPE_PNG:
                $imageResourceId = imagecreatefrompng($file); 
                $targetLayer = $this->imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagepng($targetLayer,$folderPath. $fileNewName. ".". $ext);
                break;

            case IMAGETYPE_GIF:
                $imageResourceId = imagecreatefromgif($file); 
                $targetLayer = $this->imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagegif($targetLayer,$folderPath. $fileNewName. ".". $ext);
                break;

            case IMAGETYPE_JPEG:
                $imageResourceId = imagecreatefromjpeg($file); 
                $targetLayer = $this->imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagejpeg($targetLayer,$folderPath. $fileNewName. ".". $ext);
                break;

            default:
                echo "Invalid Image type.";
                exit;
                break;

        }
    }

    function imageResize($imageResourceId,$width,$height) {
        // Keep the Image Ratio of Width & Height
        $maxDim = 100;
        $ratio = $width/$height;
        if( $ratio > 1) {
          $targetWidth = $maxDim;
          $targetHeight = $maxDim/$ratio;
        } else {
          $targetWidth = $maxDim*$ratio;
          $targetHeight = $maxDim;
        }
        $targetLayer=imagecreatetruecolor($targetWidth,$targetHeight);
        imagecopyresampled($targetLayer,$imageResourceId,0,0,0,0,$targetWidth,$targetHeight, $width,$height);
        return $targetLayer;
      }
}
?>