<?php
$jsonString = '
{                                          
  "orderID": 12345,                        
  "shopperName": "Ваня Иванов",             
  "shopperEmail": "ivanov@example.com", 
  "contents": [                            
    {                                      
      "productID": 34,                     
      "productName": "Супер товар",        
      "quantity": 1                       
    },                                     
    {                                      
      "productID": 56,                     
      "productName": "Чудо товар",       
      "quantity": 3                        
    }                                      
  ],                                       
  "orderCompleted": true                   
}                                          
';
 
$cart = json_decode( $jsonString );
var_dump($cart);
echo $cart->shopperEmail ;
echo $cart->contents[1]->productName;
?>