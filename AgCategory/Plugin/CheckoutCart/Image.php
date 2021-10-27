<?php
 
namespace ArtGalerie\AgCategory\Plugin\CheckoutCart;
 
class Image
{
    public function afterGetImage($item, $result)
    {
        echo '<script>console.log("test ra ni.")</script>';
     if(isset($_POST['configuration_image'])) {
     	$cart_image = $_POST['configuration_image'];
     	echo '<script>console.log('.$cart_image.')</script>';
        $result->setImageUrl( $cart_image );
     }
     return $result;
    }
}