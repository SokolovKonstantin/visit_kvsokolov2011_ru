<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Messages;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Feedback extends Controller
{

  private $language;
  private $information_for_the_menu;
  private $information_for_the_main;
  private $report_on_sending_a_message;

  public function showFeedback(Request $request)
  {
    //get language site from session
    $this->language = $request->session()->get('language');
    //flash dispatch report
    if ( $request->session()->has('report_on_sending_a_message') ) {
      $this->report_on_sending_a_message = $request->session()->get('report_on_sending_a_message');
    } else {
      $this->report_on_sending_a_message = '';
    }

    //translate start page
    if ($this->language==="rus") {
      $this->translateToRussian();
    } else {
      $this->translateToEnglish();
    }

    return view('feedback',
      [
        'information_for_the_menu'=>$this->information_for_the_menu,
        'information_for_the_main'=>$this->information_for_the_main
      ]);
  }

  private function translateToEnglish()
  {
    $this->information_for_the_menu = [
      "topLeftButton" => ["name"=>"Main page", "route"=>"/"],
      "topMiddleButton" => ["name"=>"About me", "route"=>"/about_me"],
      "topRightButton" => ["name"=>"My projects", "route"=>"/completed_projects"],
      "buttonLabelLanguage" => "Русский",
    ];

    $this->information_for_the_main = [
      "please_introduce_yourself_word" => "Please introduce yourself:",
      "your_email_word" => "Your email address:",
      "text_of_message_word" => "Your message:",
      "send_message_word" => "Send a message",
      "report_on_sending_a_message" =>
      ($this->report_on_sending_a_message !== '')
          ?($this->report_on_sending_a_message === 'sent')
            ?'Your message has been sent.'
            :'There were problems when sending the email. I
              apologize to you, you can write a letter to kvsokolov2011@mail.ru.'
          :'',
    ];
  }

  private function translateToRussian()
  {
    $this->information_for_the_menu = [
      "topLeftButton" => ["name"=>"На главную страницу", "route"=>"/"],
      "topMiddleButton" => ["name"=>"Обо мне", "route"=>"/about_me"],
      "topRightButton" => ["name"=>"Выполненные проекты", "route"=>"/completed_projects"],
      "buttonLabelLanguage" => "English",
    ];

    $this->information_for_the_main = [
      "please_introduce_yourself_word" => "Представьтесь, пожалуйста:",
      "your_email_word" => "Адрес вашей электронной почты:",
      "text_of_message_word" => "Ваше сообщение:",
      "send_message_word" => "Отправить сообщение",
      "report_on_sending_a_message" =>
      ($this->report_on_sending_a_message !== '')
          ?($this->report_on_sending_a_message === 'sent')
            ?'Ваше сообщение отправлено.'
            :'Возникли проблемы при отправке письма. Приношу Вам свои
              извинения, вы можете написать письмо по адресу
              kvsokolov2011@mail.ru.'
          :'',
    ];
  }

  public function sendMessage(Request $request)
  {
    $message = new Messages;
    $data = [
      [ 'introduce_yourself' => $request->pleaseIntroduceYourself,
        'email' => $request->yourEmail,
        'text_of_message' => $request->textOfMessage,
        'created_at' => date('Y-m-d H:i:s')],
    ];
    $message->insert($data);

    $mail = new PHPMailer();
    $mail->isSMTP();// Sending via SMTP
    $mail->Host = 'smtp.mail.ru';
    $mail->SMTPAuth = true;// Enable SMTP authentication
    $mail->Username = 'kvsokolov2011';// your username (without domain and @)
    $mail->Password = 'password';// your password
    $mail->SMTPSecure = 'ssl';
    $mail->Port = 465;
    $mail->CharSet = "utf-8";

    $mail->setFrom('kvsokolov2011@mail.ru', 'Константин Соколов');    // от кого
    $mail->addAddress('kvsokolov2011@mail.ru', 'Константину Соколову'); // кому

    $mail->Subject = 'Сообщение с сайта visit.kvsokolov2011.ru';
    $mail->msgHTML("<html>
                      <body>
                        <p>
                          {$request->textOfMessage}<br>
                          от: {$request->pleaseIntroduceYourself}<br>
                          email отправителя: {$request->yourEmail}
                        </p>
                        <a href='www.visit.kvsokolov2011.ru'>www.visit.kvsokolov2011.ru</a>
                      </body>
                    </html>");
    // Sending
    if ($mail->send()) {
      //the email has been sent
      $request->session()
      ->flash('report_on_sending_a_message', 'sent');
    } else {
      //the email has not been sent
      $request->session()
      ->flash('report_on_sending_a_message', 'not sent');
    }

    return redirect('/feedback');
  }
}
