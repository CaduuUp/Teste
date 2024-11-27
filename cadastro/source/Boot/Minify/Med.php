<?php
if (strpos(url(), "localhost")) {
    /**
     * CSS
     */
    $minCSS = new MatthiasMullie\Minify\CSS();
    $minCSS->add(__DIR__ . "/../../../shared/styles/aos.css");
    $minCSS->add(__DIR__ . "/../../../shared/styles/bootstrap-bundle.min.css");
    $minCSS->add(__DIR__ . "/../../../shared/styles/bootstrap-icons.css");
    $minCSS->add(__DIR__ . "/../../../shared/styles/boxicons.min.css");
    $minCSS->add(__DIR__ . "/../../../shared/styles/glightbox.min.css");
    $minCSS->add(__DIR__ . "/../../../shared/styles/remixicon.csss");
    $minCSS->add(__DIR__ . "/../../../shared/styles/swiper-bundle.min.csss");



    //theme CSS
    $cssDir = scandir(__DIR__ . "/../../../themes/" . CONF_VIEW_MED . "/assets/css");
    foreach ($cssDir as $css) {
        $cssFile = __DIR__ . "/../../../themes/" . CONF_VIEW_MED . "/assets/css/{$css}";
        if (is_file($cssFile) && pathinfo($cssFile)['extension'] == "css") {
            $minCSS->add($cssFile);
        }
    }

    //Minify CSS
    $minCSS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_MED . "/assets/style.css");

    /**
     * JS
     */
    $minJS = new MatthiasMullie\Minify\JS();
    $minJS->add(__DIR__ . "/../../../shared/scripts/aos.js");
    $minJS->add(__DIR__ . "/../../../shared/scripts/bootstrap.bundle.min.js");
    $minJS->add(__DIR__ . "/../../../shared/scripts/glightbox.min.js");
    $minJS->add(__DIR__ . "/../../../shared/scripts/isotope.pkgd.min.js");
    $minJS->add(__DIR__ . "/../../../shared/scripts/validate.js");
    $minJS->add(__DIR__ . "/../../../shared/scripts/swiper-bundle.min.js");
    $minJS->add(__DIR__ . "/../../../shared/scripts/noframework.waypoints.js");

    //theme CSS
    $jsDir = scandir(__DIR__ . "/../../../themes/" . CONF_VIEW_MED . "/assets/js");
    foreach ($jsDir as $js) {
        $jsFile = __DIR__ . "/../../../themes/" . CONF_VIEW_MED . "/assets/js/{$js}";
        if (is_file($jsFile) && pathinfo($jsFile)['extension'] == "js") {
            $minJS->add($jsFile);
        }
    }

    //Minify JS
    $minJS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_MED . "/assets/main.js");
}
