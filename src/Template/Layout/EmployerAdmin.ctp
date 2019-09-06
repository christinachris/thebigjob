<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?php echo $this->fetch('title'); ?></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php echo $this->Html->css('lib/template/admin/vendor.css'); ?>
    <?php echo $this->Html->css('lib/template/admin/app.css'); ?>
    <?php echo $this->Html->css('lib/chosen.min.css'); ?>
    <?php echo $this->Html->css('admin.css'); ?>

</head>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>The Big Job | Job tips for everyone</title>

    <!-- Bootstrap core CSS -->
    <?php echo $this->Html->css('bootstrap.min.css');?>

    <!-- Custom fonts for this template -->


    <!-- Custom styles for this template -->


    <link rel='dns-prefetch' href='//v0.wordpress.com'/>
    <style type='text/css'>img#wpstats{display:none}</style><meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=1" />	<noscript><style>.woocommerce-product-gallery{ opacity: 1 !important; }</style></noscript>
    <link rel="icon" href="https://thebigjob.com.au/wp-content/uploads/2017/12/cropped-lublun-32x32.png" sizes="32x32" />
    <link rel="icon" href="https://thebigjob.com.au/wp-content/uploads/2017/12/cropped-lublun-192x192.png" sizes="192x192" />
    <link rel="apple-touch-icon-precomposed" href="https://thebigjob.com.au/wp-content/uploads/2017/12/cropped-lublun-180x180.png" />
    <meta name="msapplication-TileImage" content="https://thebigjob.com.au/wp-content/uploads/2017/12/cropped-lublun-270x270.png" />
    <link rel="stylesheet" id="et-core-unified-cached-inline-styles" href="https://thebigjob.com.au/wp-content/cache/et/91/et-core-unified-15538543260077.min.css" onerror="et_core_page_resource_fallback(this, true)" onload="et_core_page_resource_fallback(this)" /><!-- ## NXS/OG ## --><!-- ## NXSOGTAGS ## --><!-- ## NXS/OG ## -->

</head>


<body>

<div class="main-wrapper">
    <div class="app" id="app">
        <header class="header">
            <div class="header-block header-block-collapse d-lg-none d-xl-none">
                <button class="collapse-btn" id="sidebar-collapse-btn">
                    <i class="fa fa-bars"></i>
                </button>
            </div>
            <div class="header-block header-block-search">
            </div>
            <div class="header-block header-block-buttons">
            </div>
            <div class="header-block header-block-nav">
                <ul class="nav-profile">
                    <li class="profile dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                            <span class="name"> <?= $this->request->getSession()->read('Auth.User.username'); ?></span>
                        </a>
                        <div class="dropdown-menu profile-dropdown-menu" aria-labelledby="dropdownMenu1">
                            <?= $this->Html->link(
                                '<i class="fa fa-user icon"></i> Account',
                                ['controller' => 'users', 'action' => 'edit', $this->request->getSession()->read('Auth.User.id')],
                                ['class' => 'dropdown-item', 'escape' => false]
                            ) ?>
                            <?= $this->Html->link(
                                '<i class="fa fa-power-off icon"></i> Logout',
                                ['controller' => 'users', 'action' => 'logout'],
                                ['class' => 'dropdown-item', 'escape' => false]
                            );?>
                        </div>
                    </li>
                </ul>
            </div>
        </header>
        <aside class="sidebar">
            <div class="sidebar-container">
                <div class="sidebar-header">
                    <div class="brand">
                        <?= $this->Html->link(__('The Big Job'), ['controller'=>'pages','action' => 'home'],["class"=>"a1"]) ?>
                        <a class="a2">Employer site</a>
                    </div>

                </div>
                <?= $this->element('EmployerAdmin/menu'); ?>
            </div>
            <footer class="sidebar-footer">
            </footer>
        </aside>
        <div class="sidebar-mobile-menu-handle" id="sidebar-mobile-menu-handle"></div>
        <div class="mobile-menu-handle"></div>

        <article class="content dashboard-page">
            <?= $this->Flash->render(); ?>
            <?= $this->fetch('content'); ?>
        </article>
    </div>
</div>


<?php echo $this->Html->script('lib/template/admin/vendor.js'); ?>
<?php echo $this->Html->script('lib/template/admin/app.js'); ?>
<?php echo $this->Html->script('lib/jquery.validate.min.js'); ?>
<?php echo $this->Html->script('lib/chosen.jquery.min.js'); ?>
<?php echo $this->Html->script('lib/tinymce/tinymce.min.js'); ?>
<?php echo $this->fetch('script'); ?>
<script>
    (function() {
        tinymce.init({
            selector: 'textarea',
            content_css: '../../../css/home.css',

            // Started with the full list of all plugins from https://www.tinymce.com/docs/demo/full-featured/, and then
            // removed ones which were unneeded for a relatively simplistic blog platform.
            plugins: 'fullpage searchreplace autolink directionality visualblocks visualchars fullscreen image link media table anchor toc lists wordcount imagetools contextmenu colorpicker textpattern help',
            menubar: 'edit insert format table tools help',
            toolbar1: 'formatselect | bold italic strikethrough codetag | link | alignleft aligncenter alignright alignjustify  | numlist bullist outdent indent  | removeformat | fullpage',
            menu: {
                edit: {title: 'Edit', items: 'undo redo | cut copy paste | selectall'},
                insert: {title: 'Insert', items: 'link media'},
                format: {
                    title: 'Format',
                    items: 'bold italic underline strikethrough superscript subscript | formats | removeformat'
                },
                table: {title: 'Table', items: 'inserttable tableprops deletetable | cell row column'}
            },

            // This is quite messy, but the back story is that TinyMCE DOES provide the ability to format selected
            // text using <code></code> tags, but it does NOT allow you to put a button in the toolbar for this.
            // As such, I've hacked into the existing ability to toggle the 'code' style, based on the following
            // stack voerflow answer: https://stackoverflow.com/a/23241638. The "codetag" button is then used in the
            // "toolbar1" above.
            setup: function(editor) {
                editor.addButton('codetag', {
                    text: '',
                    icon: 'code',
                    onclick: function() {
                        editor.formatter.toggle('code');
                    }
                });
            },
        });

        $('select').chosen({width: '50%'});
    })();
</script>
</body>
</html>
