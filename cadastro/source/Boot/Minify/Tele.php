<?php
if (strpos(url(), "localhost")) {
    /**
     * CSS
     */
    $minCSS = new MatthiasMullie\Minify\CSS();
    $minCSS->add(__DIR__ . "/../../../shared/styles/templatemo-chain-app-dev.css");
    $minCSS->add(__DIR__ . "/../../../shared/styles/animated.css");
    $minCSS->add(__DIR__ . "/../../../shared/styles/bootstrap.min.css");
    $minCSS->add(__DIR__ . "/../../../shared/styles/bootstrap.min.css.map");
    $minCSS->add(__DIR__ . "/../../../shared/styles/fontawesome.css");


    //theme CSS
    $cssDir = scandir(__DIR__ . "/../../../themes/" . CONF_VIEW_TELE . "/assets/css");
    foreach ($cssDir as $css) {
        $cssFile = __DIR__ . "/../../../themes/" . CONF_VIEW_TELE . "/assets/css/{$css}";
        if (is_file($cssFile) && pathinfo($cssFile)['extension'] == "css") {
            $minCSS->add($cssFile);
        }
    }

    //Minify CSS
    $minCSS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_TELE . "/assets/style.css");

    /**
     * JS
     */
    $minJS = new MatthiasMullie\Minify\JS();
    $minJS->add(__DIR__ . "/../../../shared/scripts/jquerytele.min.js");
    $minJS->add(__DIR__ . "/../../../shared/scripts/bootstrap.bundle.min.js");
    $minJS->add(__DIR__ . "/../../../shared/scripts/owl-carousel.js");
    $minJS->add(__DIR__ . "/../../../shared/scripts/animation.js");
    $minJS->add(__DIR__ . "/../../../shared/scripts/imagesloaded.js");
    $minJS->add(__DIR__ . "/../../../shared/scripts/popup.js");
    $minJS->add(__DIR__ . "/../../../shared/scripts/isotope.js");
    $minJS->add(__DIR__ . "/../../../shared/scripts/tabs.js");
    $minJS->add(__DIR__ . "/../../../shared/scripts/custom.js");







    //theme CSS
    $jsDir = scandir(__DIR__ . "/../../../themes/" . CONF_VIEW_TELE . "/assets/js");
    foreach ($jsDir as $js) {
        $jsFile = __DIR__ . "/../../../themes/" . CONF_VIEW_TELE . "/assets/js/{$js}";
        if (is_file($jsFile) && pathinfo($jsFile)['extension'] == "js") {
            $minJS->add($jsFile);
        }
    }

    //Minify JS
    $minJS->minify(__DIR__ . "/../../../themes/" . CONF_VIEW_TELE . "/assets/scripts.js");
}
