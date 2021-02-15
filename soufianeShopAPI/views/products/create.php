<?php include "../gabarit-top.php" ?>
<br />
<div class="container-fluid">
    <h2 class="text-center">L'ajout d'un produit</h2>
    <div class="row justify-content-center">
        <div class="col-6">
            <form method="POST" action="../../models/products/addproduct.php" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="name" class="form-label">Nom</label>
                    <input type="text" name="Nom" id="name" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input type="number" name="Price" id="price" class="form-control">
                </div>
                <div class="mb-3">
                    <label for="Descr" class="form-label">Description</label>
                    <textarea class="form-control" name="Description" id="Descr" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="SDesc" class="form-label">Short Description</label>
                    <textarea class="form-control" name="SDescription" id="SDesc" rows="3"></textarea>
                </div>
                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input class="form-control" id="image" name="imageP" type="file" />
                </div>
                <center><button type="submit" name="create" class="btn btn-primary">Ajouter</button></center>
            </form>
        </div>
    </div>
</div>
<?php include "../gabarit-bottom.php" ?>