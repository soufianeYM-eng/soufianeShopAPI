<?php
require '../../vendor/autoload.php';
require 'product.php';
session_start();

//upload images

$uploaddir = 'Pimages/';
$uploadfile = $uploaddir . basename($_FILES['imageP']['name']);
echo '<pre>';
move_uploaded_file($_FILES['imageP']['tmp_name'], $uploadfile);

//Instanciation de la classe Product
$product = new Product($_POST['Nom'], $_POST['Price'], $_POST['Description'], $_POST['SDescription'], $uploadfile);


/*$nom = $_POST['Nom'];
$price = $_POST['Price'];
$desc = $_POST['Description'];
$sdesc = $_POST['SDescription'];*/
$id = $_POST['id'];

if (basename($_FILES['imageP']['name']) == null) {
    $uploadfile = "Pimages/32-pouces-moniteur-ecran-incurve-tv-3000_main-0.jpg";
}

$data = [
    'name' => $product->getNom(),
    'type' => 'simple',
    'regular_price' => $product->getPrix(),
    'description' => $product->getDescirption(),
    'short_description' => $product->getShortDescription(),
    'categories' => [
        [
            'id' => 9
        ],
    ],
    'images' => [
        [
            'src' => 'http://localhost:8070/soufianeShopAPI/models/products/' . $product->getImage()
        ],
    ]
];

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


$woocommerce->put('products/' . $id, $data);
?>
<script>
    window.location.replace('/soufianeShopAPI/views/products/index.php');
</script>