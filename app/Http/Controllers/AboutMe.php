<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Information_about_the_programmer;
use App\Models\Information_about_education;
use App\Models\Information_about_courses;
use App\Models\Links_to_programmer_resources;
use DateTime;

class AboutMe extends Controller
{
  private $information_for_the_menu;
  private $information_for_the_main;

  private $information_about_the_programmer ;
  private $information_about_education;
  private $information_about_courses;
  private $links_to_programmer_resources;

  public function showAboutMe(Request $request)
  {
    //get current URL
    //$this->routeCurrentUrl = url()->current();
    //get language site from session
    $this->language = $request->session()->get('language');
    //translate start page
    if ($this->language==="rus") {
      $this->translateToRussian();
    } else {
      $this->translateToEnglish();
    }

    return view('about_me',
      [
        'information_for_the_menu'=>$this->information_for_the_menu,
        'information_for_the_main'=>$this->information_for_the_main
      ]);
  }

  private function translateToEnglish()
  {
    $this->information_for_the_menu = [
      "topLeftButton" => ["name"=>"Main page", "route"=>"/"],
      "topMiddleButton" => ["name"=>"Work experience", "route"=>"/about_me/work_experience"],
      "topRightButton" => ["name"=>"Send a message", "route"=>"/feedback"],
      "buttonLabelLanguage" => "Русский",
    ];

    $this->gettingFromDB('eng');
  }

  private function translateToRussian()
  {
    $this->information_for_the_menu = [
      "topLeftButton" => ["name"=>"На главную страницу", "route"=>"/"],
      "topMiddleButton" => ["name"=>"Опыт работы", "route"=>"/about_me/work_experience"],
      "topRightButton" => ["name"=>"Отправить сообщение", "route"=>"/feedback"],
      "buttonLabelLanguage" => "English",
    ];

    $this->gettingFromDB('rus');
  }

  private function gettingFromDB($language) {

    $information_about_the_programmer = Information_about_the_programmer::where('language', $language)
      ->first();

    $information_about_education = Information_about_education::where('language', $language)
      ->orderBy('date_of_receipt_of_the_document', 'desc')
      ->get();

    $information_about_courses = Information_about_courses::where('language', $language)
      ->orderBy('date_of_receipt_of_the_document', 'desc')
      ->get();

    $links_to_programmer_resources = Links_to_programmer_resources::all();

    $this->information_about_the_programmer['gender_of_the_person'] =
      $information_about_the_programmer['gender_of_the_person'];

    $dateRightNow = new DateTime("now");
    $dateTimeBirthday = new DateTime($information_about_the_programmer['date_of_birth']);
    $this->information_about_the_programmer['age'] =
      $dateTimeBirthday->diff($dateRightNow)->format('%y');

    $age = substr($this->information_about_the_programmer['age'], -1, 1);
    settype($age, "integer");

    if ($language === 'rus'){
      if ($age === 1){
        $this->information_about_the_programmer['years_word'] = 'год';
      }

      if (in_array($age, [2, 3, 4])){
        $this->information_about_the_programmer['years_word'] = 'года';
      }

      if (in_array($age, [5, 6, 7, 8 ,9, 0])) {
        $this->information_about_the_programmer['years_word'] = 'лет';
      }

      $this->information_about_the_programmer['links_word'] = 'Ссылки:';
      $this->information_about_the_programmer['education_word'] = 'Высшее образование:';
      $this->information_about_the_programmer['courses_word'] = 'Курсы:';

    } else {
        $this->information_about_the_programmer['years_word'] = 'years';
        $this->information_about_the_programmer['links_word'] = 'Links:';
        $this->information_about_the_programmer['education_word'] = 'Higher education:';
        $this->information_about_the_programmer['courses_word'] = 'Courses:';
    }

    $this->information_about_the_programmer['city_of_residence'] =
      $information_about_the_programmer['city_of_residence'];

    $this->information_about_the_programmer['country_of_residence'] =
      $information_about_the_programmer['country_of_residence'];

    $this->information_about_the_programmer['phone'] =
      $information_about_the_programmer['phone'];

    $this->information_about_the_programmer['email'] =
      $information_about_the_programmer['email'];

    $this->information_about_the_programmer['photo'] =
      $information_about_the_programmer['photo'];


    $this->information_about_education = [];
    foreach ($information_about_education as $education) {
      array_push($this->information_about_education,
        [
          'name_of_organization'=>$education['name_of_organization'],
          'date_of_receipt_of_the_document' => $education['date_of_receipt_of_the_document'],
          'name_of_the_faculty' => $education['name_of_the_faculty'],
          'name_of_the_specialty' => $education['name_of_the_specialty']
        ]);
    }

    $this->information_about_courses = [];
    foreach ($information_about_courses as $courses) {
      array_push($this->information_about_courses,
        [
          'name_of_organization'=>$courses['name_of_organization'],
          'date_of_receipt_of_the_document' => $courses['date_of_receipt_of_the_document'],
          'name_of_the_course' => $courses['name_of_the_course'],
        ]);
    }

    $this->links_to_programmer_resources=[];
    foreach ($links_to_programmer_resources as $resources) {
      array_push($this->links_to_programmer_resources,
        [
          'resource_name' => $resources['resource_name'],
          'host' => $resources['host']
        ]);
    }


    $this->information_for_the_main['informationAboutTheProgrammer'] = $this->information_about_the_programmer;
    $this->information_for_the_main['informationAboutEducation'] = $this->information_about_education;
    $this->information_for_the_main['informationAboutCourses'] = $this->information_about_courses;
    $this->information_for_the_main['linksToProgrammerResources'] = $this->links_to_programmer_resources;
  }
}
