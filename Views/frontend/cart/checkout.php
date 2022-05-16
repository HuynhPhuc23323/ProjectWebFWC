<!DOCTYPE html>
<html lang="en">

<head>
    <?php require_once("Views/shared/head-title.php"); ?>
    <link rel="stylesheet" href="Public/frontend/css/checkout.css">
</head>

<body>
    <div class="container-fluid">
        <?php require_once("Views/shared/header.php"); ?>
        
        <!-- begin of Checkout -->
        <div class='container'>
            <div class='window'>
                <div class='order-info'>
                    <div class='order-info-content'>
                        <h2>Order Summary</h2>
                        <!-- <div class='line'></div>
                        <table class='order-table'>
                            <tbody>
                                <tr>
                                    <td><img src='Public/frontend/img/son2.png' class='full-width'></img>
                                    </td>
                                    <td>
                                        <br> <span class='thin'>Common Projects</span>
                                        <br> Bball High<br> <span class='thin small'> White<br><br></span>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <div class='price'>$549</div>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                        <div class='line'></div>
                        <table class='order-table'>
                            <tbody>
                                <tr>
                                    <td><img src='Public/frontend/img/macara.png' class='full-width'></img>
                                    </td>
                                    <td>
                                        <br> <span class='thin'>Maison Margiela</span>
                                        <br>Future Sneakers<br> <span class='thin small'> White</span>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div class='price'>$870</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class='line'></div>
                        <table class='order-table'>
                            <tbody>
                                <tr>
                                    <td><img src='Public/frontend/img/macara.png' class='full-width'></img>
                                    </td>
                                    <td>
                                        <br> <span class='thin'>Our Legacy</span>
                                        <br>Brushed Scarf<br> <span class='thin small'> Brown</span>
                                    </td>

                                </tr>
                                <tr>
                                    <td>
                                        <div class='price'>$349</div>
                                    </td>
                                </tr>
                            </tbody>
                        </table> -->
                        <?php
                        
                        if(isset($cartOfUser)&isset($_SESSION['idUser'])){
                            $totalBill=0;
                            foreach ($cartOfUser as $oneCartOfUser){
                                echo "
                                
                                <div class='line'></div>
                                <table class='order-table'>
                                    <tbody>
                                        <tr>
                                            <td><img src='Public/frontend/img/product/".$oneCartOfUser['product_image']."' class='full-width'></img>
                                            </td>
                                            <td>
                                                <br> <span class='thin'>".$oneCartOfUser['product_name']."</span>
                                                <br>".$oneCartOfUser['quantity']."<br> <span class='thin small'></span>
                                            </td>
    
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class='price'>$".$oneCartOfUser['total_price']."</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                
                                ";
                                $totalBill=$totalBill+(int)$oneCartOfUser['total_price'];
                                
                            }
                            $taxBill=$totalBill*0.05;
                            $checkOut=$totalBill+$taxBill+3.60;
                        }
                            ?>
                        
                        <div class='line'></div>
                        <div class='total'>
                            <span style='float:left;'>
                                <div class='thin dense'>Tax (5%)</div>
                                <div class='thin dense'>Delivery</div>
                                TOTAL
                            </span>
                            <span style='float:right; text-align:right;'>
                                <div class='thin dense'>$<?=$taxBill; ?></div>
                                <div class='thin dense'>$3.60</div>
                                $<?=$checkOut;?>
                            </span>
                        </div>
                    </div>
                </div>
                
                <div class='credit-info'>
                    <div class='credit-info-content'>
                        <table class='half-input-table'>
                            <tr>
                                <td>Please select your card: </td>
                                <td>
                                    <div class='dropdown' id='card-dropdown'>
                                        <div class='dropdown-btn' id='current-card'>Visa</div>
                                        <div class='dropdown-select'>
                                            <ul>
                                                <li>Master Card</li>
                                                <li>American Express</li>
                                            </ul>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                        <img src='https://dl.dropboxusercontent.com/s/ubamyu6mzov5c80/visa_logo%20%281%29.png' height='80' class='credit-card-image' id='credit-card-image'></img>
                        Card Number
                        <input class='input-field'></input>
                        Card Holder
                        <input class='input-field'></input>
                        <table class='half-input-table'>
                            <tr>
                                <td> Expires
                                    <input class='input-field'></input>
                                </td>
                                <td>CVC
                                    <input class='input-field'></input>
                                </td>
                            </tr>
                        </table>
                        <a href='#' onclick="announcement();" class='pay-btn'>Checkout</a>
                    </div>
                </div>
            </div>
        </div>  
             
        <!-- End of Checkout -->
        <!--Footer-->
        <div>
            <?php require_once("Views/shared/footer.php"); ?>

        </div>
    </div>
    <script language="javascript">
        function announcement(){
            alert("This feature has not been developed yet!");

        }
    </script>
    <?php require_once("Views/shared/script-footer.php"); ?>
</body>

</html>