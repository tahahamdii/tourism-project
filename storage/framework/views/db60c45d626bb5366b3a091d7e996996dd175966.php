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
        <h1>Créer un Menu</h1>

        <form action="<?php echo e(route('menus.store')); ?>" method="POST" id="menu-form" enctype="multipart/form-data">
            <?php echo csrf_field(); ?>

            <?php if(request()->has('restaurant_id')): ?>
                <input type="hidden" name="restaurant_id" value="<?php echo e(request()->get('restaurant_id')); ?>">
            <?php else: ?>
                <div class="mb-3">
                    <label for="restaurant_id" class="form-label">Restaurant</label>
                    <select name="restaurant_id" id="restaurant_id" class="form-select" required>
                        <option value="" disabled selected>Select Restaurant</option>
                        <?php $__currentLoopData = $restaurants; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $restaurant): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($restaurant->id); ?>"><?php echo e($restaurant->name); ?></option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                </div>
            <?php endif; ?>

            <div class="mb-3">
                <label for="menu_image" class="form-label">Menu Image</label>
                <input type="file" name="menu_image" id="menu_image" class="form-control" required onchange="previewImage(event)">
            </div>

            <!-- Aperçu de l'image -->
            <div class="mb-3 image-preview-container">
                <img id="image_preview" src="#" alt="Aperçu de l'image" style="display:none;">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-primary">Create</button>
                <a href="<?php echo e(route('menus.index')); ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <style>
        .restaurant-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }

        .btn-secondary {
            margin-bottom: 10px;
        }

        /* Style pour centrer l'image */
        .image-preview-container {
            text-align: center; /* Centrer horizontalement */
            margin-top: 20px;
        }

        #image_preview {
            max-width: 100%; /* Adapter à la taille du conteneur */
            max-height: 400px; /* Limiter la hauteur à 400px */
            border: 1px solid #ddd; /* Bordure pour l'aperçu */
            padding: 10px;
            border-radius: 5px;
            background-color: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Ajout d'une légère ombre */
        }
    </style>

    <script>
        function previewImage(event) {
            var reader = new FileReader();
            var imagePreview = document.getElementById('image_preview');
            
            reader.onload = function() {
                if (reader.readyState == 2) {
                    imagePreview.src = reader.result;
                    imagePreview.style.display = 'block'; // Afficher l'image
                }
            }
            
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH C:\projects\tourism\resources\views/menus/create.blade.php ENDPATH**/ ?>