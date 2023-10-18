



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Table</title>
</head>
<body>
  <style>
   .sales-boxes {
        width: auto;
        background: #fff;
        padding: 20px 30px;
        margin: 0 20px;
        border-radius: 12px;
        box-shadow: 0 5px 10px rgba(0, 0, 0, 0.1);
    }

    .sales-boxes  {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .sales-boxes .box .title {
        font-size: 24px;
        font-weight: 500;
        /* margin-bottom: 10px; */
    }

    .sales-boxes .sales-details li.topic {
        font-size: 20px;
        font-weight: 500;
    }

    .sales-boxes .sales-details li {
        list-style: none;
        margin: 8px 0;
    }

    .sales-boxes .sales-details li a {
        font-size: 18px;
        color: #333;
        font-size: 400;
        text-decoration: none;
    }

    .sales-boxes .box .button {
        width: 100%;
        display: flex;
        justify-content: flex-end;
    }

    .sales-boxes .box .button a {
        color: #fff;
        background: #0A2558;
        padding: 4px 12px;
        font-size: 15px;
        font-weight: 400;
        border-radius: 4px;
        text-decoration: none;
        transition: all 0.3s ease;
    }

    .sales-boxes .box .button a:hover {
        background: #0d3073;
    }
  </style>
  <form action="sorttable.php" method="post" enctype="multipart/form-data" >
  <label for="start_date">Start Date:</label>
  <input type="date" id="start_date" name="start_date">

  <label for="end_date">End Date:</label>
  <input type="date" id="end_date" name="end_date">

  <input type="submit" value="Download Data">
</form>
<div class="sales-boxes">
                <div class="recent-sales box">
                    <div class="title">DATA</div>
                    <div class="sales-details">
                    <?php

include("./dbconnect.php");

$sql = "SELECT * FROM form_data ";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    echo '<table border="1">
            <thead>
              <tr>
              <th>Sr no.</th>
                <th>Amount</th>
                <th>Name</th>
                <th>Aadhar_no/Pan_no</th>
               
                <th>date</th>
                <th>photo</th>
              </tr>
            </thead>
            <tbody>';
    // Loop through the rows and display the data
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<tr>
                        <td>'.$row['Sr No.'].'&nbsp</td>'.
                        '<td>&nbsp&nbsp'.$row['amount'].'&nbsp</td>'.
                        '<td>&nbsp&nbsp'.$row['name'].'&nbsp</td>'.
                        '<td>&nbsp&nbsp'.$row['aadhar_no'].'&nbsp</td>'.
                        // '<td>&nbsp&nbsp'.$row['pan_no'].'&nbsp</td>'.
                        '<td>&nbsp&nbsp'.$row['date'].'&nbsp</td>'.
                        '<td>&nbsp&nbsp'.'<img src="uploads/'.$row['photo'].'" style="width:50px;height:50px;" />&nbsp</td>'.'</tr>';
    }
}
?>
                    </div>
                </div>
        </div>
</body>
</html>