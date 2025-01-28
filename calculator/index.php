<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
  <title>Document</title>
</head>

<body>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">

    <input type="number" name="num01" placeholder="Number one">
    <select name="operator" id="">
      <option value="add">+</option>
      <option value="substract">-</option>
      <option value="multiply">*</option>
      <option value="divide">/</option>

    </select>
    <input type="number" name="num02" placeholder="Number two">

    <button type="submit">Calculate</button>

  </form>

  <?php
  if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $num01 = filter_input(INPUT_POST, "num01", FILTER_VALIDATE_FLOAT);
    $num02 = filter_input(INPUT_POST, "num02", FILTER_VALIDATE_FLOAT);
    $operator = htmlspecialchars($_POST["operator"]);

    $errors = false;

    if (!isset($num01) || !isset($num02) || empty($operator)) {

      echo "<p>Fill all fields</p>";

      $errors = true;
    }
    if (!is_numeric($num01) || !is_numeric($num02)) {

      echo "<p>write only numbers</p>";
      $errors = true;
    }
    if ($operator === "divide" && $num02 == 0) {
      echo "<p>Cannot divide by zero</p>";
      $errors = true;
    }

    if (!$errors) {
      $value = 0;
      switch ($operator) {
        case "add":
          $value = $num01 + $num02;

          break;
        case "substract":

          $value = $num01 - $num02;
          break;
        case "multiply":

          $value = $num01 * $num02;
          break;
        case "divide":

          $value = $num01 / $num02;

          break;

        default:
          echo "<p>something went wrond</p>";
          break;
      }

      echo "<p class='result'>Result: {$value}</p>";
    }
  }


  ?>


</body>

</html>