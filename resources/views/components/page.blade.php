<!DOCTYPE html>
<html>
  <head>
    {{$head}}
    <link rel="shortcut icon" href="/myImage/favicon.ico" type="image/x-icon">
    <meta name = "author" content = "Соколов Константин">
    <link rel="stylesheet" href="{{ asset('myCSS/stylePortait.css') }}">
    <link rel="stylesheet" href="{{ asset('myCSS/styleLandscape.css') }}">


  </head>
  <body>
    <div id="preloadPage"><img id="preloadImage" src="/myImage/preloader_2.gif" alt="Loading the site..."></div>
    <div id="site-pages">
      {{$slot}}
    </div>
  </body>
</html>
