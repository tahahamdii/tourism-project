<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <title><?php echo $__env->yieldContent('title', 'Eco Tour'); ?></title>
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
        }

        .navbar {
            background-color: #3d8d3d; /* Green theme */
            padding: 15px 20px;
        }

        .navbar-brand, .nav-link {
            color: #fff !important;
            font-weight: bold;
        }

        .navbar-toggler {
            border-color: #fff;
        }

        .navbar-light .navbar-toggler-icon {
            background-image: url("data:image/svg+xml;charset=utf8,%3Csvg viewBox='0 0 30 30' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath stroke='rgba%28255, 255, 255, 0.9%29' stroke-width='2' stroke-linecap='round' stroke-miterlimit='10' d='M4 7h22M4 15h22M4 23h22'/%3E%3C/svg%3E");
        }

        .home-content {
            padding: 50px;
            max-width: 100%;
        }

        .btn-primary {
            background-color: #4CAF50;
            border-color: #4CAF50;
        }

        .btn-primary:hover {
            background-color: #45a049;
            border-color: #45a049;
        }

        .btn-reservation {
            background-color: #4CAF50;
            padding: 8px 16px;
            border-radius: 5px;
            color: white;
            font-size: 0.9rem;
            text-transform: uppercase;
            transition: background-color 0.3s;
        }

        .btn-reservation:hover {
            background-color: #45a049;
        }

        footer {
            background-color: #4CAF50;
            padding: 20px 0;
            color: white;
            text-align: center;
            position: absolute;
            bottom: 0;
            width: 100%;
        }

        .nav-link:hover {
            color: #d4f7d0 !important;
        }

        .logo-title {
            color: #fff;
            font-size: 24px;
            font-weight: bold;
            text-transform: uppercase;
        }
        
        h1, h2, h3, h4, h5, h6 {
            color: #333;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand" href="#">
            <h5 class="logo-title d-inline-block ml-2">Eco Tour</h5>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item"><a class="nav-link" href="/user/restaurant">Restaurants</a></li>
                <li class="nav-item"><a class="nav-link" href="/user/events">Events</a></li>
                <li class="nav-item"><a class="nav-link" href="/user/hotels">Hotels</a></li>
                <li class="nav-item"><a class="nav-link" href="/user/tours">Tours</a></li>
                <li class="nav-item">
                    <form method="POST" action="<?php echo e(route('logout')); ?>">
                        <?php echo csrf_field(); ?>
                        <a href="javascript:void(0)" class="nav-link" onclick="event.preventDefault(); this.closest('form').submit();">
                            <?php echo e(__('Log out')); ?>

                        </a>
                    </form>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container home-content">
        <?php echo $__env->yieldContent('content'); ?>
    </div>

   

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
<?php /**PATH C:\projects\tourism\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>