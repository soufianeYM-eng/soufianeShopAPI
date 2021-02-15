<?php
session_start();
$_SESSION['CK'] = $_POST['ck'];
$_SESSION['CS'] = $_POST['cs'];
?>

<script>
    window.location.replace('/soufianeShopAPI/models/apiconfig.php');
</script>