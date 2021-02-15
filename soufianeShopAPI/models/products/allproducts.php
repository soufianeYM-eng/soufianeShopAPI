<?php
require '../../vendor/autoload.php';
session_start();

use Automattic\WooCommerce\Client;

//$ck = 'ck_6617d47f39d13dd8e6b21dc61534da672d96735c';
//$cs = 'cs_298c82de74daaed8cde720686f2f8324990fbe2f';

$woocommerce = new Client(
    'http://localhost:8070/shop/',
    $_SESSION['CK'],
    $_SESSION['CS'],
    [
        'wp_api' => true,
        'version' => 'wc/v3',
        'query_string_auth' => true,
    ]
);


$_SESSION['products'] = json_encode($woocommerce->get('products', ['per_page' => 100]));



?>
<script>
    window.location.replace('/soufianeShopAPI/views/products/index.php');
</script>