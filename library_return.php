<?php include 'config.php'; include 'navbar.php'; ?>

<form method="post">
Issue ID <input name="id">
<button>Return</button>
</form>

<?php
if($_POST){
$issue=$db->query("SELECT due_date FROM issues WHERE id=".$_POST['id'])->fetch();

$days=(strtotime(date("Y-m-d"))-strtotime($issue['due_date']))/86400;
$fine=$days>0?$days:0;

$db->exec("UPDATE issues SET return_date=datetime('now'),fine=$fine,status='returned' WHERE id=".$_POST['id']);

echo "Returned. Fine: $fine";
}
?>