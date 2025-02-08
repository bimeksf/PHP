<?php

declare(strict_types=1);

$products = [
  ["name" => "t-shirt", "color" => "red", "size" => "medium"],
  ["name" => "jean", "color" => "blue", "size" => "large"],
  ["name" => "sweater", "color" => "red", "size" => "small"],
  ["name" => "dress", "color" => "blue", "size" => "large"],
  ["name" => "jacket", "color" => "black", "size" => "medium"],


];


$color = $_GET["color"] ?? "";
$size = $_GET["size"] ?? "";


$filterProducts = array_filter(
  $products,
  fn(array  $product): bool  => ($color === "" ||  $product["color"] === $color) && ($size === "" ||  $product["size"] === $size)


);



function selected($compere, $to)
{

  return $compere === $to ? "selected" : '';
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>

  <form method="get">

    <label for="color">color</label>
    <select name="color" id="color">
      <option value="">any</option>
      <option value="red" <?= selected($color, "red") ?>>red</option>
      <option value="blue" <?= selected($color, "blue") ?>>blue</option>
      <option value="black" <?= selected($color, "black") ?>>black</option>
    </select>

    <label for="size">size</label>
    <select name="size" id="size">
      <option value="">any</option>
      <option value="medium" <?= selected($size, "medium") ?>>medium</option>
      <option value="large" <?= selected($size, "large") ?>>large</option>
      <option value="small" <?= selected($size, "small") ?>>small</option>
    </select>



    <button type="submit">filter</button>
    <a href="<?= $_SERVER['PHP_SELF'] ?>">reset</a>

  </form>


  <h2>product</h2>
  <?php if (!empty($filterProducts)) : ?>


    <ul>
      <?php foreach ($filterProducts as $product): ?>
        <li><?= htmlspecialchars($product["name"] . '-' . $product["color"] . '-' . $product["size"]) ?></li>
      <?php endforeach ?>

    </ul>
  <?php else: ?>
    <p>no product found</p>
  <?php endif ?>


</body>

</html>