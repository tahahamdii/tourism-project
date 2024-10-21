

<?php $__env->startSection('content'); ?> <!-- Start content section -->
    <div class="tours-content">
        <h1>Available Tours</h1>

        <?php if(session('success')): ?>
            <div class="alert alert-success">
                <?php echo e(session('success')); ?>

            </div>
        <?php endif; ?>

        

        <!-- Table to display the list of trips -->
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Date</th>
                    <th>Duration </th>
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
                            <a href="#"><?php echo e($tour->title); ?></a>
                        </td>
                        <td><?php echo e($tour->description); ?></td>
                        <td><?php echo e(\Carbon\Carbon::parse($tour->date)->format('d-m-Y')); ?></td>
                        <td><?php echo e($tour->duration); ?></td>
                        <td><?php echo e(number_format($tour->price, 2, ',', ' ')); ?> €</td>
                        <td><?php echo e($tour->nb_place); ?></td>
                        <td>
                            

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
    <?php $__env->stopSection(); ?> <!-- End content section -->

    <style>
        .tours-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>

<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\tourism\resources\views/tours/user.blade.php ENDPATH**/ ?>