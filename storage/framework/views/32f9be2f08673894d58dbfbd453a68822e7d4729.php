<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve(['assets' => $assets ?? []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="restaurant-content">
        <div class="header-section">
            <h1>Restaurant Information</h1>
            <a href="<?php echo e(route('restaurants.index')); ?>" class="btn btn-secondary mb-3">
                <i class="fas fa-arrow-left"></i> Return 
            </a>
        </div>

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="restaurant-details">
                    <div class="detail-item">
                        <i class="fas fa-utensils"></i> <strong>Restaurant Name:</strong> <?php echo e($restaurant->name); ?>

                    </div>
                    <div class="detail-item">
                        <i class="fas fa-concierge-bell"></i> <strong>Cuisine Types:</strong> <?php echo e($restaurant->cuisine_type); ?>

                    </div>
                    <div class="detail-item">
                        <i class="fas fa-map-marker-alt"></i> <strong>Address:</strong> <?php echo e(preg_replace('/\s*\(Lat:.*?Lng:.*?\)\s*/', '', $restaurant->address)); ?>

                    </div>

                    <div class="detail-item">
                        <i class="fas fa-image"></i> <strong>Restaurant Image :</strong>
                    </div>
                    <?php if($restaurant->restaurant_image): ?>
                        <div class="image-container">
                            <img src="<?php echo e(asset('photos/' . $restaurant->restaurant_image)); ?>" alt="Restaurant Image" class="restaurant-image rounded">
                        </div>
                    <?php else: ?>
                        <div class="image-container">
                            <p>No Image Available</p>
                        </div>
                    <?php endif; ?>

                    <div class="detail-item">
                        <i class="fas fa-book-open"></i> <strong>Menus:</strong>
                    </div>
                    <?php if($restaurant->menus->isNotEmpty()): ?>
                        <div class="image-container">
                            <?php $__currentLoopData = $restaurant->menus; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $menu): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="menu-item">
                                    <img src="<?php echo e(asset('photos/' . $menu->photo)); ?>" alt="Menu Image" class="restaurant-image rounded">
                                </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    <?php else: ?>
                        <div class="image-container">
                            <p>No menu Available</p>
                            <a href="<?php echo e(route('menus.create', ['restaurant_id' => $restaurant->id])); ?>" class="btn btn-primary mt-2">
                                <i class="fas fa-plus"></i> Create Menu
                            </a>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="action-buttons mt-4">
                    <a href="<?php echo e(route('restaurants.edit', $restaurant->id)); ?>" class="btn btn-warning">
                        <i class="fas fa-edit"></i> Update
                    </a>
                    <form action="<?php echo e(route('restaurants.destroy', $restaurant->id)); ?>" method="POST" style="display:inline;">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce restaurant ?');">
                            <i class="fas fa-trash"></i> Delete
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        .restaurant-content {
            margin: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
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
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            background-color: #fff;
        }

        .card-body {
            display: flex;
            flex-direction: column;
        }

        .restaurant-details {
            margin-bottom: 20px;
        }

        .detail-item {
            margin-bottom: 1rem;
            font-size: 1.1rem;
            color: #555;
            display: flex;
            align-items: center;
        }

        .detail-item i {
            margin-right: 10px;
            color: #007bff;
        }

        .detail-item strong {
            color: #333;
            margin-right: 5px;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            margin-right: 5px;
        }

        .btn-secondary i {
            margin-right: 5px;
        }

        .image-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 1rem 0;
        }

        .restaurant-image {
            max-width: 100%;
            height: auto;
            width: 500px; /* Increased width for larger images */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin: 10px 0; /* Spacing between menu images */
        }

        .action-buttons {
            display: flex;
            justify-content: flex-start;
            gap: 10px;
        }

        .btn-warning, .btn-danger {
            display: flex;
            align-items: center;
        }

        .btn-warning i, .btn-danger i {
            margin-right: 5px;
        }
    </style>

    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH C:\projects\tourism\resources\views/restaurants/show.blade.php ENDPATH**/ ?>