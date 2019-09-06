<!-- The following has been taken from thebigjob.com.au. We expect to adapt code so that all
scripts can be stored locally. Independence from wordpress will be completed in a later iteration (2 or 3)

Also all links to localhost will be reverted back to thebigjob.com.au-->


<!DOCTYPE html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>The Big Job | Job tips for everyone</title>

    <!-- Bootstrap core CSS -->
    <?php echo $this->Html->css('bootstrap.min.css');?>
    <?php echo $this->Html->css('bootstrap.min1.css');?>
    <?php echo $this->Html->css('magnific-popup.css');?>
    <?php echo $this->Html->css('jquery-ui.css');?>
    <?php echo $this->Html->css('owl.carousel.min.css');?>
    <?php echo $this->Html->css('owl.theme.default.min.css');?>
    <?php echo $this->Html->css('bootstrap-datepicker.css');?>
    <?php echo $this->Html->css('animate.css');?>
    <?php echo $this->Html->css('fl-bigmug-line.css');?>
    <?php echo $this->Html->css('aos.css');?>
    <?php echo $this->Html->css('style1.css');?>


    <!-- Custom fonts for this template -->


    <!-- Custom styles for this template -->
    <style>
    a.login{
    color: lightpink;
}
    </style>
    <link rel="stylesheet" href="font/flaticon/font/flaticon.css">
    <link rel="stylesheet" href="font/icomoon/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito+Sans:200,300,400,700,900|Roboto+Mono:300,400,500">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel='dns-prefetch' href='//v0.wordpress.com'/>
    <style type='text/css'>img#wpstats{display:none}</style><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1" />	<noscript><style>.woocommerce-product-gallery{ opacity: 1 !important; }</style></noscript>
    <link rel="icon" href="https://thebigjob.com.au/wp-content/uploads/2017/12/cropped-lublun-32x32.png" sizes="32x32" />
    <link rel="icon" href="https://thebigjob.com.au/wp-content/uploads/2017/12/cropped-lublun-192x192.png" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="https://thebigjob.com.au/wp-content/uploads/2017/12/cropped-lublun-180x180.png" />
    <meta name="msapplication-TileImage" content="https://thebigjob.com.au/wp-content/uploads/2017/12/cropped-lublun-270x270.png" />
    <link rel="stylesheet" id="et-core-unified-cached-inline-styles" href="https://thebigjob.com.au/wp-content/cache/et/91/et-core-unified-15538543260077.min.css" onerror="et_core_page_resource_fallback(this, true)" onload="et_core_page_resource_fallback(this)" /><!-- ## NXS/OG ## --><!-- ## NXSOGTAGS ## --><!-- ## NXS/OG ## -->
</head>

<body>


