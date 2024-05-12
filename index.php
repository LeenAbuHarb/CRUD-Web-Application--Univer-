<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Application</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/js/bootstrap.bundle.min.js"></script>
    <style>
        body{
            background-image: url(img/depositphotos_151897610-stock-photo-product-showscase-spotlight-background-crisp.jpg);
            background-repeat: no-repeat; 
            background-size: cover; 
            background-position: center; 
            height: 100vh;
        }
    </style>
</head>

<body>
<!-- Add New Item Modal Start -->
    <div class="modal fade" tabindex="-1" id="addNewItemModal">
        <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Add New Item</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="add-item-form" class="p-2" novalidate>
                <div class="row mb-3 gx-3">
                <div class="col">
                    <input type="text" name="name" class="form-control form-control-lg" placeholder="Enter Name" required>
                    <div class="invalid-feedback">Item is required!</div>
                </div>

                <div class="col">
                    <input type="text" name="Description" class="form-control form-control-lg" placeholder="Enter Description" required>
                    <div class="invalid-feedback">Description is required!</div>
                </div>
                </div>

                <div class="mb-3">
                <input type="number" name="Price" class="form-control form-control-lg" placeholder="Enter Price" required>
                <div class="invalid-feedback">Price is required!</div>
                </div>

                <div class="mb-3">
                <input type="number" name="Quantity" class="form-control form-control-lg" placeholder="Enter Quantity" required>
                <div class="invalid-feedback">Quantity is required!</div>
                </div>

                <div class="mb-3">
                <input type="submit" value="Add Item" class="btn btn-primary btn-block btn-lg" id="add-item-btn">
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>


    <!-- Add New Item Modal End -->

<!-- Edit Item Modal Start -->
<div class="modal fade" tabindex="-1" id="editItemModal">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Edit This Item</h5>
            <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form id="edit-item-form" class="p-2" novalidate>
                <input type="hidden" name="id" id="id">
                <div class="row mb-3 gx-3">
                <div class="col">
                    <input type="text" name="name" id="name" class="form-control form-control-lg" placeholder="Enter Item" required>
                    <div class="invalid-feedback">Itemis required!</div>
                </div>

                <div class="col">
                    <input type="text" name="Description" id="Description" class="form-control form-control-lg" placeholder="Enter Description" required>
                    <div class="invalid-feedback">Description is required!</div>
                </div>
                </div>

                <div class="mb-3">
                <input type="number" name="Price" id="Price" class="form-control form-control-lg" placeholder="Enter Price" required>
                <div class="invalid-feedback">Price is required!</div>
                </div>

                <div class="mb-3">
                <input type="number" name="Quantity" id="Quantity" class="form-control form-control-lg" placeholder="Enter Quantity" required>
                <div class="invalid-feedback">Quantity is required!</div>
                </div>

                <div class="mb-3">
                <input type="submit" value="Update Item" class="btn btn-success btn-block btn-lg" id="edit-item-btn">
                </div>
            </form>
            </div>
        </div>
        </div>
    </div>
    <!-- Edit User Modal End -->
    <div class="container">
        <div class="row mt-4">
        <div class="col-lg-12 d-flex justify-content-between align-items-center">
            <div>
            <h4>All Items in the database!</h4>
            </div>
            <div>
            <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#addNewItemModal">Add New Items</button>
            </div>
        </div>
        </div>
        <hr>
        <div class="row">
        <div class="col-lg-12">
            <div id="showAlert"></div>
        </div>
        </div>
        <div class="row">
        <div class="col-lg-12">
            <div class="table-responsive">
            <table class="table table-striped table-bordered text-center">
                <thead>
                <tr>
                <th>ID</th>
                <th>Items</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Action</th>
                </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
            </div>
        </div>
        </div>
    </div>
    <script src="main.js"></script>
</body>

</html>