<?php
include '../includes/db.php';
include '../includes/header.php';

// Fetch all categories
$query = "SELECT * FROM category";
$stmt = $pdo->prepare($query);
$stmt->execute();
$categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="container mt-5">
    <h2>Manage Categories</h2>
    <button class="btn btn-primary mb-3" id="addCategoryBtn">Add New Category</button>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category Name</th>
                <th>Category Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?php echo $category['category_id']; ?></td>
                    <td><?php echo $category['category_name']; ?></td>
                    <td><?php echo $category['category_description']; ?></td>
                    <td>
                        <button class="btn btn-warning editCategoryBtn" data-id="<?php echo $category['category_id']; ?>" data-name="<?php echo $category['category_name']; ?>" data-description="<?php echo $category['category_description']; ?>">Edit</button>
                        <button class="btn btn-danger deleteCategoryBtn" data-id="<?php echo $category['category_id']; ?>">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Create Category Button Click
        document.getElementById('addCategoryBtn').addEventListener('click', function() {
            Swal.fire({
                title: 'Add New Category',
                html: `<input type="text" id="categoryName" class="swal2-input" placeholder="Category Name">
                   <textarea id="categoryDescription" class="swal2-textarea" placeholder="Category Description"></textarea>`,
                confirmButtonText: 'Add',
                showCancelButton: true,
                preConfirm: () => {
                    const name = document.getElementById('categoryName').value;
                    const description = document.getElementById('categoryDescription').value;
                    if (!name || !description) {
                        Swal.showValidationMessage('Please enter both name and description');
                        return;
                    }
                    return {
                        name: name,
                        description: description
                    };
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    // AJAX Request to Create Category
                    const formData = new FormData();
                    formData.append('name', result.value.name);
                    formData.append('description', result.value.description);

                    fetch('../feature/create_category.php', {
                            method: 'POST',
                            body: formData
                        })
                        .then(response => response.json())
                        .then(data => {
                            if (data.status === 'success') {
                                Swal.fire('Category Added!', '', 'success').then(() => location.reload());
                            } else {
                                Swal.fire('Error', data.message, 'error');
                            }
                        });
                }
            });
        });

        // Edit Category Button Click
        document.querySelectorAll('.editCategoryBtn').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');
                const name = this.getAttribute('data-name');
                const description = this.getAttribute('data-description');

                Swal.fire({
                    title: 'Edit Category',
                    html: `<input type="text" id="categoryName" class="swal2-input" value="${name}">
                       <textarea id="categoryDescription" class="swal2-textarea">${description}</textarea>`,
                    confirmButtonText: 'Update',
                    showCancelButton: true,
                    preConfirm: () => {
                        const updatedName = document.getElementById('categoryName').value;
                        const updatedDescription = document.getElementById('categoryDescription').value;
                        if (!updatedName || !updatedDescription) {
                            Swal.showValidationMessage('Please enter both name and description');
                            return;
                        }
                        return {
                            name: updatedName,
                            description: updatedDescription
                        };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        // AJAX Request to Edit Category
                        const formData = new FormData();
                        formData.append('id', id);
                        formData.append('name', result.value.name);
                        formData.append('description', result.value.description);

                        fetch('../feature/edit_category.php', {
                                method: 'POST',
                                body: formData
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.status === 'success') {
                                    Swal.fire('Category Updated!', '', 'success').then(() => location.reload());
                                } else {
                                    Swal.fire('Error', data.message, 'error');
                                }
                            });
                    }
                });
            });
        });

        // Delete Category Button Click
        document.querySelectorAll('.deleteCategoryBtn').forEach(button => {
            button.addEventListener('click', function() {
                const id = this.getAttribute('data-id');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // AJAX Request to Delete Category
                        const formData = new FormData();
                        formData.append('id', id);

                        fetch('../feature/delete_category.php', {
                                method: 'POST',
                                body: formData
                            })
                            .then(response => response.json())
                            .then(data => {
                                if (data.status === 'success') {
                                    Swal.fire('Deleted!', 'Your category has been deleted.', 'success').then(() => location.reload());
                                } else {
                                    Swal.fire('Error', data.message, 'error');
                                }
                            });
                    }
                });
            });
        });
    });
</script>

<?php include("../includes/footer.php") ?>