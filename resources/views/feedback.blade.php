<x-page>

  <x-slot name="head">
    <!--Inserting into head-->
    <script src="/js/pageOnload.js"></script>
  </x-slot>

  <x-menu :information="$information_for_the_menu"/>

  <div class="site-div">
    <!--main part-->
      <form id="form-feedback" action="/send_message" method="POST">
        {{ csrf_field() }}

          @if ($information_for_the_main['report_on_sending_a_message'] != '')
            <div id="report-on-sending-message">
              {{$information_for_the_main['report_on_sending_a_message']}}
            </div>
          @endif

          <label class="label-text" for="please-introduce-yourself">{{$information_for_the_main['please_introduce_yourself_word']}}</label>
          <input class="input-text" type="text" id="please-introduce-yourself" name="pleaseIntroduceYourself" required>

          <label class="label-text" for="your-email">{{$information_for_the_main['your_email_word']}}</label>
          <input class="input-text" type="email" id="your-email" name="yourEmail" required>

          <label class="label-text" for="text-of-message">{{$information_for_the_main['text_of_message_word']}}</label>
          <textarea class="input-textarea" maxlength="2000" id="text-of-message" name="textOfMessage" required></textarea>

          <input id="send-message" class="button-submit" type="submit" value="{{$information_for_the_main['send_message_word']}}" >

      </form>
  </div>
</x-page>
