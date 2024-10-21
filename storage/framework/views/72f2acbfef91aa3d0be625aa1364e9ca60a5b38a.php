

<?php $__env->startSection('content'); ?> <!-- Start content section -->
   
   <div class="accommodations-content">
        <h1>Accommodations</h1>

        <!-- Table to display the list of accommodations -->
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nom</th>
                <th>Adresse</th>
                <th>Prix par nuit</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <?php $__currentLoopData = $accommodations; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $accommodation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($accommodation->id); ?></td>
                    <td>
                        <a href="<?php echo e(route('accommodations.show', $accommodation)); ?>"><?php echo e($accommodation->name); ?></a>
                    </td>
                    <td><?php echo e($accommodation->address); ?></td>
                    <td><?php echo e($accommodation->price_per_night); ?> $</td>
                    <td>
                        <!-- Button to edit the accommodation -->
                        <a class="btn btn-warning btn-sm">Make Reservation</a>

                        
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
    </div>
    <?php $__env->stopSection(); ?> <!-- End content section -->

    <style>
        .accommodations-content {
            margin: 20px;
            padding: 20px;
            border: 1px solid #ddd;
            background-color: #f9f9f9;
            border-radius: 5px;
        }
    </style>

<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\tourism\resources\views/accommodations/user.blade.php ENDPATH**/ ?>