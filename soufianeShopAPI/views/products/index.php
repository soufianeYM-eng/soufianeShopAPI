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
$data = json_decode(json_encode($woocommerce->get('products', ['per_page' => 100])), true);

?>
<div class="card-header">
    <h3 class="card-title" style="font-size:30px;"><strong>Liste des produits</strong></h3>
    <a href="/soufianeShopAPI/views/products/create.php"><button class="btn btn-success mb-3" style="float:right;"><i class="fas fa-plus"></i> Ajouter Produit</button></a>
    <div style="float:right;" class="mr-5">
        <form action="../../models/products/addproductsExcel.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="excelfile" />
            <button type="submit" name="submit_file" class="btn btn-success">Importer Excel</button>
        </form>
    </div>
    <div style="float:right;" class="mr-5">
        <form action="../../models/products/exportproductsExcel.php" method="POST">
            <button type="submit" name="submit_export" class="btn btn-primary">Exporter Excel</button>
        </form>
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
                <?php foreach ($data as $row) : ?>
                    <tr>
                        <td style="font-size:25px"><strong><em><?= $row['id']; ?></em></strong></td>
                        <td><strong><?= $row['name']; ?></strong></td>
                        <td><?= $row['slug']; ?></td>
                        <td style="
    width: 200px;
"><?= $row['date_created']; ?></td>
                        <?php if ($row['status'] == 'publish') : ?>
                            <td><strong> <span class="badge bg-success"><?= $row['status']; ?></span></strong> </td> <?php endif; ?> <td class="mr-2" style="font-size:20px;"><strong><?= $row['price']; ?> <i class="fas fa-dollar-sign" style="color:#216C2A;"></i></strong></td>
                        <td style="width: 20px;">
                            <?php foreach ($row['images'] as $data) {
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
                                <?= ' <a class="btn btn-danger mr-1" href="../../models/products/delete.php?id=' . $row['id'] . '"><i class="fas fa-trash"></i></a>'; ?>
                                <?= ' <a class="btn btn-info" href="modify.php?id=' . $row['id'] . '"><i class="fas fa-edit"></i></a>'; ?>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include "../gabarit-bottom.php" ?>