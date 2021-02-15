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
$id = $_POST["ID"];
if ($id == null) {
?>
    <script>
        window.location.replace('/soufianeShopAPI/views/products/index.php');
    </script>
<?php
}
$data = json_encode($woocommerce->get("products/" . $id));
$data = json_decode($data, true);
?>
<div class="card-header">
    <h3 class="card-title" style="font-size:30px; color:green;"><strong>Produit Trouvé</strong></h3>
    <a href="/soufianeShopAPI/views/products/create.php"><button class="btn btn-success mb-3" style="float:right;"><i class="fas fa-plus"></i> Ajouter Produit</button></a>
</div>

<div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Slug</th>
                <th>Date de création</th>
                <th>Status</th>
                <th>Prix</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><?= $data['id']; ?></td>
                <td><?= $data['name']; ?></td>
                <td><?= $data['slug']; ?></td>
                <td><?= $data['date_created']; ?></td>
                <?php if ($data['status'] == 'publish') : ?>
                    <td style="color:green;"><?= $data['status']; ?></td>
                <?php endif; ?>
                <td><?= $data['price']; ?></td>
                <td>
                    <?php foreach ($data['images'] as $data) {
                        foreach ($data as $key => $value) {
                            if ($key = 'src' and strpos($value, 'jpg') != false) { ?>
                                <img src="<?= $value ?>" style="
    height: 346px;
" />
                    <?php
                                break;
                            }
                        }
                    }
                    ?>
                </td>
                <td>
                    <div class="row justify-content-center">
                        <?= ' <a class="btn btn-danger mr-1" href="../../models/products/delete.php?id=' . $id . '"><i class="fas fa-trash"></i></a>'; ?>
                        <?= ' <a class="btn btn-info" href="modify.php?id=' . $id . '"><i class="fas fa-edit"></i></a>'; ?>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</div>

<?php include "../gabarit-bottom.php" ?>