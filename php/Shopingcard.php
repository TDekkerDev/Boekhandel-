<?php include "include/Header.php"; ?>
<?php include "include/Navbar.php"; ?>
<?php include "include/Connectdb.php"; ?>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
</style>
<br>
<br>
<br>
<table>
<tr>
    <th>Title</th>
    <th>Price</th>
    <th>dell</th>
</tr>
<?php
$boeken = json_decode($_COOKIE['shopingcard'], true);
//de count tekt hoe veel boeken in in de winkel mand zij
$HowBoeken = count($boeken);
$value = "?";
$array_Boeken = array_fill(0, $HowBoeken, $value);
$SubBoeken = implode(",", $array_Boeken);
$sql = "SELECT * FROM boeken WHERE id IN ($SubBoeken)";
$sth = $db->prepare($sql); 
$sth->execute($boeken); 
$total = 0;
while($row = $sth->fetch()) { 
    $total = $total + $row["Price"];
    ?>
    <tr>
        <th><?php echo $row["Title"] ?></th>
        <th><?php echo $row["Price"] ?></th>
        <th>
            <form action="/php/dell.php" method="post">
                <input type="hidden" name="id" value="<?php echo $row["id"] ?>">
                <input type="submit" value="dell">
            </form>
       </th>
    </tr>
<?php } ?>
    <tr>
        <th>totaal:</th>
        <th><?php echo $total ?></th>
        <th></th>
    </tr>
</table>


<script src="https://www.paypal.com/sdk/js?client-id=Abtqw8SSWIXNE6j3jhoQ0sCIu59TBrQNDqFYn76tW2Da_Si-7C_H8iWa4cDLPafJ99j6g1N667IhZshm&currency=USD"></script>
    <!-- Set up a container element for the button -->
    <div id="paypal-button-container"></div>
    <script>
      paypal.Buttons({
        // Sets up the transaction when a payment button is clicked
        createOrder: (data, actions) => {
          return actions.order.create({
            purchase_units: [{
              amount: {
                value: '<?php echo $total ?>' // Can also reference a variable or function
              }
            }]
          });
        },
        // Finalize the transaction after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData) {
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            alert(`Transaction ${transaction.status}: ${transaction.id}\n\nSee console for all available details`);
            // When ready to go live, remove the alert and show a success message within this page. For example:
            // const element = document.getElementById('paypal-button-container');
            // element.innerHTML = '<h3>Thank you for your payment!</h3>';
            // Or go to another URL:  actions.redirect('thank_you.html');
          });
        }
      }).render('#paypal-button-container');
    </script>


<?php include "include/Footer.php"; ?>