<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 30px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f4f4f4; }
        .header-actions { margin-bottom: 20px; }
        .btn-add { background: #28a745; color: white; padding: 8px 12px; text-decoration: none; border-radius: 4px; }
        .btn-logout { background: #dc3545; color: white; padding: 8px 12px; text-decoration: none; border-radius: 4px; float: right; }
        .action-link { text-decoration: none; margin-right: 10px; }
        .edit { color: #007bff; }
        .delete { color: #dc3545; }
    </style>
</head>
<body>

    <a href="/logout" class="btn-logout">Logout</a>
    <h2>Product Management System</h2>

    <div class="header-actions">
        <a href="/products/create" class="btn-add">+ Add New Product</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Product Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Created At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($products)): ?>
                <?php foreach($products as $p): ?>
                    <tr>
                        <td><?= htmlspecialchars($p['id']); ?></td>
                        <td><?= htmlspecialchars($p['product_name']); ?></td>
                        <td><?= htmlspecialchars($p['description']); ?></td>
                        <td>$<?= number_format($p['price'], 2); ?></td>
                        <td><?= htmlspecialchars($p['quantity']); ?></td>
                        <td><?= htmlspecialchars($p['created_at']); ?></td>
                        <td>
                            <a href="/products/edit/<?= $p['id']; ?>" class="action-link edit">Edit</a>
                            <a href="/products/delete/<?= $p['id']; ?>" class="action-link delete" onclick="return confirm('Are you sure you want to delete this product?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="7" style="text-align: center;">No products found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>

</body>
</html>