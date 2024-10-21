<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve(['assets' => $assets ?? []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="edit-menu-content">
        <h1>Modifier le Menu</h1>

        <form action="<?php echo e(route('menus.update', $menu->id)); ?>" method="POST" id="menu-form" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>
            <?php echo method_field('PUT'); ?>

            <div class="mb-3">
                <label for="restaurant_id" class="form-label"><strong>Restaurant:</strong></label>
                <select name="restaurant_id" id="restaurant_id" class="form-select" required>
                    <option value="" disabled>Select restaurant</option>
                    <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($restaurant->id); ?>" <?php echo e($menu->restaurant_id == $restaurant->id ? 'selected' : ''); ?>>
                            <?php echo e($restaurant->name); ?>

                        </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="menu_image" class="form-label"><strong>Menu Image:</strong></label>
                <?php if($menu->menu_image): ?>
                    <div class="image-preview mt-3">
                        <img src="<?php echo e(asset('storage/' . $menu->menu_image)); ?>" alt="Menu Image" class="img-fluid img-thumbnail">
                    </div>
                <?php endif; ?>
                <input type="file" name="menu_image" id="menu_image" class="form-control">
            </div>

            <div class="mb-3 button-group">
                <button type="submit" class="btn btn-success">Update</button>
                <a href="<?php echo e(route('menus.index')); ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <style>
        .edit-menu-content {
            margin: 20px;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .edit-menu-content h1 {
            font-size: 2rem;
            color: #333;
            margin-bottom: 20px;
        }

        .form-label {
            font-weight: bold;
            color: #333;
            margin-bottom: 5px;
        }

        .form-control, .form-select {
            border-radius: 5px;
            border: 1px solid #ccc;
            padding: 10px;
            font-size: 1rem;
        }

        .btn-secondary, .btn-success {
            padding: 6px 12px;
            font-size: 0.875rem;
            border-radius: 5px;
            font-weight: bold;
            text-transform: uppercase;
            transition: background-color 0.3s ease;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
            color: #fff;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
            color: #fff;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .button-group {
            display: flex;
            gap: 10px;
        }

        .image-preview {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        .img-thumbnail {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
    </style>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?><?php /**PATH C:\projects\tourism\resources\views/menus/edit.blade.php ENDPATH**/ ?>