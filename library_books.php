<?php include 'config.php'; ?>
<!DOCTYPE html>
<html>
<head>
<link href="bootstrap.css" rel="stylesheet">
</head>
<body>
<?php include 'navbar.php'; ?>

<div class="container mt-4">
<h3>Add Book</h3>

<form method="post">
<input name="title" class="form-control" placeholder="Title"><br>
<input name="author" class="form-control" placeholder="Author"><br>
<select name="type" class="form-control">
<option value="physical">Physical</option>
<option value="digital">Digital</option>
</select><br>
<input name="qty" class="form-control" placeholder="Quantity"><br>
<button class="btn btn-success">Add</button>
</form>

<?php
if($_POST){
$stmt=$db->prepare("INSERT INTO books(title,author,type,quantity) VALUES(?,?,?,?)");
$stmt->execute([$_POST['title'],$_POST['author'],$_POST['type'],$_POST['qty']]);
echo "<div class='alert alert-success'>Book Added</div>";
}

$books=$db->query("SELECT * FROM books");
echo "<table class='table'>";
foreach($books as $b){
echo "<tr><td>$b[title]</td><td>$b[author]</td><td>$b[type]</td></tr>";
}
echo "</table>";
?>
</div>
</body>
</html>