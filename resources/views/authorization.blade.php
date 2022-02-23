<x-page>
  <x-slot name="head">
    <!--Inserting into head-->
    <script src="/js/authorization.js"></script>
  </x-slot>

  <div id="authorization">
    <div>{{$status_authentication}}</div>
    <form action="/admin/authentication" method="POST" id="form_authentication">
      @csrf
      <label class="label-text">Login:</label>
      <input class="input-text" type="text" name="login">

      <label class="label-text">Password:</label>
      <input class="input-text" type="password" name="password">

      <input class="button-submit" id="signIn-button" type="button" value="Sign in">
    </form>
  </div>


</x-page>
