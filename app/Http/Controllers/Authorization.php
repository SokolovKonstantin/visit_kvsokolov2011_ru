<?php

namespace App\Http\Controllers;
use App\Models\Authentication;

use Illuminate\Http\Request;

class Authorization extends Controller
{

    public function mainMethod(Request $request){
      //status_authentication
      if ( $request->session()->has('status_authentication') ) {
        $status = $request->session()->get('status_authentication');
        return view('authorization',['status_authentication'=> $status]);
      }
      return view('authorization',['status_authentication'=>'']);
    }

    public function authentication(Request $request){

      $auth = Authentication::find(1);

      if ( crypt($request->password, $request->login) === $auth['password'] ) {
        $request->session()->put('authorized', true);
        return redirect('/admin');
      } else {
        $request->session()->put('authorized', false);
        $request->session()->flash('status_authentication', 'Логин\Пароль не верны! Повторите ввод.');
        return redirect('/admin/authorization');
      }

    }

}
