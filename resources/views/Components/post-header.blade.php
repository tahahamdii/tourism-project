<header class="page-header page-header-dark" style="background-color: #e1c5eb; padding: 10px 0; margin-bottom: 10px;"> <!-- Changed background color to orange and adjusted padding and margin -->
    <div style="color: pink" class="page-header-content">
        <div style="background-color: #713d6e; color: rgb(209, 190, 190)" style="color: pink" class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10 text-center">
                    <h1 class="page-header-title">Welcome to our Project</h1>
                    <p class="page-header-text mb-5">Her You Will Found All Programming Language!...</p>
                    <form class="page-header-signup mb-2 mb-md-0" action="#" method="GET">
                        <div class="form-row justify-content-center">
                            <div class="col-lg-6 col-md-8">
                                <div class="form-group mr-0 mr-lg-2"><input name="search" class="form-control form-control-solid rounded-pill" type="text" placeholder="Search keyword..." /></div>
                            </div>
                            <div class="col-lg-3 col-md-4"><button style="background-color: #713d6e; color: rgb(209, 190, 190)" class="btn btn-teal btn-block btn-marketing rounded-pill" type="submit">Search</button></div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="svg-border-waves text-white">
        <svg class="wave" style="pointer-events: none" fill="currentColor" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg" xlink="http://www.w3.org/1999/xlink" viewBox="0 0 1920 75">
            <defs>
                <style>
                    .a {
                        fill: none;
                    }

                    .b {
                        clip-path: url(#a);
                    }

                    .d {
                        opacity: 0.5;
                        isolation: isolate;
                    }
                </style>
                <clipPath id="a"><rect class="a" width="1920" height="75" /></clipPath>
            </defs>
            <title>wave</title>
            <g class="b"><path class="c" d="M1963,327H-105V65A2647.49,2647.49,0,0,1,431,19c217.7,3.5,239.6,30.8,470,36,297.3,6.7,367.5-36.2,642-28a2511.41,2511.41,0,0,1,420,48" /></g>
            <g class="b"><path class="d" d="M-127,404H1963V44c-140.1-28-343.3-46.7-566,22-75.5,23.3-118.5,45.9-162,64-48.6,20.2-404.7,128-784,0C355.2,97.7,341.6,78.3,235,50,86.6,10.6-41.8,6.9-127,10" /></g>
            <g class="b"><path class="d" d="M1979,462-155,446V106C251.8,20.2,576.6,15.9,805,30c167.4,10.3,322.3,32.9,680,56,207,13.4,378,20.3,494,24" /></g>
            <g class="b"><path class="d" d="M1998,484H-243V100c445.8,26.8,794.2-4.1,1035-39,141-20.4,231.1-40.1,378-45,349.6-11.6,636.7,73.8,828,150" /></g>
        </svg>
    </div>
</header>



<form method="POST" action="{{ route('posts.store') }}" style="width: 100%; max-width: 1000px; margin: 0 auto; padding: 20px; background-color: #f7e4f4; border-radius: 5px;">
    @csrf
    <div style="display: grid; grid-template-rows: auto auto; row-gap: 10px;">
        <div style="display: flex; gap: 10px;">
            <input type="text" name="title" placeholder="Title" style="flex-grow: 1; padding: 10px; border: 1px solid #f7e4f4; border-radius: 3px; font-size: 16px;">
            <input type="text" name="category_id" placeholder="Category number" style="flex-grow: 1; padding: 10px; border: 1px solid #f7e4f4; border-radius: 3px; font-size: 16px;">
            <input type="text" name="user_id" placeholder="User ID" style="flex-grow: 1; padding: 10px; border: 1px solid #f7e4f4; border-radius: 3px; font-size: 16px;">
        </div>
        <textarea name="description" placeholder="Description" style="width: 100%; height: 100px; padding: 10px; border: 1px solid #f7e4f4; border-radius: 3px; font-size: 16px;"></textarea>
    </div>
    <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;"> <!-- Increased margin-top to create more space -->
        <button type="submit" style="background-color: #713d6e; color: rgb(209, 190, 190); padding: 10px 20px; border: none; border-radius: 3px; cursor: pointer; font-size: 16px;">Add Post</button>
        <div style="width: 20px;"></div> <!-- Adjusted width of the empty div to increase space -->
        <button type="reset" style="background-color: #713d6e; color: rgb(209, 190, 190); padding: 10px 20px; border: none; border-radius: 3px; cursor: pointer; font-size: 16px;">Reset</button>
    </div>
</form>




