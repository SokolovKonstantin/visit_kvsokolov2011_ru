<div id="menu">

  <div class="place-button">
    <div class="menu" id="{{$information['topLeftButton']['route']}}">
      {{$information['topLeftButton']['name']}}
    </div>
  </div>

  <div class="place-button">
    <div class="menu" id="{{$information['topMiddleButton']['route']}}">
      {{$information['topMiddleButton']['name']}}
    </div>
  </div>

  <div class="place-button">
    <div class="menu" id="{{$information['topRightButton']['route']}}">
      {{$information['topRightButton']['name']}}
    </div>
  </div>

    @php
      $currentUrl = ((!empty($_SERVER['HTTPS'])) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
      $currentUrl = explode('?', $currentUrl);
      $currentUrl = $currentUrl[0];
      if ($information['buttonLabelLanguage'] !== 'English') {
        $currentUrl = $currentUrl.'?language=rus';
      } else {
        $currentUrl = $currentUrl.'?language=eng';
      }
    @endphp

  <div class="place-button">
    <div class="menu" id="{{$currentUrl}}">
      {{$information['buttonLabelLanguage']}}
    </div>
  </div>



  </div>
