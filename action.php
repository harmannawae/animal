<?php
   session_start();
    require("connection.php");

    if(isset($_POST['pid'])){

        $pid = $_POST['pid'];

        $pname = $_POST['pname'];

        $pprice= $_POST['pprice'];

        $pimage = $_POST['pimage'];

        $pcode = $_POST['pcode'];

        $pqty = 1;

        $stmt = $conn->prepare("SELECT product_code FROM cart WHERE
        
        product_code=?");

        $stmt->bind_param("s",$pcode);

        $stmt->execute();

        $res = $stmt->get_result();

        $r = $res->fetch_assoc();

        $code = $r['product_code'];

        if(!$code){

            $query = $conn->prepare("INSERT INTO cart (product_name,product_price,product_image,qty,total_price,product_code) VALUES (?,?,?,?,?,?)")
            
            ;

                $query->bind_param("sssiss",$pname,$pprice,$pimage,$pqty,$pprice,$pcode);

                $query->execute();
                
                        echo '<div class="alert alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <strong>Item added to your cart!</strong> 
                            </div>';
                               }
       
                        else{

                            echo '<div class="alert alert-danger alert-dismissible mt-2">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <strong>Item already added to your cart!</strong> 
                                </div>';


        }

    }
    if(isset($_GET['cartItem']) && isset($_GET['cartItem']) == 'cart_item'){
        $stmt = $conn->prepare("SELECT * FROM cart");
        $stmt->execute();
        $stmt->store_result();
        $rows = $stmt->num_rows;

        echo $rows;
    }

    if(isset($_GET['remove'])){
        $id = $_GET['remove'];
        $stmt = $conn->prepare("DELETE FROM cart WHERE id=?");
        $stmt->bind_param("i",$id);
        $stmt->execute();
        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'Item removed from the cart!';
        header('location:cart.php');
    }

    if(isset($_GET['clear'])){
        $stmt = $conn->prepare("DELETE FROM cart");
        $stmt->execute();
        $_SESSION['showAlert'] = 'block';
        $_SESSION['message'] = 'ลบทั้งหมดสำเร็จ';
        header('location:cart.php');
    }

    if(isset($_POST['qty'])){
    $qty = $_POST['qty'];
    $pid = $_POST['pid']; 
    $pprice = $_POST['pprice']; 
    
    $tprice = $qty*$pprice;

    $stmt = $conn->prepare("UPDATE cart SET qty=?, total_price=? WHERE id=?")
    ;
    $stmt->bind_param("isi",$qty,$tprice,$pid);
    $stmt->execute();
    }

    if(isset($_POST['action']) && isset($_POST['action']) == 'order'){
     // <--  $name = $_POST['name']; -->
     //   $email = $_POST['email'];
      //  $phone = $_POST['phone'];
        $porducts = $_POST['products'];
        $grand_total = $_POST['grand_total'];
     //   $address = $_POST['address'];
        $pmode = $_POST['pmode'];

        $data ='';

        $stmt = $conn->prepare("INSERT INTO orders (pmode,products,amount_paid)VALUES(?,?,?)");

        $stmt->bind_param("sss",$pmode,$products,$grand_total);
        $stmt->execute();
        $data .= '<div class="text-center">
                    <h1 class="display-4 mt-2 text-danger">ขอบคุณที่ใช้บริการ</h1>
                 <h2 class="text-success">You Order Place Successfully</h2>
                 <h4 class="bg-danger text-light rounded p-2">รวมยอด : '.$products.'</h4>
                
                 <h4>ราคารวมสุทธิ : '.number_format($grand_total,2).'</h4>
                 <h4>วิธีการจ่ายเงิน : '.$pmode.'</h4>
                </div>';
            echo $data;
        
    }
?>