<?php

declare(strict_types=1);

namespace App\Error\Renderer;

require __DIR__ . '/vendor/autoload.php';

use Slim\Exception\HttpNotFoundException;
use Slim\Interfaces\ErrorRendererInterface;
use Throwable;

final class HtmlErrorRenderer implements ErrorRendererInterface
{
    public function __invoke(Throwable $exception, bool $displayErrorDetails): string
    {
        $title = 'Error';
        $message = 'An error has occurred.';

        if ($exception instanceof HttpNotFoundException) {
            $title = 'Page not found';
            $message = 'This page could not be found.';
        }

        return $this->renderHtmlPage($title, $message);
    }

    public function renderHtmlPage(string $title = '', string $message = ''): string
    {
        $title = htmlentities($title, ENT_COMPAT|ENT_HTML5, 'utf-8');
        $message = htmlentities($message, ENT_COMPAT|ENT_HTML5, 'utf-8');

        return <<<EOT
<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title>Maor Levi</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="apple-touch-icon" href="img/apple-touch-icon.png">
        <link rel="icon" type="image/x-icon" href="img/favicon.ico">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/main.css?v=<?php echo time(); ?>">
        <link rel="stylesheet" href="css/shows.css?v=<?php echo time(); ?>">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rozha+One&display=swap" rel="stylesheet">
        <script src="js/vendor/modernizr-2.8.3-respond-1.4.2.min.js"></script>
    </head>
    <body>
      <div class="sky"></div>    
      <div class="content">
        <label for="menu-control" class="shows">Upcoming shows</label>

        <section class="flyout">
          <input type="checkbox" id="menu-control" class="menu-control">
          
          <aside class="sidebar">
            <div class="songkick">
              <a href="https://www.songkick.com/artists/2467251" class="songkick-widget" data-theme="light" data-track-button="on" data-detect-style="true" data-background-color="transparent" data-locale="en">Maor Levi tour dates</a>
            </div>
            <label for="menu-control" class="sidebar__close"></label>
          </aside>
        </section>
        
        <div class="featured">
          <div class="logo">
            <img src="img/new-logo.png" />
          </div>
          <div class="title-text">
            <h4>AM I DREAMING? EP</h4>
            <h4>OUT NOW</h4>
          </div>
          <div class="clearfix"></div>
          <div class="buy-listen-button">
            <a target="_blank" href="https://anjunabeats.ffm.to/mlaidr.oyd">Buy / Listen</a>
          </div>
          <div class="clearfix"></div>
          <div class="youtube">
            <iframe width="100%" src="https://www.youtube.com/embed/RgXYp_QvWB0" frameborder="0"></iframe>
          </div>
          <div class="clearfix"></div>
          <div class="tour-button">
            <a href="/tour.html">Upcoming Shows</a>
          </div>
          <div class="mobile-socials">
            <div class="social-container">
              <div class="row">
                <a href="http://bit.do/MaorLeviFacebook" target="_blank"><i class="fab fa-facebook"></i></a>
                <a href="http://bit.do/MaorLeviTwitter" target="_blank"><i class="fab fa-twitter"></i></a>
                <a href="http://bit.do/MaorLeviInstagram" target="_blank"><i class="fab fa-instagram"></i></a>
                <a href="http://bit.do/MaorLeviSnapchat" target="_blank"><i class="fab fa-snapchat"></i></a>
                <a href="https://www.songkick.com/artists/2467251-maor-levi" target="_blank"><i class="fa fa-calendar"></i></a>
              </div>
              <div class="row">
                <a href="http://bit.do/MLSpotify" target="_blank"><i class="fab fa-spotify"></i></a>
                <a href="http://bit.do/MaorLeviApple" target="_blank"><i class="fab fa-itunes-note"></i></a>
                <a href="http://bit.do/MaorLeviSoundcloud" target="_blank"><i class="fab fa-soundcloud"></i></a>
                <a href="http://bit.do/MaorLeviYoutube" target="_blank"><i class="fab fa-youtube"></i></a>
                <a href="mailto:info@maorlevi.com" target="_blank"><i class="fas fa-envelope"></i></a>
              </div>
            </div>
          </div>
        </div>

        <div class="desktop-socials">
          <div class="social-container">
            <a href="http://bit.do/MaorLeviFacebook" target="_blank"><i class="fab fa-facebook"></i></a>
            <a href="http://bit.do/MaorLeviTwitter" target="_blank"><i class="fab fa-twitter"></i></a>
            <a href="http://bit.do/MaorLeviInstagram" target="_blank"><i class="fab fa-instagram"></i></a>
            <a href="http://bit.do/MaorLeviSnapchat" target="_blank"><i class="fab fa-snapchat"></i></a>
            <a href="https://www.songkick.com/artists/2467251-maor-levi" target="_blank"><i class="fa fa-calendar"></i></a>
            <a href="http://bit.do/MLSpotify" target="_blank"><i class="fab fa-spotify"></i></a>
            <a href="http://bit.do/MaorLeviApple" target="_blank"><i class="fab fa-itunes-note"></i></a>
            <a href="http://bit.do/MaorLeviSoundcloud" target="_blank"><i class="fab fa-soundcloud"></i></a>
            <a href="http://bit.do/MaorLeviYoutube" target="_blank"><i class="fab fa-youtube"></i></a>
            <a href="mailto:info@maorlevi.com" target="_blank"><i class="fas fa-envelope"></i></a>
          </div>
        </div>
      </div>


    



      <script src="//widget.songkick.com/2467251/widget.js"></script>
      <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <script>
        window.jQuery || document.write('<script src="js/vendor/jquery-1.11.2.min.js"><\/script>')
      </script>

      <script src="js/vendor/bootstrap.min.js"></script>
      <script src="https://kit.fontawesome.com/dbc048e1bc.js" crossorigin="anonymous"></script>
      <script src="js/plugins.js"></script>
      <script src="js/main.js"></script>
    </body>
</html>

EOT;
    }
}