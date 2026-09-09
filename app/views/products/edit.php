<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 40px; }
        .form-container { width: 400px; }
        .form-group { margin-bottom: 15px; }
        .form-group label { display: block; margin-bottom: 5px; }
        .form-group input, .form-group textarea { width: 100%; padding: 8px; box-sizing: border-box; }
        .btn-submit { background: #007bff; color: white; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer; }
        .btn-cancel { color: #6c757d; text-decoration: none; margin-left: 10px; }
    </style>
</head>
<body>

    <div class="form-container">
        <h2>Edit Product</h2>

        <form action="/products/update/<?= htmlspecialchars($product['id']); ?>" method="POST">
            <div class="form-group">
                <label for="product_name">Product Name</label>
                <input type="text" id="product_name" name="product_name" value="<?= htmlspecialchars($product['product_name']); ?>" required>
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <textarea id="description" name="description" rows="4"><?= htmlspecialchars($product['description']); ?></textarea>
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="number" id="price" step="0.01" name="price" value="<?= htmlspecialchars($product['price']); ?>" required>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" id="quantity" name="quantity" value="<?= htmlspecialchars($product['quantity']); ?>" required>
            </div>

            <button type="submit" class="btn-submit">Update Product</button>
            <a href="/products" class="btn-cancel">Cancel</a>
        </form>
    </div>

</body>
</html>