<div id="page-container" class="page-container">
        <div id="top-header" style="height: 50px">
            <div class="container">

                <!-- Secondary Nav -->
                <div id="et-secondary-nav" class="">
                </div>

                <!-- #et-info -->
                <div id="et-info">


                    <!-- cart -->
                    <span>
                        <?php if ($this->request->getSession()->read('Auth.User')) { ?>
                        <a style="font-weight:bolder;color: lightpink">Welcome <?= $this->request->getSession()->read('Auth.User.username'); ?>!</a>
                        <?php }?>

                        <?php if ($this->request->getSession()->read('Auth.User')): ?>
                            <?php if ($this->request->getSession()->read('Auth.User.type')=='Candidate'): ?>
                                <a>
                                    <?= $this->Html->link(
                                        'Settings',
                                        ['controller' => 'users', 'action' => 'edit', $this->request->getSession()->read('Auth.User.id')],
                                        ['class' => 'login'])
                                    ?>
                                </a>
                        <a>
                                    <?= $this->Html->link(
                                        'Profile',
                                        ['controller' => 'Candidates', 'action' => 'profile_view', $this->request->getSession()->read('Auth.User.id')],
                                        ['class' => 'login'])
                                    ?>
                                </a>
                            <a><?= $this->Html->link(__('Logout'), ['controller'=>'users','action' => 'logout'],['class'=>'login']) ?></a>
                            <?php elseif($this->request->getSession()->read('Auth.User.type')=='Employer'): ?>
                                <a>
                                    <?= $this->Html->link(
                                        'Dashboard',
                                        ['controller' => 'EmployerAdmin', 'action' => 'index', $this->request->getSession()->read('Auth.User.id')],
                                        ['class' => 'login'])
                                    ?>
                                </a>
                                <a>
                                    <?= $this->Html->link(
                                        'My Profile',
                                        ['controller' => 'users', 'action' => 'edit', $this->request->getSession()->read('Auth.User.id')],
                                        ['class' => 'login'])
                                    ?>
                                </a>
                                <a><?= $this->Html->link(__('Logout'), ['controller'=>'users','action' => 'logout'],['class'=>'login']) ?></a>
                            <?php elseif($this->request->getSession()->read('Auth.User.type')=='Admin'): ?>
                                <a>
                                    <?= $this->Html->link(
                                        'Dashboard',
                                        ['controller' => 'Admin', 'action' => 'index', $this->request->getSession()->read('Auth.User.id')],
                                        ['class' => 'login'])
                                    ?>
                                </a>
                                <a>
                                    <?= $this->Html->link(
                                        'My Profile',
                                        ['controller' => 'users', 'action' => 'edit', $this->request->getSession()->read('Auth.User.id')],
                                        ['class' => 'login'])
                                    ?>
                                </a>
                                <a><?= $this->Html->link(__('Logout'), ['controller'=>'users','action' => 'logout'],['class'=>'login']) ?></a>
                            <?php endif ?>
                        <?php else: ?>
                            <a>
                                <?= $this->Html->link('Login', ['controller' => 'users', 'action' => 'login', '?' => ['redirect' => '/home']], ['class'=>'login']) ?>
                            </a>
                            <a>
                                &
                            </a>
                            <a>
                                <?= $this->Html->link('Register', ['controller' => 'users', 'action' => 'register', '?' => ['redirect' => '/home']], ['class'=>'login']) ?>
                            </a>
                        <?php endif ?>

                    </span>
                </div>
            </div><!-- /.container -->
        </div>

    <header class="site-navbar py-1" role="banner">

        <div class="container">
            <div class="row align-items-center">

                <div class="col-6 col-xl-2">
                    <h1 class="mb-0"><a href="index.html" class="text-black h2 mb-0">THE<strong>BIG</strong>JOB</a></h1>
                </div>

                <div class="col-10 col-xl-10 d-none d-xl-block">
                    <nav class="site-navigation text-right" role="navigation">

                        <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                            <li><?= $this->Html->link(__('Home'), ['controller'=>'pages','action' => 'home']) ?></li>
                            <li><?= $this->Html->link(__('About'), ['controller'=>'pages','action' => 'about']) ?></li>
                            <li><?= $this->Html->link(__('Free Tips'), ['controller'=>'ArticlesView','action' => 'index']) ?></li>
                            <li><?= $this->Html->link(__('Find a Job'), ['controller'=>'JobsView','action' => 'index']) ?></li>
                            <li><span class="rounded bg-primary py-2 px-3 text-white"><span class="h5 mr-2">+</span><?= $this->Html->link(__('Post a Job'), ['controller'=>'EmployerAdmin','action' => 'index','class'=>'abc']) ?></span></li>
                        </ul>
                    </nav>
                </div>

                <div class="col-6 col-xl-2 text-right d-block">

                    <div class="d-inline-block d-xl-none ml-md-0 mr-auto py-3" style="position: relative; top: 3px;"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                </div>

            </div>
        </div>

    </header>

</div>

<!-- Page Header -->
<header class="masthead" )">
    <div class="container" style="padding: 20px">
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                <div class="<?= $this->fetch('heading-class', 'page-heading') ?>">
                    <h1><?= $this->fetch('heading') ?></h1>
                    <?php if ($this->fetch('subheading')): ?>
                        <h2 class="subheading"><?= $this->fetch('subheading') ?></h2>
                    <?php endif ?>
                    <?php if ($this->fetch('meta')): ?>
                        <span class="meta"><?= $this->fetch('meta') ?></span>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</header>

