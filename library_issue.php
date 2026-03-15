<?php include 'config.php'; ?>
<?php include 'navbar.php'; ?>

<div class="container mt-4">
<form method="post">
Roll No <input name="roll" class="form-control"><br>
Book ID <input name="book" class="form-control"><br>
<button class="btn btn-primary">Issue</button>
</form>

<?php
if($_POST){
$sid=$db->prepare("SELECT id FROM students WHERE roll_no=?");
$sid->execute([$_POST['roll']]);
$student=$sid->fetchColumn();

$due=date("Y-m-d",strtotime("+14 days"));

$db->prepare("INSERT INTO issues(student_id,book_id,issue_date,due_date,status,fine)
VALUES(?,?,datetime('now'),?, 'issued',0)")
->execute([$student,$_POST['book'],$due]);

echo "Issued";
}
?>