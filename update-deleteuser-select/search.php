<?php
$results = [];

if ($_SERVER["REQUEST_METHOD"] === "POST" && !empty($_POST["usersearch"])) {
  $usersearch = trim($_POST["usersearch"]);

  try {
    require_once("dbh.inc.php");

    $query = "SELECT * FROM comments WHERE usersname LIKE :usersearch";
    $stmt = $pdo->prepare($query);
    $stmt->bindValue(":usersearch", "%$usersearch%", PDO::PARAM_STR);
    $stmt->execute();

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
  } catch (PDOException $e) {
    die("Query failed: " . $e->getMessage());
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Search</title>
</head>

<body>

  <h3>Search</h3>

  <form action="search.php" method="POST">
    <label for="search">Search for user </label>
    <input type="text" name="usersearch" id="search" placeholder="Search..">
    <button type="submit">Search</button>
  </form>

  <h3>Search results</h3>

  <?php
  if (empty($results)) {
    echo "<p>There are no results</p>";
  } else {
    foreach ($results as $row): ?>
      <p><?php echo htmlspecialchars($row["usersname"]) ?></p>
      <p><?php echo htmlspecialchars($row["commnet_text"]) ?></p>
      <p><?php echo htmlspecialchars($row["created_at"]) ?></p>
  <?php endforeach;
  }
  ?>

</body>

</html>