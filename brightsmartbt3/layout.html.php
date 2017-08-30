<!DOCTYPE html>
<html lang="en">
<head>
    <?php echo head_contents();?>
    <title><?php echo $title;?></title>
    <meta name="description" content="<?php echo $description; ?>"/>
    <link rel="canonical" href="<?php echo $canonical; ?>" />
    <?php if (publisher()): ?>
    <link href="<?php echo publisher() ?>" rel="publisher" /><?php endif; ?> 
    <!-- Bootstrap Core CSS -->
    <?php if(config('brightsmart.bootswatch') == '') {?>
    <link href="<?php echo site_url();?>themes/brightsmartbt3/bootswatch-3.3.7/flatly/bootstrap.min.css" rel="stylesheet">
    <?php } else { ?>
    <link href="<?php echo site_url();?>themes/brightsmartbt3/bootswatch-3.3.7/<?php echo config('brightsmart.bootswatch');?>/bootstrap.min.css" rel="stylesheet">
    <?php } ?>

    <!-- Custom Css -->
    <link href="<?php echo site_url();?>themes/brightsmartbt3/css/style.css" rel="stylesheet" type="text/css">
    <!-- Custom Fonts -->
    <link href="<?php echo site_url();?>themes/brightsmartbt3/bootswatch-3.3.7/bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="<?php echo site_url();?>themes/brightsmartbt3/bootswatch-3.3.7/bower_components/html5shiv/dist/html5shiv.min.js"></script>
        <script src="<?php echo site_url();?>themes/brightsmartbt3/bootswatch-3.3.7/bower_components/respond/dest/respond.min.js"></script>
    <![endif]-->
</head>
<?php     
    if (isset($_GET['search'])) {
        $search = $_GET['search'];
        $url = site_url() . 'search/' . remove_accent($search);
        header("Location: $url");
    }
?>
<body>
<?php if (facebook()) { echo facebook(); } ?>
<?php if (login()) { toolbar(); } ?>
    <!-- Navigation -->
    <nav class="navbar 
<?php if(config('brightsmart.navbar-inverse') == '' || config('brightsmart.navbar-inverse') == 'false' ) {?>
 navbar-default 
    <?php } else { ?>
 navbar-inverse 
    <?php } ?>


  navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header page-scroll">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="<?php echo site_url();?>"><?php echo blog_title();?></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <?php echo menu('navbar-nav navbar-right') ?>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <!-- Page Header -->
    <!-- Set your background image for this header on the line below. -->
    <header class="intro-header">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <?php if (isset($is_front)):?>
                        <div class="site-heading">
                            <h1><?php echo blog_title();?></h1>
                            <hr class="small">
                            <span class="subheading"><?php echo blog_tagline();?></span>
                        </div>
                        <style>
                        <?php if(config('brightsmartbt3.homebg') == '') {?>
                            .intro-header {background-image: url('<?php echo site_url();?>themes/brightsmartbt3/img/home-bg.jpg')}
                        <?php } else { ?>
                            .intro-header {background-image: url('<?php echo config('brightsmartbt3.homebg');?>')}
                        <?php } ?>
                        </style>
                    <?php endif;?>
                    <?php if (isset($is_post)):?>
                        <div class="post-heading">
                            <h1><?php echo $p->title;?></h1>
                            <span class="meta">Posted in <?php echo $p->category;?> by <a href="<?php echo $p->authorUrl;?>"><?php echo $p->author;?></a> on <?php echo date('d F Y', $p->date);?></span>
                        </div>
                        <style>
                        <?php if(empty($p->image)) {?>
                            .intro-header {background-image: url('<?php echo site_url();?>themes/brightsmartbt3/img/post-bg.jpg')}
                        <?php } else { ?>
                            .intro-header {background-image: url('<?php echo $p->image;?>')}
                        <?php } ?>
                        </style>
                    <?php endif;?>
                    <?php if (isset($is_page) || isset($is_subpage)):?>
                        <div class="page-heading">
                            <h1><?php echo $p->title;?></h1>
<!--                            <hr class="small"> -->
<!--                             <span class="subheading"><?php echo blog_title();?></span> -->
                        </div>
                        <style>
                        <?php if(config('brightsmartbt3.pagebg') == '') {?>
                            .intro-header {background-image: url('<?php echo site_url();?>themes/brightsmartbt3/img/home-bg.jpg')}
                        <?php } else { ?>
                            .intro-header {background-image: url('<?php echo config('brightsmartbt3.pagebg');?>')}
                        <?php } ?>
                        </style>
                    <?php endif;?>
                    <?php if (isset($is_profile)):?>
                        <div class="page-heading">
                            <h1><?php echo $name ?></h1>
                            <hr class="small">
                            <span class="subheading"><?php echo blog_title();?></span>
                        </div>
                        <style>
                        <?php if(config('brightsmartbt3.profilebg') == '') {?>
                            .intro-header {background-image: url('<?php echo site_url();?>themes/brightsmartbt3/img/about-bg.jpg')}
                        <?php } else { ?>
                            .intro-header {background-image: url('<?php echo config('brightsmartbt3.profilebg');?>')}
                        <?php } ?>
                        </style>
                    <?php endif;?>
                    <?php if (isset($is_blog)):?>
                        <div class="page-heading">
                            <h1>Blog</h1>
