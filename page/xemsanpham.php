<?php
session_start();
include_once("config.php");
    if(isset($_SESSION["sach"]))
    {
        $total = 0;
        echo '<form method="post" action="PAYMENT-GATEWAY">';
        echo '<ul>';
        $cart_items = 0;
        foreach ($_SESSION["sach"] as $cart_itm)
        {
           $product_code = $cart_itm["code"];
           $results = $mysqli->query("SELECT tensach, noidung, gia FROM sach WHERE masach='$product_code' LIMIT 1");
           $obj = $results->fetch_object();
            
            echo '<li class="cart-itm">';
            echo '<span class="remove-itm"><a href="capnhatsanpham.php?removep='.$cart_itm["code"].'&return_url='.$current_url.'">&times;</a></span>';
            echo '<div class="p-price">'.$currency.$obj->gia.'</div>';
            echo '<div class="sanpham-info">';
            echo '<h3>'.$obj->tensach.' (Code :'.$product_code.')</h3> ';
            echo '<div class="p-qty">Qty : '.$cart_itm["qty"].'</div>';
            echo '<div>'.$obj->noidung.'</div>';
            echo '</div>';
            echo '</li>';
            $subtotal = ($cart_itm["price"]*$cart_itm["qty"]);
            $total = ($total + $subtotal);
 
            echo '<input type="hidden" name="item_name['.$cart_items.']" value="'.$obj->tensach.'" />';
            echo '<input type="hidden" name="item_code['.$cart_items.']" value="'.$product_code.'" />';
            echo '<input type="hidden" name="item_desc['.$cart_items.']" value="'.$obj->noidung.'" />';
            echo '<input type="hidden" name="item_qty['.$cart_items.']" value="'.$cart_itm["qty"].'" />';
            $cart_items ++;
            
        }
        echo '</ul>';
        echo '<span class="check-out-txt">';
        echo '<strong>Total : '.$currency.$total.'</strong>  ';
        echo '</span>';
        echo '</form>';
        
    }else{
        echo 'Your Cart is empty';
    }
?>