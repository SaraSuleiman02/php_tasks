<?php
include '../includes/db.php';
include '../includes/header.php';
?>

<!-- Animated Header -->
<div class="container text-center" style="margin-top: 122px; margin-bottom: 250px;">
    <h1 class="animated-header">Welcome to Our E-Commerce Shop</h1>
    <p class="lead">Discover a wide range of products and enjoy seamless shopping with us.</p>

    <!-- Call to Action Button -->
    <button id="shopNowBtn" class="btn btn-primary mt-4">Shop Now!</button>
</div>

<!-- Add SweetAlert2 for pop-up login -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    document.getElementById('shopNowBtn').addEventListener('click', function() {
        Swal.fire({
            title: 'Login or Register',
            text: "Please login or register to start shopping!",
            icon: 'info',
            showCancelButton: true,
            confirmButtonText: 'Login',
            cancelButtonText: 'Register',
            allowOutsideClick: false
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect to login page
                window.location.href = 'login.php';
            } else if (result.dismiss === Swal.DismissReason.cancel) {
                // Redirect to registration page
                window.location.href = 'register.php';
            }
        });
    });
</script>

<?php include '../includes/footer.php'; ?>