

<?php $__env->startSection('content'); ?> <!-- Start content section -->
<div class="events-content">
    <h1>Events</h1>

    <!-- Table to display the list of events -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Date</th>
                <th>Location</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e($event->id); ?></td>
                    <td>
                        <a href="<?php echo e(route('events.show', $event)); ?>"><?php echo e($event->name); ?></a>
                    </td>
                    <td class="text-wrap"><?php echo e($event->description); ?></td> <!-- Add class for word wrapping -->
                    <td><?php echo e(\Carbon\Carbon::parse($event->date)->format('d-m-Y')); ?></td>
                    <td class="text-wrap"><?php echo e($event->getAddress()); ?></td> <!-- Use the getAddress method -->
                    <td>
                        <!-- Button to edit the event -->
                        <a class="btn btn-warning btn-sm">Participate</a>

                        
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?> <!-- End content section -->


<style>
    .events-content {
        margin: 20px;
        padding: 20px;
        border: 1px solid #ddd;
        background-color: #f9f9f9;
        border-radius: 5px;
    }

    /* Add styles for word wrapping */
    .text-wrap {
        white-space: normal; /* Allows text to wrap */
        word-wrap: break-word; /* Breaks long words */
        max-width: 200px; /* Set a maximum width for the cell */
    }

    /* Optional: Adjust the table to handle overflow better */
    table {
        table-layout: auto; /* Let the browser decide the layout */
        width: 100%; /* Full width */
    }
</style>
<?php echo $__env->make('layouts.navbar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\projects\tourism\resources\views/events/user.blade.php ENDPATH**/ ?>