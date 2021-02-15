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
$data = json_decode(json_encode($woocommerce->get('products/categories')), true);
?>
<div class="card-header">
    <h3 class="card-title" style="font-size:30px;"><strong>Liste des catégories</strong></h3>
</div>

<div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Slug</th>
                <th>Nombre de produits</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data as $row) : ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><strong><?= $row['name']; ?></strong></td>
                    <td><?= $row['slug']; ?></td>
                    <td><?= $row['count']; ?></td>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>

<?php include "../gabarit-bottom.php" ?>