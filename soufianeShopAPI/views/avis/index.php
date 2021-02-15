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
$data = json_decode(json_encode($woocommerce->get('products/reviews')), true);
?>
<div class="card-header">
    <h3 class="card-title" style="font-size:30px;"><strong>Liste des avis</strong></h3>
</div>

<div class="card-body">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Rating</th>
                <th>Product ID</th>
                <th>Review</th>
                <th>Customer Mail</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            <?php foreach ($data as $row) : ?>
                <tr>
                    <td><?= $row['rating']; ?>.0/5.0 <i class="fas fa-star" style="color:#FFD700;"></i></td>
                    <td><?= $row['product_id']; ?></td>
                    <td><strong><?= $row['review']; ?></strong></td>
                    <td><?= $row['reviewer_email']; ?></td>
                    <?php if ($row['status'] == "approved") : ?>
                        <td><span class="badge bg-success"><?= $row['status']; ?></span></td>
                    <?php endif; ?>
                </tr>
                <?php $i++; ?>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
</div>

<?php include "../gabarit-bottom.php" ?>