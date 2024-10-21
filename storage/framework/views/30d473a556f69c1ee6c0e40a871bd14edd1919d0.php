<?php if (isset($component)) { $__componentOriginal8e2ce59650f81721f93fef32250174d77c3531da = $component; } ?>
<?php $component = App\View\Components\AppLayout::resolve(['assets' => $assets ?? []] + (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag ? (array) $attributes->getIterator() : [])); ?>
<?php $component->withName('app-layout'); ?>
<?php if ($component->shouldRender()): ?>
<?php $__env->startComponent($component->resolveView(), $component->data()); ?>
<?php if (isset($attributes) && $attributes instanceof Illuminate\View\ComponentAttributeBag && $constructor = (new ReflectionClass(App\View\Components\AppLayout::class))->getConstructor()): ?>
<?php $attributes = $attributes->except(collect($constructor->getParameters())->map->getName()->all()); ?>
<?php endif; ?>
<?php $component->withAttributes([]); ?>
    <div class="guides-content container-fluid">
        <h1 class="text-center mb-4">Liste des Guides</h1>
        <a href="<?php echo e(route('guides.create')); ?>" class="btn btn-primary mb-3">Créer un Guide</a>

        <!-- Tableau pour afficher la liste des guides -->
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nom</th>
                        <th>Années d'Expérience</th>
                        <th>Email</th>
                        <th>Téléphone</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $__currentLoopData = $guides; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $guide): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr>
                            <td><?php echo e($guide->id); ?></td>
                            <td><a href="<?php echo e(route('guides.show', $guide->id)); ?>"><?php echo e($guide->name); ?></a></td>
                            <td><?php echo e($guide->experience_years); ?></td>
                            <td><?php echo e($guide->email); ?></td>
                            <td><?php echo e($guide->phone); ?></td>
                            <td>
                                <?php if($guide->image): ?>
                                    <img src="<?php echo e(asset('storage/' . $guide->image)); ?>" alt="Image du Guide" class="img-fluid" style="max-width: 100px;">
                                <?php else: ?>
                                    Pas d'image
                                <?php endif; ?>
                            </td>
                            <td>
                                <!-- Bouton pour modifier le guide -->
                                <a href="<?php echo e(route('guides.edit', $guide->id)); ?>" class="btn btn-warning btn-sm">Modifier</a>

                                <!-- Formulaire pour supprimer le guide -->
                                <form action="<?php echo e(route('guides.destroy', $guide->id)); ?>" method="POST" style="display:inline-block;">
                                    <?php echo csrf_field(); ?>
                                    <?php echo method_field('DELETE'); ?>
                                    <button type="submit" class="btn btn-danger btn-sm">Supprimer</button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </tbody>
            </table>
        </div>
    </div>

    <style>
        .guides-content {
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
<?php /**PATH C:\projects\tourism\resources\views/guide/index.blade.php ENDPATH**/ ?>