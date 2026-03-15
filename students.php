<?php include 'config.php'; include 'navbar.php'; ?>

<form method="post" enctype="multipart/form-data">
Name <input name="name"><br>
Roll <input name="roll"><br>
Blood <input name="blood"><br>
Photo <input type="file" name="photo"><br>
<button>Save</button>
</form>

<?php
if($_POST){
$path="uploads/".$_FILES['photo']['name'];
move_uploaded_file($_FILES['photo']['tmp_name'],$path);

$db->prepare("INSERT INTO students(name,roll_no,blood_group,photo_path)
VALUES(?,?,?,?)")->execute([
$_POST['name'],$_POST['roll'],$_POST['blood'],$path
]);
echo "Saved";
}
?>