<!--                            <hr class="small">
                            <span class="subheading"><?php echo blog_title();?></span> -->
                        </div>
                        <style>
                        <?php if(config('brightsmartbt3.blogbg') == '') {?>
                            .intro-header {background-image: url('<?php echo site_url();?>themes/brightsmartbt3/img/post-bg.jpg')}
                        <?php } else { ?>
                            .intro-header {background-image: url('<?php echo config('brightsmartbt3.blogbg');?>')}
                        <?php } ?>
                        </style>
                    <?php endif;?>
                    <?php if (isset($is_category)):?>
                        <div class="page-heading">
                            <h1><?php echo $category->title;?></h1>
                            <hr class="small">
                            <span class="subheading"><?php echo blog_title();?></span>
                        </div>
                        <style>
                        <?php if(config('brightsmartbt3.categorybg') == '') {?>
                            .intro-header {background-image: url('<?php echo site_url();?>themes/brightsmartbt3/img/home-bg.jpg')}
                        <?php } else { ?>
                            .intro-header {background-image: url('<?php echo config('brightsmartbt3.categorybg');?>')}
                        <?php } ?>
                        </style>
                    <?php endif;?>
                    <?php if (isset($is_tag)):?>
                        <div class="site-heading">
                            <h1><?php echo $tag->title;?></h1>
                            <hr class="small">
                            <span class="subheading"><?php echo blog_title();?></span>
                        </div>
                        <style>
                        <?php if(config('brightsmartbt3.tagbg') == '') {?>
                            .intro-header {background-image: url('<?php echo site_url();?>themes/brightsmartbt3/img/home-bg.jpg')}
                        <?php } else { ?>
                            .intro-header {background-image: url('<?php echo config('brightsmartbt3.tagbg');?>')}
                        <?php } ?>
                        </style>
                    <?php endif;?>
                    <?php if (isset($is_archive)):?>
                        <div class="site-heading">
                            <h1><?php echo $archive->title;?></h1>
                            <hr class="small">
                            <span class="subheading"><?php echo blog_title();?></span>
                        </div>
                        <style>
                        <?php if(config('brightsmartbt3.archivebg') == '') {?>
                            .intro-header {background-image: url('<?php echo site_url();?>themes/brightsmartbt3/img/home-bg.jpg')}
                        <?php } else { ?>
                            .intro-header {background-image: url('<?php echo config('brightsmartbt3.archivebg');?>')}
                        <?php } ?>
                        </style>
                    <?php endif;?>
                    <?php if (isset($is_search)):?>
                        <div class="site-heading">
                            <h1><?php echo $search->title;?></h1>
                            <hr class="small">
                            <span class="subheading"><?php echo blog_title();?></span>
                        </div>
                        <style>
                        <?php if(config('brightsmartbt3.searchbg') == '') {?>
                            .intro-header {background-image: url('<?php echo site_url();?>themes/brightsmartbt3/img/home-bg.jpg')}
                        <?php } else { ?>
                            .intro-header {background-image: url('<?php echo config('brightsmartbt3.searchbg');?>')}
                        <?php } ?>
                        </style>
                    <?php endif;?>
                    <?php if (isset($is_404) || isset($is_404search)):?>
                        <div class="site-heading">
                            <h1>Error 404!</h1>
                            <hr class="small">
                            <span class="subheading"><?php echo blog_tagline();?></span>
                        </div>
                        <style>
                        <?php if(config('brightsmartbt3.404bg') == '') {?>
                            .intro-header {background-image: url('<?php echo site_url();?>themes/brightsmartbt3/img/home-bg.jpg')}
                        <?php } else { ?>
                            .intro-header {background-image: url('<?php echo config('brightsmartbt3.404bg');?>')}
                        <?php } ?>
                        </style>
                    <?php endif;?>
                    <?php if (!empty($breadcrumb)): ?>
                        <div class="breadcrumb <?php if (isset($is_post)):?>left<?php endif;?>"><?php echo $breadcrumb ?></div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </header>
    <?php echo content();?>
    <hr>
    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                    <ul class="list-inline text-center">
  <?php if(config('social.twitter') != '') {?>            
          <li>
                            <a href="<?php echo config('social.twitter');?>">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-twitter fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
    <?php } ?>
<?php if(config('social.facebook') != '') {?>
                        <li>
                            <a href="<?php echo config('social.facebook');?>">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-facebook fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
    <?php } ?>
<?php if(config('social.google') != '') {?>
                        <li>
                            <a href="<?php echo config('social.google');?>">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-google-plus fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
    <?php } ?>
<?php if(config('social.github') != '') {?>
 <li>
                            <a href="<?php echo config('social.github');?>">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-github fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
    <?php } ?>

<?php if(config('social.linkedin') != '') {?>
 <li>
                            <a href="<?php echo config('social.linkedin');?>">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-linkedin fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li>
    <?php } ?>


                        <!-- <li>
                            <a href="<?php echo site_url();?>feed/rss">
                                <span class="fa-stack fa-lg">
                                    <i class="fa fa-circle fa-stack-2x"></i>
                                    <i class="fa fa-rss fa-stack-1x fa-inverse"></i>
                                </span>
                            </a>
                        </li> -->
                    </ul>
                    <div class="copyright text-muted"><?php echo copyright();?></div>
                </div>
            </div>
        </div>
    </footer>
    <!-- jQuery -->
    <script src="<?php echo site_url();?>themes/brightsmartbt3/bootswatch-3.3.7/bower_components/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo site_url();?>themes/brightsmartbt3/bootswatch-3.3.7/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    <?php if (analytics()): ?><?php echo analytics() ?><?php endif; ?>
</body>
</html>
