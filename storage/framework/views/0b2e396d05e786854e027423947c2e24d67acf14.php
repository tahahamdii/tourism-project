<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve(['assets' => $assets ?? []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="tours-content">
        <h1>Available Trips</h1>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        <a href="<?php echo e(route('tours.create')); ?>" class="btn btn-primary mb-3 mt-3">Add a Trip</a>

        <!-- Table to display the list of trips -->
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Duration (hours)</th>
                    <th>Price (€)</th>
                    <th>Seats Available</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php $__currentLoopData = $tours; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tour): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($tour->id); ?></td>
                        <td>
                            <a href="<?php echo e(route('tours.show', $tour)); ?>"><?php echo e($tour->title); ?></a>
                        </td>
                        <td><?php echo e($tour->description); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($tour->date)->format('d-m-Y')); ?></td>
                        <td><?php echo e($tour->duration); ?></td>
                        <td><?php echo e(number_format($tour->price, 2, ',', ' ')); ?> €</td>
                        <td><?php echo e($tour->nb_place); ?></td>
                        <td>
                            <!-- Buttons for actions: update, delete, share -->
                            <a href="<?php echo e(route('tours.edit', $tour)); ?>" class="btn btn-warning btn-sm">Update Trip</a>

                            <form action="<?php echo e(route('tours.destroy', $tour)); ?>" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this trip?');">
                                <?php echo csrf_field(); ?>
                                <?php echo method_field('DELETE'); ?>
                                <button type="submit" class="btn btn-danger btn-sm">Delete Trip</button>
                            </form>

                            <!-- Example of a social share button -->
                            <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo e(urlencode(route('tours.show', $tour->id))); ?>" class="btn btn-primary btn-sm" target="_blank">Share on Facebook</a>
                        </td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <!-- Pagination for large lists -->
        <?php echo e($tours->links()); ?>

    </div>

    <style>
        .tours-content {
            margin: 20px;
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
<?php /**PATH C:\projects\tourism\resources\views/tours/index.blade.php ENDPATH**/ ?>