<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Services_offered;
use App\Models\Professional_interests;
use App\Models\Information_about_the_programmer;
use App\Models\Links_to_programmer_resources;
use App\Models\Key_skill_variables;
use App\Models\Key_skill;
use App\Models\Information_about_education;
use App\Models\Information_about_courses;
use App\Models\Work_experience;
use App\Models\Completed_projects;
use App\Models\Site_visit_statistics;
use App\Models\Authentication;

class InitDB extends Controller
{
    public function init()
    {
      $services_offered = new Services_offered;
      //clean table
      $services_offered->truncate();

      $data = [

        ['language' => 'rus',
        'services' => 'Разработка сайтов под ключ',
        'created_at' => date('Y-m-d H:i:s')],

        ['language'=> 'rus',
        'services' => 'Разработка бэкенд сайта',
        'created_at' => date('Y-m-d H:i:s')],

        ['language'=> 'eng',
        'services' => 'Creating turnkey websites',
        'created_at' => date('Y-m-d H:i:s')],

        ['language'=> 'eng',
        'services' => 'Backend site development',
        'created_at' => date('Y-m-d H:i:s')],

      ];

      $services_offered->insert($data);

      $professional_interests = new Professional_interests;
      //clean table
      $professional_interests->truncate();

      $data = [

        ['language' => 'rus',
        'professional_interests' => 'Веб программирование',
        'created_at' => date('Y-m-d H:i:s')],

        ['language' => 'rus',
        'professional_interests' => 'Бэкенд программирование',
        'created_at' => date('Y-m-d H:i:s')],

        ['language' => 'eng',
        'professional_interests' => 'Web development',
        'created_at' => date('Y-m-d H:i:s')],

        ['language' => 'eng',
        'professional_interests' => 'Backend development',
        'created_at' => date('Y-m-d H:i:s')],
      ];

      $professional_interests->insert($data);

      $information_about_the_programmer = new Information_about_the_programmer;
      //clean table
      $information_about_the_programmer->truncate();

      $data = [

        ['language' => 'rus',
          'gender_of_the_person' => 'муж',
          'date_of_birth' => '1978-06-27',
          'city_of_residence' => 'Череповец',
          'country_of_residence' => 'Россия',
          'phone' => '+7(909)5974103',
          'email' => 'kvsokolov@mail.ru',
          'photo' => 'myImage/not_photo.jpg',
          'created_at' => date('Y-m-d H:i:s')],

          ['language' => 'eng',
            'gender_of_the_person' => 'male',
            'date_of_birth' => '1978-06-27',
            'city_of_residence' => 'Cherepovets',
            'country_of_residence' => 'Russia',
            'phone' => '+7(909)5974103',
            'email' => 'kvsokolov@mail.ru',
            'photo' => 'myImage/not_photo.jpg',
            'created_at' => date('Y-m-d H:i:s')],

      ];

      $information_about_the_programmer->insert($data);

      $links_to_programmer_resources = new Links_to_programmer_resources;
      //clean table
      $links_to_programmer_resources->truncate();

      $data = [

        [ 'resource_name' => 'Portfolio website',
          'host' => 'http://www.visit.kvsokolov2011.ru',
          'created_at' => date('Y-m-d H:i:s')],

        [ 'resource_name' => 'LinkedIn',
          'host' => 'http://www.linkedin.com/in/kvsokolov',
          'created_at' => date('Y-m-d H:i:s')],

        [ 'resource_name' => 'GitHub',
          'host' => 'https://github.com/SokolovKonstantin',
          'created_at' => date('Y-m-d H:i:s')],

      ];

      $links_to_programmer_resources->insert($data);

      $key_skill_variables = new Key_skill_variables;
      //clean table
      $key_skill_variables->truncate();

      $data = [

        [ 'theory_weighting_factor' => 0.33,
          'practice_weight_ratio' => 0.33,
          'new_discoveries_weighting_factor' => 0.33,
          'maximum_number_of_projects' => 100,
          'maximum_number_of_new_discoveries' => 100,
          'created_at' => date('Y-m-d H:i:s')],

      ];

      $key_skill_variables->insert($data);

      $key_skill = new Key_skill;
      //clean table
      $key_skill->truncate();

      $data = [

        [ 'skill' => 'HTML',
          'percentage_of_theory_study' => 90,
          'number_of_practice' => 3,
          'number_of_discoveries' => 0,
          'created_at' => date('Y-m-d H:i:s')],

        [ 'skill' => 'CSS',
          'percentage_of_theory_study' => 80,
          'number_of_practice' => 1,
          'number_of_discoveries' => 0,
          'created_at' => date('Y-m-d H:i:s')],

        [ 'skill' => 'JavaScript',
          'percentage_of_theory_study' => 80,
          'number_of_practice' => 1,
          'number_of_discoveries' => 0,
          'created_at' => date('Y-m-d H:i:s')],

        [ 'skill' => 'JQuery',
          'percentage_of_theory_study' => 5,
          'number_of_practice' => 1,
          'number_of_discoveries' => 0,
          'created_at' => date('Y-m-d H:i:s')],

        [ 'skill' => 'React',
          'percentage_of_theory_study' => 10,
          'number_of_practice' => 0,
          'number_of_discoveries' => 0,
          'created_at' => date('Y-m-d H:i:s')],

        [ 'skill' => 'PHP',
          'percentage_of_theory_study' => 80,
          'number_of_practice' => 1,
          'number_of_discoveries' => 0,
          'created_at' => date('Y-m-d H:i:s')],

        [ 'skill' => 'Laravel',
          'percentage_of_theory_study' => 90,
          'number_of_practice' => 1,
          'number_of_discoveries' => 0,
          'created_at' => date('Y-m-d H:i:s')],

        [ 'skill' => 'MySQL',
            'percentage_of_theory_study' => 80,
            'number_of_practice' => 2,
            'number_of_discoveries' => 0,
            'created_at' => date('Y-m-d H:i:s')],

        [ 'skill' => 'Git',
            'percentage_of_theory_study' => 80,
            'number_of_practice' => 0,
            'number_of_discoveries' => 0,
            'created_at' => date('Y-m-d H:i:s')],

        [ 'skill' => 'Bootstrap',
            'percentage_of_theory_study' => 80,
            'number_of_practice' => 0,
            'number_of_discoveries' => 0,
            'created_at' => date('Y-m-d H:i:s')],

        [ 'skill' => 'Adaptive design',
            'percentage_of_theory_study' => 90,
            'number_of_practice' => 1,
            'number_of_discoveries' => 0,
            'created_at' => date('Y-m-d H:i:s')],

      ];

      $key_skill->insert($data);

      $information_about_education = new Information_about_education;
      //clean table
      $information_about_education->truncate();

      $data = [

        [ 'language' => 'rus',
          'name_of_organization' => 'Томский государственный университет систем управления и радиоэлектроники, Томск',
          'date_of_receipt_of_the_document' => '2020-12-25',
          'name_of_the_faculty' => 'АОИ',
          'name_of_the_specialty' => 'Программная инженерия 09.03.04',
          'created_at' => date('Y-m-d H:i:s')],

        [ 'language' => 'eng',
          'name_of_organization' => 'Tomsk State University of Control Systems and Radio Electronics, Tomsk',
          'date_of_receipt_of_the_document' => '2020-12-25',
          'name_of_the_faculty' => 'Faculty of Control Systems',
          'name_of_the_specialty' => 'Software engineering',
          'created_at' => date('Y-m-d H:i:s')],

        [ 'language' => 'rus',
          'name_of_organization' => 'Рыбинский государственный авиационный технический университет им. П.А. Соловьева, Рыбинск',
          'date_of_receipt_of_the_document' => '2003-06-28',
          'name_of_the_faculty' => 'ФРЭИ',
          'name_of_the_specialty' => 'Промышленная электроника',
          'created_at' => date('Y-m-d H:i:s')],

        [ 'language' => 'eng',
          'name_of_organization' => 'Rybinsk Solovyov State Aviation Technical University, Rybinsk',
          'date_of_receipt_of_the_document' => '2003-06-28',
          'name_of_the_faculty' => 'Faculty of Electrical Engineering and Radio Electronics',
          'name_of_the_specialty' => 'Industrial Electronics',
          'created_at' => date('Y-m-d H:i:s')],

      ];

      $information_about_education->insert($data);

      $information_about_courses = new information_about_courses;
      //clean table
      $information_about_courses->truncate();

      $data = [

        [ 'language' => 'rus',
          'name_of_organization' => 'freeCodeCamp',
          'date_of_receipt_of_the_document' => '2021-08-25',
          'name_of_the_course' => 'Адаптивный веб дизайн',
          'created_at' => date('Y-m-d H:i:s')],

        [ 'language' => 'rus',
          'name_of_organization' => 'freeCodeCamp',
          'date_of_receipt_of_the_document' => '2021-09-21',
          'name_of_the_course' => 'JavaScript. Алгоритмы и структуры данных',
          'created_at' => date('Y-m-d H:i:s')],

        [ 'language' => 'eng',
          'name_of_organization' => 'freeCodeCamp',
          'date_of_receipt_of_the_document' => '2021-08-25',
          'name_of_the_course' => 'Responsive Web Design',
          'created_at' => date('Y-m-d H:i:s')],

        [ 'language' => 'eng',
          'name_of_organization' => 'freeCodeCamp',
          'date_of_receipt_of_the_document' => '2021-09-21',
          'name_of_the_course' => 'JavaScript Algorithms and Data Structures',
          'created_at' => date('Y-m-d H:i:s')],

      ];

      $information_about_courses->insert($data);


      $work_experience = new Work_experience;
      //clean table
      $work_experience->truncate();

      $data = [

        [ 'language' => 'rus',
          'begin_of_work' => '2021-11-04',
          'end_of_work' => '2200-01-01',
          'name_of_the_organization' => 'Фриланс',
          'current_position' => 'Веб разработчик',
          'functions_performed' => 'Проектирование, разработка сайтов под ключ',
          'created_at' => date('Y-m-d H:i:s')],

        [ 'language' => 'eng',
          'begin_of_work' => '2021-11-04',
          'end_of_work' => '2200-01-01',
          'name_of_the_organization' => 'Freelance',
          'current_position' => 'Full stack web developer',
          'functions_performed' => 'Design development of turnkey websites',
          'created_at' => date('Y-m-d H:i:s')],

        [ 'language' => 'rus',
          'begin_of_work' => '2004-06-14',
          'end_of_work' => '2200-01-01',
          'name_of_the_organization' => 'ПАО "Северсталь"',
          'current_position' => 'Специалист электроник',
          'functions_performed' => 'Ремонт различного электронного оборудования,
            поверка и калибровка электронных измерительных приборов.
            Измерение и анализ качества электроэнергии.
            Наладка и обслуживание систем автоматизированного учета
            электроэнергии.',
          'created_at' => date('Y-m-d H:i:s')],

        [ 'language' => 'eng',
          'begin_of_work' => '2004-06-14',
          'end_of_work' => '2200-01-01',
          'name_of_the_organization' => 'PJSC "Severstal"',
          'current_position' => 'Electronics specialist',
          'functions_performed' => 'Repair of various electronic equipment,
            verification and calibration of electrical measuring devices.
            Measurement and analysis of electricity quality indicators.
            Maintenance and adjustment of automated commercial electricity
            metering systems.',
          'created_at' => date('Y-m-d H:i:s')],

        [ 'language' => 'rus',
          'begin_of_work' => '2003-08-1',
          'end_of_work' => '2003-03-28',
          'name_of_the_organization' => 'ОАО "Холодмаш"',
          'current_position' => 'Специалист электроник',
          'functions_performed' => 'Обслуживание, ремонт, наладка станков с ЧПУ.',
          'created_at' => date('Y-m-d H:i:s')],

        [ 'language' => 'eng',
          'begin_of_work' => '2003-08-1',
          'end_of_work' => '2003-03-28',
          'name_of_the_organization' => 'JSC "Kholodmash"',
          'current_position' => 'Electronics specialist',
          'functions_performed' => 'Maintenance of CNC machines.',
          'created_at' => date('Y-m-d H:i:s')],

        [ 'language' => 'rus',
          'begin_of_work' => '2000-10-01',
          'end_of_work' => '2003-01-15',
          'name_of_the_organization' => 'ФГУП КБ "ЛУЧ"',
          'current_position' => 'Специалист электроник',
          'functions_performed' => 'Разработка импульсных блоков питания.',
          'created_at' => date('Y-m-d H:i:s')],

        [ 'language' => 'eng',
          'begin_of_work' => '2000-10-01',
          'end_of_work' => '2003-01-15',
          'name_of_the_organization' => 'FSUE KB "Luch"',
          'current_position' => 'Electronics specialist',
          'functions_performed' => 'Development of switching power supplies.',
          'created_at' => date('Y-m-d H:i:s')],

        [ 'language' => 'rus',
          'begin_of_work' => '1997-06-16',
          'end_of_work' => '1998-08-25',
          'name_of_the_organization' => 'ОАО "ЭВМ"',
          'current_position' => 'Регулировщик радиоэлектронной аппаратуры',
          'functions_performed' => 'Регулировка радиоэлектронного оборудования оборонного назначения.',
          'created_at' => date('Y-m-d H:i:s')],

        [ 'language' => 'eng',
          'begin_of_work' => '1997-06-16',
          'end_of_work' => '1998-08-25',
          'name_of_the_organization' => 'JSC "EVM"',
          'current_position' => 'Radio and electronic equipment adjuster',
          'functions_performed' => 'Adjustment of radio-electronic equipment for defense purposes.',
          'created_at' => date('Y-m-d H:i:s')],

      ];

      $work_experience->insert($data);

      $completed_projects = new Completed_projects;
      //clean table
      $completed_projects->truncate();

      $data = [

        [ 'language' => 'rus',
          'name_of_project' => 'Сайт портфолио',
          'purpose_of_project' => 'Презентация программиста,
            в которой указаны умения и навыки в определенной области.
            Своеобразный аналог резюме, визитная карточка, способная
            рассказать о всех талантах и преимуществах кандидата.',
          'applied_technologies' => 'HTML, CSS, JQuery, JavaScript,
            PHP, Laravel, MySQL',
          'begin_of_project' => '2021-11-18',
          'end_of_project' => '2200-01-01',
          'link_to_github' => 'www.http',
          'screenshot_of_the_start_page' => 'myImage/not_photo.jpg',
          'screenshot_of_a_special_page' => 'myImage/not_photo.jpg',
          'created_at' => date('Y-m-d H:i:s')],

        [ 'language' => 'eng',
          'name_of_project' => 'Portfolio Website',
          'purpose_of_project' => 'Presentation of the programmer,
            which specifies the skills and abilities in a certain area.
            A kind of analogue of a resume, a business card capable of
            tell about all the talents and advantages of the candidate.',
          'applied_technologies' => 'HTML, CSS, JQuery, JavaScript,
            PHP, Laravel, MySQL',
          'begin_of_project' => '2021-11-18',
          'end_of_project' => '2200-01-01',
          'link_to_github' => 'www.http',
          'screenshot_of_the_start_page' => 'myImage/not_photo.jpg',
          'screenshot_of_a_special_page' => 'myImage/not_photo.jpg',
          'created_at' => date('Y-m-d H:i:s')],

      ];

      $completed_projects->insert($data);

/*
      $site_visit_statistics = new site_visit_statistics;
      //clean table
      $site_visit_statistics->truncate();

      $data = [

        [ 'name_of_page' => 'start page',
          'number_of_visits' => 0,
          'created_at' => date('Y-m-d H:i:s')],

        [ 'name_of_page' => 'about me',
          'number_of_visits' => 0,
          'created_at' => date('Y-m-d H:i:s')],

      ];

      $site_visit_statistics->insert($data);
*/
      $authentication = new Authentication;
      //clean table
      $authentication->truncate();

      $data = [

        [ 'login' => 'admin',
          'password' => crypt('admin', 'admin'),
          'created_at' => date('Y-m-d H:i:s')],

      ];

      $authentication->insert($data);




      return view('init_db_ok');


    }
}