<?= $this->fetch('content') ?>


<footer class="site-footer">
    <div class="container">


        <div class="row">
            <div class="col-lg-9">
                <div class="row">
                    <div class="col-6 col-md-3 col-lg-3 mb-5 mb-lg-0">
                        <h3 class="footer-heading mb-4">For Candidates</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Register</a></li>
                            <li><a href="#">Find Jobs</a></li>
                            <li><a href="#">Free tips</a></li>
                            <li><a href="#">Shop</a></li>
                            <li><a href="#">Coach booking</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-3 col-lg-3 mb-5 mb-lg-0">
                        <h3 class="footer-heading mb-4">For Employers</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">Employer Account</a></li>
                            <li><a href="#">Find Candidates</a></li>
                            <li><a href="#">Terms &amp; Policies</a></li>
                        </ul>
                    </div>
                    <div class="col-6 col-md-3 col-lg-3 mb-5 mb-lg-0">
                        <h3 class="footer-heading mb-4">Company</h3>
                        <ul class="list-unstyled">
                            <li><a href="#">About</a></li>
                            <li><a href="#">Team</a></li>
                            <li><a href="#">Terms &amp; Policies</a></li>
                            <li><a href="#">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <h3 class="footer-heading mb-4">Contact Info</h3>
                <ul class="list-unstyled">
                    <li>
                        <span class="d-block text-white">Address</span>
                        Ste 212/ 370 St Kilda Road, Melbourne VIC 3000
                    </li>
                    <li>
                        <span class="d-block text-white">Telephone</span>
                        (03)9699 8298
                    </li>
                    <li>
                        <span class="d-block text-white">Email</span>
                        info@yourdomain.com
                    </li>
                </ul>

            </div>
        </div>
        <div class="row pt-5 mt-5 text-center">
            <div class="col-md-12">
                <p>The Big Job is Owned by Profiler Pty Ltd</p>
                <p>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright © <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script>2019 All Rights Reserved | This template is made with <i class="icon-heart text-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Colorlib</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
            </div>

        </div>
    </div>
</footer>

</div> <!-- #page-container -->


<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/aos.js"></script>

<script>
    // This example displays an address form, using the autocomplete feature
    // of the Google Places API to help users fill in the information.

    // This example requires the Places library. Include the libraries=places
    // parameter when you first load the API. For example:
    // <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=places">

    var placeSearch, autocomplete;
    var componentForm = {
        street_number: 'short_name',
        route: 'long_name',
        locality: 'long_name',
        administrative_area_level_1: 'short_name',
        country: 'long_name',
        postal_code: 'short_name'
    };

    function initAutocomplete() {
        // Create the autocomplete object, restricting the search to geographical
        // location types.
        autocomplete = new google.maps.places.Autocomplete(
            /** @type {!HTMLInputElement} */(document.getElementById('autocomplete')),
            {types: ['geocode']});

        // When the user selects an address from the dropdown, populate the address
        // fields in the form.
        autocomplete.addListener('place_changed', fillInAddress);
    }

    function fillInAddress() {
        // Get the place details from the autocomplete object.
        var place = autocomplete.getPlace();

        for (var component in componentForm) {
            document.getElementById(component).value = '';
            document.getElementById(component).disabled = false;
        }

        // Get each component of the address from the place details
        // and fill the corresponding field on the form.
        for (var i = 0; i < place.address_components.length; i++) {
            var addressType = place.address_components[i].types[0];
            if (componentForm[addressType]) {
                var val = place.address_components[i][componentForm[addressType]];
                document.getElementById(addressType).value = val;
            }
        }
    }

    // Bias the autocomplete object to the user's geographical location,
    // as supplied by the browser's 'navigator.geolocation' object.
    function geolocate() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var geolocation = {
                    lat: position.coords.latitude,
                    lng: position.coords.longitude
                };
                var circle = new google.maps.Circle({
                    center: geolocation,
                    radius: position.coords.accuracy
                });
                autocomplete.setBounds(circle.getBounds());
            });
        }
    }
</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&libraries=places&callback=initAutocomplete"
        async defer></script>

<script src="js/main.js"></script>
</body>
</html>
