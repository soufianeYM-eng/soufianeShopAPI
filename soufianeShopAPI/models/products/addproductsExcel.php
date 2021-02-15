<?php
require '../../vendor/autoload.php';
require 'product.php';

use Automattic\WooCommerce\Client;

session_start();

if (isset($_POST["submit_file"])) {
    $file = $_FILES["excelfile"]["tmp_name"];
    $file_open = fopen($file, "r");
    while (($csv = fgetcsv($file_open, 1000, ",")) !== false) {
        $name = $csv[0];
        $prix = $csv[1];
        $descri = $csv[2];
        $sdescri = $csv[3];
        $image = $csv[4];

        $data = [
            'name' => $name,
            'type' => 'simple',
            'regular_price' => $prix,
            'description' => $descri,
            'short_description' => $sdescri,
            'categories' => [
                [
                    'id' => 9
                ]
            ],
            'images' => [
                [
                    'src' => $image,
                ],
            ]
        ];

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

        $woocommerce->post('products', $data);
    }
}

?>
<script>
    window.location.replace('/soufianeShopAPI/views/products/index.php');
</script>