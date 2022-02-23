<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\Professional_interests;
use App\Models\Services_offered;
use App\Models\Key_skill_variables;
use App\Models\Key_skill;


class CreateStartPage extends Controller
{

    private $routeCurrentUrl;
    private $language;
    private $professionalInterests;
    private $servicesOffered;
    private $information_for_the_menu;
    private $information_for_the_main;
    private $keySkillVariables;
    private $keySkills;

    public function showStartPage(Request $request)
    {
      //get language site from session
      $this->language = $request->session()->get('language');
      //translate start page
      if ($this->language==="rus") {
        $this->translateToRussian();
      } else {
        $this->translateToEnglish();
      }

      return view('start_page',
        [
          'information_for_the_menu'=>$this->information_for_the_menu,
          'information_for_the_main'=>$this->information_for_the_main
        ]);
    }

    private function translateToEnglish()
    {
      $this->information_for_the_menu = [
        "topLeftButton" => ["name"=>"About me", "route"=>"/about_me"],
        "topMiddleButton" => ["name"=>"My projects", "route"=>"/completed_projects"],
        "topRightButton" => ["name"=>"Send a message", "route"=>"/feedback"],
        "buttonLabelLanguage" => "Русский",
      ];

      $this->information_for_the_main = [
        "introducingMe" => "Konstantin Sokolov, full stack web developer.",
        "typeOfWork" => "Freelance, remote work, part-time work.",
      ];

      $this->gettingFromDB('eng');
    }

    private function translateToRussian()
    {
      $this->information_for_the_menu = [
        "topLeftButton" => ["name"=>"Обо мне", "route"=>"/about_me"],
        "topMiddleButton" => ["name"=>"Выполненные проекты", "route"=>"/completed_projects"],
        "topRightButton" => ["name"=>"Отправить сообщение", "route"=>"/feedback"],
        "buttonLabelLanguage" => "English",
      ];

      $this->information_for_the_main = [
        "introducingMe" => "Соколов Константин, fullstack веб разработчик.",
        "typeOfWork" => "Фриланс, удаленная работа, подработка",
      ];

      $this->gettingFromDB('rus');

    }

    private function gettingFromDB($language) {

      $professional_interests = Professional_interests::where('language', $language)
        ->orderBy('professional_interests')
        ->get();

      $services_offered = Services_offered::where('language', $language)
        ->orderBy('services')
        ->get();

      $this->keySkillVariables = Key_skill_variables::find(1);

      $this->keySkills = [];
      $key_skill = Key_Skill::all();
      foreach ($key_skill as $skill){
        array_push($this->keySkills,
          ['nameSkill' => $skill['skill'],
          'levelSkill' => $this->skillLevelCalculation($skill)]);
      }

      $this->professionalInterests = [];
      foreach ($professional_interests as $interest){
        array_push($this->professionalInterests, $interest->professional_interests);
      }

      $this->servicesOffered = [];
      foreach ($services_offered as $services){
        array_push($this->servicesOffered, $services->services);
      }

      $this->information_for_the_main['services'] = $this->servicesOffered;
      $this->information_for_the_main['interests'] = $this->professionalInterests;
      $this->information_for_the_main['levelSkill'] = $this->keySkills;

    }

    //Skill calculation method
    private function skillLevelCalculation($skill){
      return $skill['percentage_of_theory_study']*$this->keySkillVariables['theory_weighting_factor']
      + $this->keySkillVariables['practice_weight_ratio']
              *$skill['number_of_practice']*100/$this->keySkillVariables['maximum_number_of_projects']
      + $this->keySkillVariables['new_discoveries_weighting_factor']
              *$skill['number_of_discoveries']*100/$this->keySkillVariables['maximum_number_of_new_discoveries'];
    }

    
}
