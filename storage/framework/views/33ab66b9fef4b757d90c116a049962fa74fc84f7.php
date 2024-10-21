

<?php $__env->startSection('content'); ?> <!-- Start content section -->

<div class="restaurant-content">
    <div class="header-section">
        <h1>Restaurants</h1>
    </div>

    <?php if(session('success')): ?>
        <div class="alert alert-success">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="row">
        <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="col-md-4 mb-4"> <!-- Adjust the column size as needed -->
                <div class="card h-100 shadow-sm"> <!-- Add h-100 class to make all cards the same height -->
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title"><?php echo e($restaurant->name); ?></h5>
                        <h6 class="card-subtitle mb-2 text-muted"><?php echo e($restaurant->cuisine_type); ?></h6>
                        <div class="restaurant-image mb-3">
                            <?php if($restaurant->restaurant_image): ?>
                                <img src="<?php echo e(asset('photos/' . $restaurant->restaurant_image)); ?>" alt="Restaurant Image" class="img-fluid fixed-size-image rounded">
                            <?php else: ?>
                                <p>No image Available</p>
                            <?php endif; ?>
                        </div>
                        <p class="card-text"><?php echo e(preg_replace('/.*?,\s*([^,]+),\s*.*$/', '$1', $restaurant->address)); ?></p>
                        
                    </div>
                </div>
            </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<?php $__env->stopSection(); ?> <!-- End content section -->

<style>
    .restaurant-content {
        margin: 20px;
        padding: 20px;
        background-color: #f9f9f9;
        border-radius: 5px;
    }

    .header-section {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 20px;
    }

    .header-section h1 {
        margin: 0;
        font-size: 2rem;
        color: #333;
    }

    .card {
        border: none;
        border-radius: 10px;
        transition: transform 0.3s, box-shadow 0.3s;
    }

    .card:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
    }

    .btn {
        margin-right: 5px;
    }

    .btn i {
        margin-right: 5px;
    }

    .fixed-size-image {
        width: 100%;
        height: 200px;
        object-fit: cover;
    }

    .alert {
        margin-bottom: 20px;
    }
</style>

<!-- Font Awesome for icons -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\tourism\resources\views/restaurants/user.blade.php ENDPATH**/ ?>