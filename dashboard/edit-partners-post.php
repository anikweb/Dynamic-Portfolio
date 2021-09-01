<?php
    ob_start();
    require_once('inc/db.php');
    session_start();
    $id = $_SESSION['id'];
    $id2 = $_POST['id'];
    $_SESSION['name'] = $name = $_POST['name'];
    $_SESSION['alt_name'] = $alt_name = $_POST['alt_name'];
    $ImageName = $_FILES['Image']['name'];
    $ImageSize = $_FILES['Image']['size'];
    $ImageTmpName = $_FILES['Image']['tmp_name'];
  
    $ImageNameExplode = explode('.',$ImageName);
    $ImageExt = end($ImageNameExplode);
    $imageExtLower = strtolower($ImageExt);
    $newImageName = $id.'partners-image'.date('dmy').rand(1,3000).'.'.$imageExtLower;
   
    $validImageExt = ['jpg','png','gif','svg'];

    // list($width, $height) = getimagesize($_FILES['featured']['tmp_name']);
    // echo $width.'x'.$height;


    if(empty($name)){
        $_SESSION['nameEmpty'] = 'Name Field will not be empty';
        header('location:edit-partners.php');
    }else if(empty($alt_name)){
        $_SESSION['alt_namenEmpty'] = 'Alt name Field will not be empty';
        header('location:edit-partners.php');
    }else{

        unset($_SESSION['name']);
        unset($_SESSION['alt_name']);

        $update = "UPDATE partners SET p_name='$name',alt_name='$alt_name' WHERE id = $id2";
        $q = mysqli_query($db,$update);

        if($q){
            if(!empty($ImageName)){
                if(!in_array($imageExtLower,$validImageExt)){
                    $_SESSION['extensionErrImage'] ='Attachment file is not valid';
                    header('location:edit-partners.php');
                }else if($ImageSize > 5000000){
                    $_SESSION['sizeErrimage'] ='Max file size 5MB';
                    header('location:edit-partners.php');
                }else{
                    $selectOldImage = "SELECT * FROM partners WHERE id = $id2";
                    $oldQ = mysqli_query($db,$selectOldImage);
                    $oldImage = mysqli_fetch_assoc($oldQ);
                    $imageOldLocation = '../assets/img/partners/'.$oldImage['p_image'];

                    if(file_exists($imageOldLocation)){
                        unlink($imageOldLocation);
                    }
                    $updateImage = "UPDATE partners SET p_image ='$newImageName' WHERE id = $id2";
                    $qImage = mysqli_query($db,$updateImage);
                    if($qImage){
                        $imageNewLocation = '../assets/img/partners/'.$newImageName;
                        move_uploaded_file($ImageTmpName,$imageNewLocation);
                        $_SESSION['editPartnersSuccess'] = 'Partners Successfully Edited';
                    }
                }
            }
            $_SESSION['editPartnersSuccess'] = 'Partners Successfully Edited';
            header('location:partners.php');

        }else{
            $_SESSION['editPartnersFailed'] = 'Partners Failed to Edit';
            header('location:partners.php');
    }
}
    ob_end_flush();
?>
