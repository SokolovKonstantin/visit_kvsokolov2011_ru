<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Work_experience;

class WorkExperience extends Controller
{
  private $information_for_the_menu;
  private $information_for_the_main;

  private $work_experience ;

  public function showWorkExperience(Request $request)
  {
  //get language site from session
  $this->language = $request->session()->get('language');
  //translate start page
  if ($this->language==="rus") {
    $this->translateToRussian();
  } else {
    $this->translateToEnglish();
  }

  return view('work_experience',
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
    "topRightButton" => ["name"=>"Send a message", "route"=>"/feedback"],
    "buttonLabelLanguage" => "Русский",
  ];

  $this->gettingFromDB('eng');
}

private function translateToRussian()
{
  $this->information_for_the_menu = [
    "topLeftButton" => ["name"=>"На главную страницу", "route"=>"/"],
    "topMiddleButton" => ["name"=>"Обо мне", "route"=>"/about_me"],
    "topRightButton" => ["name"=>"Отправить сообщение", "route"=>"/feedback"],
    "buttonLabelLanguage" => "English",
  ];

  $this->gettingFromDB('rus');
}

private function gettingFromDB($language) {

  $work_experience = Work_experience::where('language', $language)
    ->orderBy('begin_of_work', 'desc')
    ->get();


  $this->work_experience = [];
  foreach ($work_experience as $experience) {
    array_push($this->work_experience,
      [
        'begin_of_work'=>$experience['begin_of_work'],
        'end_of_work' => (function($end_of_work, $language){
          //$end_of_work = $experience['end_of_work'];
          if ($end_of_work === '2200-01-01') {
            if ($language === 'rus'){
              return 'по настоящее время';
            } else {
              return 'currently';
            }
          } else {
            return $end_of_work;
          }
        })($experience['end_of_work'], $language),
        'name_of_the_organization' => $experience['name_of_the_organization'],
        'current_position' => $experience['current_position'],
        'functions_performed' => $experience['functions_performed'],
      ]);
  }

  $this->information_for_the_main['work_experience'] = $this->work_experience;
}
}
