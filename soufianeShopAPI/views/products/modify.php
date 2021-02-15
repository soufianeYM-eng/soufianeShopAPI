<?php include "../gabarit-top.php";
include '../../vendor/autoload.php';

use Automattic\WooCommerce\Client;

if (!isset($_SESSION['CK']) || !isset($_SESSION['CS'])) { ?>
    <script>
        window.location.replace('/soufianeShopAPI/views/login.php');
    </script>
<?php
}


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
//$data = file_get_contents('http://localhost:8070/soufianeShopAPI/models/products/allproducts.php');
$id = $_GET["id"];
if ($id == null) {
    header("Location: /soufianeShopAPI/views/products/index.php");
}
$data = json_encode($woocommerce->get("products/" . $id));

$data = json_decode($data, true);
?>
<br />

<div class="container-fluid">
    <a href="index.php">
        <button class="btn btn-success mb-1"><i class="fa fa-arrow-left"></i> Retour</button>
    </a>
    <h2>Modification du produit N° <strong><?= $data['id'] ?></strong></h2>
    <div class="row justify-content-center">
        <div class="col-8">
            <form method="POST" action="../../models/products/modifyproduct.php" enctype="multipart/form-data">
                <input type="hidden" name="id" value="<?= $data['id'] ?>" />
                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" name="Nom" id="name" class="form-control" value="<?= $data['name'] ?>">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="Price" id="price" class="form-control" value="<?= $data['regular_price'] ?>">
                </div>
                <div class=" mb-3">
                    <label for="Descr" class="form-label">Description</label>
                    <textarea class="form-control" name="Description" id="Descr" rows="3"><?= $data['description'] ?></textarea>
                </div>
                <div class=" mb-3">
                    <label for="SDesc" class="form-label">Short Description</label>
                    <textarea class="form-control" name="SDescription" id="SDesc" rows="3"><?= $data['short_description'] ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input class="form-control" id="image" name="imageP" type="file" value="<?= $data['images'][0] ?>" style="
    padding: 4px;border-radius: 40px;
" />
                </div>
                <center><button type="submit" class="btn btn-info">Modifier</button>

                </center>
            </form>

        </div>
        <div class="col-4">
            <img src="<?= $data['images'][0]['src'] ?>" style="
    height: 514px;
    box-shadow: 20px 16px 30px black;
" />
        </div>
    </div>
</div>
<?php include "../gabarit-bottom.php" ?>