<?php include 'config.php'; include 'phpqrcode/qrlib.php'; include 'navbar.php'; ?>

<form method="post">
Roll <input name="roll">
<button>Generate</button>
</form>

<?php
if($_POST){
$s=$db->query("SELECT * FROM students WHERE roll_no='".$_POST['roll']."'")->fetch();

QRcode::png($s['roll_no'],'qr.png');

echo "<div class='card' style='width:300px'>
<img src='$s[photo_path]' height=100>
<h4>$s[name]</h4>
<p>$s[roll_no]</p>
<img src='qr.png'>
</div>";
}
?>