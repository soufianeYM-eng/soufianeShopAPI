<?php

session_start();

$helper = array_keys($_SESSION);
foreach ($helper as $key) {
    unset($_SESSION[$key]);
}
?>
<script>
    window.location.replace('/soufianeShopAPI/views/login.php');
</script>