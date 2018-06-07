<!DOCTYPE html>
<html class="no-js" lang="en">
<head>
 
    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>Academia</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
    ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="<?= URL ?>css/base.css">
    <link rel="stylesheet" href="<?= URL ?>css/vendor.css">
    <link rel="stylesheet" href="<?= URL ?>css/main.css">

    <!-- script
    ================================================== -->
    <script src="<?= URL ?>js/modernizr.js"></script>
    <script src="<?= URL ?>js/pace.min.js"></script>
    <!-- favicons
    ================================================== -->
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

<!-- pageheader
================================================== -->
<section class="s-pageheader s-pageheader--home">
<!-- header -->
<?= $this->insert('partials/menu'); ?>

    <?= $this->section('content'); ?>

    <footer class="s-footer">

        <div class="s-footer__main">
            <div class="row">

                <div class="col-two md-four mob-full s-footer__sitelinks">

                    <h4>Quick Links</h4>

                    <ul class="s-footer__linklist">
                        <li><a href="#0">Home</a></li>
                        <li><a href="#0">Posts</a></li>
                        <li><a href="#0">About</a></li>
                    </ul>

                </div> <!-- end s-footer__sitelinks -->

                <div class="col-two md-four mob-full s-footer__social">

                    <h4>Social</h4>

                    <ul class="s-footer__linklist">
                        <li><a href="#0">Facebook</a></li>
                        <li><a href="#0">Twitter</a></li>
                    </ul>

                </div> <!-- end s-footer__social -->

            </div>
        </div> <!-- end s-footer__main -->

        <div class="s-footer__bottom">
            <div class="row">
                <div class="col-full">
                    <div class="s-footer__copyright">
                        <span>© Copyright Kenedy 2018</span>
                        <span>Site Template by <a href="https://colorlib.com/">Colorlib</a></span>
                    </div>

                    <div class="go-top">
                        <a class="smoothscroll" title="Back to Top" href="#top"></a>
                    </div>
                </div>
            </div>
        </div> <!-- end s-footer__bottom -->

    </footer> <!-- end s-footer -->

    <!-- Java Script
     ================================================== -->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>

</body>

</html>