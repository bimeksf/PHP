<?php require("../app/App.php"); ?>


<!DOCTYPE html>
<html>

<head>
  <title>Transactions</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      text-align: center;
    }

    table tr th,
    table tr td {
      padding: 5px;
      border: 1px #eee solid;
    }

    tfoot tr th,
    tfoot tr td {
      font-size: 20px;
    }

    tfoot tr th {
      text-align: right;
    }
  </style>
</head>

<body>
  <table>
    <thead>
      <tr>
        <th>Date</th>
        <th>Check #</th>
        <th>Description</th>
        <th>Amount</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $rowCount = count($dates); // Předpokládáme, že všechny pole mají stejný počet řádků

      for ($i = 0; $i < $rowCount; $i++) {
        echo "<tr>";
        echo "<td>" . ($dates[$i] ?? '') . "</td>";
        echo "<td>" . ($Checks[$i] ?? '') . "</td>";
        echo "<td>" . ($ids[$i] ?? '') . "</td>";
        echo "<td>" . ($Amounts[$i] ?? '') . "</td>";
        echo "</tr>";
      }
      ?>
    </tbody>

    <tfoot>
      <tr>
        <th colspan="3">Total Income:</th>
        <td><?php echo $income["income"]; ?></td>
      </tr>
      <tr>
        <th colspan="3">Total Expense:</th>
        <td><!-- YOUR CODE --> <?php 
echo -$income["expense"]; ?></td>
      </tr>
      <tr>
        <th colspan="3">Net Total:</th>
        <td><!-- YOUR CODE --><?php echo $sum ?></td>
      </tr>
    </tfoot>
  </table>
</body>

</html>