<?php
include '../includes/db.php';

// Fetch all users
$query = 'SELECT * FROM users';
$stmt = $pdo->prepare($query);
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="d-flex">
    <?php include '../includes/sidebar.php' ?>
    <div class="container mt-5" style="padding-bottom: 175px;">
        <h2>Manage Users</h2>
        <button class="btn btn-primary mb-3" id="createUserBtn">Add New User</button>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Address</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): 
                    if ($user['state'] == 1) {?>
                    <tr>
                        <td><?php echo $user['user_id']; ?></td>
                        <td><?php echo $user['user_name']; ?></td>
                        <td><?php echo $user['user_mobile']; ?></td>
                        <td><?php echo $user['user_email']; ?></td>
                        <td><?php echo $user['user_address']; ?></td>
                        <td>
                            <button class="btn btn-warning editUserBtn" data-id="<?php echo $user['user_id']; ?>">Edit</button>
                            <button class="btn btn-danger deleteUserBtn" data-id="<?php echo $user['user_id']; ?>">Delete</button>
                        </td>
                    </tr>
                <?php } endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal Template for SweetAlert2 -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        // Create User
        $('#createUserBtn').click(function() {
            Swal.fire({
                title: 'Create User',
                html: `<input type="text" id="user_name" class="swal2-input" placeholder="User Name">
               <input type="text" id="user_mobile" class="swal2-input" placeholder="Mobile">
               <input type="email" id="user_email" class="swal2-input" placeholder="Email">
               <textarea id="user_address" class="swal2-textarea" placeholder="Address"></textarea>`,
                confirmButtonText: 'Create',
                focusConfirm: false,
                preConfirm: () => {
                    const user_name = $('#user_name').val();
                    const user_mobile = $('#user_mobile').val();
                    const user_email = $('#user_email').val();
                    const user_address = $('#user_address').val();
                    if (!user_name || !user_mobile || !user_email || !user_address) {
                        Swal.showValidationMessage(`Please enter all fields`);
                    }
                    return {
                        user_name,
                        user_mobile,
                        user_email,
                        user_address
                    }
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post('../feature/create_user.php', result.value, function(response) {
                        if (response.status === 'success') {
                            Swal.fire({
                                icon: 'success',
                                title: response.message || 'User created successfully',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                location.reload(); // Reload the page to show the new user
                            });
                        } else {
                            Swal.fire('Error', response.message || 'Failed to create user', 'error');
                        }
                    }, 'json');
                }
            });
        });

        // Edit User
        $('.editUserBtn').click(function() {
            const userId = $(this).data('id');

            $.get('../feature/get_user.php', {
                id: userId
            }, function(user) {
                Swal.fire({
                    title: 'Edit User',
                    html: `
                <input type="text" id="user_name" class="swal2-input" value="${user.user_name}" placeholder="User Name">
                <input type="text" id="user_mobile" class="swal2-input" value="${user.user_mobile}" placeholder="Mobile">
                <input type="email" id="user_email" class="swal2-input" value="${user.user_email}" placeholder="Email">
                <textarea id="user_address" class="swal2-textarea" placeholder="Address">${user.user_address}</textarea>
            `,
                    confirmButtonText: 'Update',
                    focusConfirm: false,
                    preConfirm: () => {
                        const user_name = $('#user_name').val();
                        const user_mobile = $('#user_mobile').val();
                        const user_email = $('#user_email').val();
                        const user_address = $('#user_address').val();

                        if (!user_name || !user_mobile || !user_email || !user_address) {
                            Swal.showValidationMessage(`Please fill in all fields`);
                            return false;
                        }

                        return {
                            user_name,
                            user_mobile,
                            user_email,
                            user_address,
                            id: userId
                        };
                    }
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.post('../feature/edit_user.php', result.value, function(response) {
                            // Success SweetAlert and page reload
                            Swal.fire({
                                icon: 'success',
                                title: 'User updated successfully!',
                                confirmButtonText: 'OK'
                            }).then(() => {
                                // Reload the page after closing the alert
                                location.reload();
                            });
                        }, 'json');
                    }
                });
            }, 'json');
        });


        // Delete User
        $('.deleteUserBtn').click(function() {
            const userId = $(this).data('id');
            Swal.fire({
                title: 'Are you sure?',
                text: "This action cannot be undone!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.post('../feature/delete_user.php', {
                        id: userId
                    }, function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: response.message || 'User deleted successfully',
                            confirmButtonText: 'OK'
                        }).then(() => {
                            location.reload(); // Reload after deletion
                        });
                    });
                }
            });
        });
    });
</script>
<?php include ("../includes/footer.php") ?>