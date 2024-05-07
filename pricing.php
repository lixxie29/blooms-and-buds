<?php

@include 'config.php';

session_start();

$user_id =  $_SESSION['user_id'];

if(!isset($user_id)){
    header('location:login.php');
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>

    <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="style.css">

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
</head>
<body>
    
<?php @include 'header.php';?>

<section class="section heading">
    <h3>pricing</h3>
    <p> <a href="home.php">home</a> / pricing</p>
</section>

<section class="pricing">

<div class="pricing-table">
            <table id="pricetable">
                <caption>Current Prices</caption> <!-- Added caption here -->
                <tr>
                <th>Product</th>
                <th>1-5 stems <button id="ascendingButton" data-sort="price" data-order="asc">▲</button><button id="descendingButton" data-sort="price" 
                data-order="asc">▼</button></th>
                <th>6-10 stems </th>
                <th>11-20 stems </th>
              </tr>
              <tbody id="tablebody">
                <tr class="sortableRow">
                    <td>Blue Hydrangea</td>
                    <td class="fewstem">$10/stem</td>
                    <td>$9/stem</td>
                    <td>$9/stem</td>
                </tr>
                <tr class="sortableRow">
                    <td>Orange Heliconia</td>
                    <td class="fewstem">$15/stem</td>
                    <td>$15/stem</td>
                    <td>$14/stem</td>
                </tr>
                <tr class="sortableRow">
                    <td>Royal Lilly</td>
                    <td class="fewstem">$20/stem</td>
                    <td>$18/stem</td>
                    <td>$15/stem</td>
                </tr>
                <tr class="sortableRow">
                    <td>Mixed Roses</td>
                    <td class="fewstem">$20/stem</td>
                    <td>$25/stem</td>
                    <td>$25/stem</td>
                </tr>
                <tr class="sortableRow">
                    <td>Pink Carnations</td>
                    <td class="fewstem">$8/stem</td>
                    <td>$8/stem</td>
                    <td>$8/stem</td>
                </tr>
                <tr class="sortableRow">
                    <td>Lilly of the Valley</td>
                    <td class="fewstem">$12/stem</td>
                    <td>$12/stem</td>
                    <td>$10/stem</td>
                </tr>
                <tr class="sortableRow">
                    <td>Orange Calla</td>
                    <td class="fewstem">$14/stem</td>
                    <td>$13/stem</td>
                    <td>$12/stem</td>
                </tr>
                <tr class="sortableRow">
                    <td>Prussian Tulips</td>
                    <td class="fewstem">$14/stem</td>
                    <td>$11/stem</td>
                    <td>$11/stem</td>
                </tr>
                <tr class="sortableRow">
                    <td>Pink Roses</td>
                    <td class="fewstem">$14/stem</td>
                    <td>$9/stem</td>
                    <td>$9/stem</td>
                </tr>
            </tbody>
              <tr>
                <td colspan="4" class="shipping-table">
                        <table class="shipping">
                            <caption>Shipping Costs by Destination</caption>
                            <tr>
                                <th>Destination</th>
                                <th>Cost</th>
                            </tr>
                            <tr>
                                <td>Local (within city)</td>
                                <td>$5.00</td>
                            </tr>
                            <tr>
                                <td>Within State</td>
                                <td>$10.00</td>
                            </tr>
                            <tr>
                                <td>Neighboring State</td>
                                <td>$15.00</td>
                            </tr>
                            <tr>
                                <td>Other States</td>
                                <td>$20.00</td>
                            </tr>
                            <tr>
                                <td>International</td>
                                <td>$30.00</td>
                            </tr>
                        </table>
                </td>
              </tr>
            </table>
          </div>

</section>



<?php @include 'footer.php';?>
<script src="script.js"></script>

</body>
</html>