<aside class="sidebar sidebar-default navs-rounded-all">
    <div class="sidebar-header d-flex align-items-center justify-content-start">
        <a href="<?php echo e(route('dashboard')); ?>" class="navbar-brand">
            <img src="<?php echo e(asset('images/favicon.ico')); ?>" alt="Icon" width="30" class="text-primary" />

            <h4 class="logo-title"><?php echo e(env('APP_NAME')); ?></h4>
        </a>
        <div class="sidebar-toggle" data-toggle="sidebar" data-active="true">
            <i class="icon">
                <svg width="20" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M4.25 12.2744L19.25 12.2744" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                    <path d="M10.2998 18.2988L4.2498 12.2748L10.2998 6.24976" stroke="currentColor" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>
            </i>
        </div>
    </div>
    <div class="sidebar-body pt-0 data-scrollbar">
        <div class="sidebar-list" id="sidebar">
        <?php echo $__env->make('partials.dashboard.vertical-nav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?> 
        </div>
    </div>
    <div class="sidebar-footer"></div>
</aside><?php /**PATH C:\projects\tourism\resources\views/partials/dashboard/_body_sidebar.blade.php ENDPATH**/ ?>