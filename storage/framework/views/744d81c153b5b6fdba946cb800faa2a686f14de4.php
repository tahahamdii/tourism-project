<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve(['assets' => $assets ?? []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="container">
        <h1 class="text-center my-4">Add Trip</h1>

        <form action="<?php echo e(route('tours.store')); ?>" method="POST">
            <?php echo csrf_field(); ?>

            <div class="mb-3">
                <label for="title" class="form-label">Name</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            

            <div class="mb-3">
                <label for="date" class="form-label">Date</label>
                <input type="date" name="date" id="date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="duration" class="form-label">Duration (heures)</label>
                <input type="number" name="duration" id="duration" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Prix</label>
                <input type="number" name="price" id="price" class="form-control" required>
            </div>
            <div class="mb-3">
                     <label for="nb_place" class="form-label">Available Seats</label>
                    <input type="number" name="nb_place" id="nb_place" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea name="description" id="description" class="form-control" rows="4" required></textarea>
            </div>

            <div class="mb-3 text-center">
                <button type="submit" class="btn btn-primary">Add</button>
                <a href="<?php echo e(route('tours.index')); ?>" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>

    <style>
        .container {
            margin-top: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>
 <?php echo $__env->renderComponent(); ?>
<?php endif; ?>
<?php if (isset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da)): ?>
<?php $component = $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da; ?>
<?php unset($__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da); ?>
<?php endif; ?>
<?php /**PATH C:\projects\tourism\resources\views/tours/create.blade.php ENDPATH**/ ?>