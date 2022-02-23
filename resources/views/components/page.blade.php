<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" href="{{ asset('myCSS/stylePortait.css') }}">
    <link rel="stylesheet" href="{{ asset('myCSS/styleLandscape.css') }}">

    {{$head}}
  </head>
  <body>
    <div id="preloadPage"><img id="preloadImage" src="/myImage/preloader_2.gif" alt="Loading the site..."></div>
    <div id="site-pages">
      {{$slot}}
    </div>
  </body>
</html>
