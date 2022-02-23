<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Completed_projects;

class CompletedProjects extends Controller
{
  private $information_for_the_menu;
  private $information_for_the_main;

  private $completed_projects ;

  public function showCompletedProjects(Request $request)
  {
    //get language site from session
    $this->language = $request->session()->get('language');
    //translate start page
    if ($this->language==="rus") {
      $this->translateToRussian();
    } else {
      $this->translateToEnglish();
    }

    return view('completed_projects',
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

    $completed_projects = Completed_projects::where('language', $language)
      ->orderBy('end_of_project', 'desc')
      ->get();

    $this->completed_projects = [];
    foreach ($completed_projects as $project) {
      array_push($this->completed_projects,
        [
          'language' => $project['language'],
          'name_of_project'=>$project['name_of_project'],
          'purpose_of_project' => $project['purpose_of_project'],
          'applied_technologies' => $project['applied_technologies'],
          'begin_of_project' => $project['begin_of_project'],
          'end_of_project' =>(function($language, $endProject){
            if ($endProject === '2200-01-01') {
              if ($language === 'rus') {
                return 'по текущее время';
              } else {
                return 'currently';
              }
            } else {
              return $endProject;
            }
          })($language, $project['end_of_project']),
          'link_to_github' => $project['link_to_github'],
          'screenshot_of_the_start_page' => $project['screenshot_of_the_start_page'],
          'screenshot_of_a_special_page' => $project['screenshot_of_a_special_page'],
        ]);
    }

    $this->information_for_the_main['completedProjects'] = $this->completed_projects;
  }
}
