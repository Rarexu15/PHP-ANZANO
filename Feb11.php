<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    body{
      text-align: justify;
    }
    table {
        border: 5px solid black;
        padding: 10px;
    }
    .submit-btn{
      background-color: aqua;
    }
    </style>
</head>
<body>
  <div class="form-container">
    <fieldset>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
      <label>Fullname (LN,FN,M.I.) :<br></label>
      <input type="text" name="name" required><br>

      <label>Address :<br></label>
      <input type="text" name="add" required><br>

      <label>No. of Kilowatts : <br></label>
      <input type="number" name="KW" required><br>

      <label>Type of Subscription :<br></label>
      <select name="subs" required><br>
        <option value="">--Subscription Type--</option>
        <option value="Residential">Residdential</option>
        <option value="Commercial">Commercial</option>
        <option value="Indusrial">Industrial</option>
      </select><br>

      <label>Other Charges :</label>
        <div>
          <input type="checkbox" name="Disc" value="CCS"> Disconnection<br>
          <input type="checkbox" name="Rec" value="SSC"> Reconnection <br>
          <input type="checkbox" name="Late" value="English"> Late Payment <br>
          <input type="checkbox" name="AddSub" value="English"> Additional Submeter <br>
          <input type="checkbox" name="SubTran" value="English"> Submeter Transfer <br>
        </div>
      
      <label>Comments: <br></label>
      <textarea name="comm"></textarea>

      <div class="form-group">
        <input type="submit" value="SUBMIT BILL" name="submit" class="submit-btn">
      </div>

    </form>
    </fieldset>

  </div>
</body>
</html>



<?php
/*if(isset($_POST['submit'])) {
  $name = $_POST['name'];
  $add = $_POST['add'];
  $KW = $_POST['KW'];
  $TSub = $_POST['subs']
  $KWRes = 7.25;
  $KWCom = 8.50;
  $KWInd = 9.75;
}
*/


echo "<table border: 1px solid black;>";
echo " <tr>";
echo "    <th>Full Name</th>";
echo "    <td></td>";
echo "  </tr>";
echo "  <tr>";
echo "    <th>Address</th>";
echo "    <td></td>";
echo "  </tr>";
echo "  <tr>";
echo "    <th>No. of Kilowatts Consumed</th>";
echo "    <td></td>";
echo "  </tr>";
echo "  <tr>";
echo "    <th>Type of Subscription</th>";
echo "    <td></td>";
echo "  </tr>";
echo "  <tr>";
echo "    <th>Rate per KW</th>";
echo "    <td></td>";
echo "  </tr>";
echo "  <tr>";
echo "    <th>Amount</th>";
echo "    <td></td>";
echo "  </tr>";
echo "  <tr>";
echo "    <th>Other Charges</th>";
echo "    <td></td>";
echo "  </tr>";
echo "  <tr>";
echo "    <th>Total Charges</th>";
echo "    <td></td>";
echo "  </tr>";
echo "  <tr>";
echo "    <th>Comments</th>";
echo "    <td></td>";
echo "  </tr>";
  
echo "</table>";
?>