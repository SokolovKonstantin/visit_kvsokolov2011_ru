<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Completed_projects;
use App\Models\Information_about_courses;
use App\Models\Information_about_education;
use App\Models\Information_about_the_programmer;
use App\Models\Key_skill_variables;
use App\Models\Key_skill;
use App\Models\Links_to_programmer_resources;
use App\Models\Messages;
use App\Models\Professional_interests;
use App\Models\Services_offered;
use App\Models\Site_visit_statistics;
use App\Models\Authentication;
use App\Models\Work_experience;

class Admin extends Controller
{
    private $fullInformation;
    private $completed_projects;
    private $information_about_courses;
    private $information_about_education;
    private $information_about_the_programmer;
    private $key_skill_variables;
    private $key_skill;
    private $links_to_programmer_resources;
    private $messages;
    private $professional_interests;
    private $services_offered;
    private $site_visit_statistics;
    private $work_experience;

    public function admin() {
      $this->dataFromDB();
      $this->fullInformation = [
        'completed_projects' => $this->completed_projects,
        'information_about_courses' => $this->information_about_courses,
        'information_about_education' => $this->information_about_education,
        'information_about_the_programmer' => $this->information_about_the_programmer,
        'key_skill_variables' => $this->key_skill_variables,
        'key_skill' => $this->key_skill,
        'links_to_programmer_resources' => $this->links_to_programmer_resources,
        'messages' => $this->messages,
        'professional_interests' => $this->professional_interests,
        'services_offered' => $this->services_offered,
        'site_visit_statistics' => $this->site_visit_statistics,
        'work_experience' => $this->work_experience,
      ];
      return view('admin',['fullInformation' => $this->fullInformation]);
    }

    private function dataFromDB() {
      $this->completed_projects = Completed_projects::all();
      $this->information_about_courses = Information_about_courses::all();
      $this->information_about_education = Information_about_education::all();
      $this->information_about_the_programmer = Information_about_the_programmer::all();
      $this->key_skill_variables = Key_skill_variables::find(1);
      $this->key_skill = Key_skill::all();
      $this->links_to_programmer_resources = Links_to_programmer_resources::all();
      $this->messages = Messages::orderBy('created_at','desc')->get();
      $this->professional_interests = Professional_interests::all();
      $this->services_offered = Services_offered::all();
      $this->site_visit_statistics = Site_visit_statistics::all();
      $this->work_experience = Work_experience::all();
    }

    public function completedProjectsUpdate(Request $request) {
      if (isset($request->id)) {
        $completed_project = Completed_projects::find($request->id);
      } else {
        $completed_project = new Completed_projects;
      }
      if (isset($completed_project)) {
        $completed_project->language = $request->language;
        $completed_project->name_of_project = $request->name_of_project;
        $completed_project->purpose_of_project = $request->purpose_of_project;
        $completed_project->applied_technologies = $request->applied_technologies;
        $completed_project->begin_of_project = $request->begin_of_project;
        $completed_project->end_of_project = $request->end_of_project;
        $completed_project->link_to_github = $request->link_to_github;

        if (isset($request->screenshot_of_the_start_page_file)) {
          $path_start_page = $request->screenshot_of_the_start_page_file->store('');
          Storage::delete($completed_project['screenshot_of_the_start_page']);
          $completed_project->screenshot_of_the_start_page = $path_start_page;
        }

        if (isset($request->screenshot_of_a_special_page_file)) {
          $path_special_page = $request->screenshot_of_a_special_page_file->store('');
          Storage::delete($completed_project['screenshot_of_a_special_page']);
          $completed_project->screenshot_of_a_special_page = $path_special_page;
        }

        $completed_project->save();
      }

      return redirect('/admin');
    }

    public function completedProjectsDelete(Request $request) {
      $completed_project = Completed_projects::find($request->id);
      if (isset($completed_project)) {
        $completed_project->delete();
      }
      return redirect('/admin');
    }

    public function informationAboutCoursesUpdate(Request $request) {
      if (isset($request->id)) {
        $course = Information_about_courses::find($request->id);
      } else {
        $course = new Information_about_courses;
      }
      if (isset($course)) {
        $course->language = $request->language;
        $course->name_of_organization = $request->name_of_organization;
        $course->date_of_receipt_of_the_document = $request->date_of_receipt_of_the_document;
        $course->name_of_the_course = $request->name_of_the_course;

        $course->save();
      }
      return redirect('/admin');
    }

    public function informationAboutCoursesDelete(Request $request) {
      $course = Information_about_courses::find($request->id);
      if (isset($course)) {
        $course->delete();
      }
      return redirect('/admin');
    }

    public function informationAboutEducationsUpdate(Request $request) {
      if (isset($request->id)) {
        $education = Information_about_education::find($request->id);
      } else {
        $education = new Information_about_education;
      }
      if (isset($education)) {
        $education->language = $request->language;
        $education->name_of_organization = $request->name_of_organization;
        $education->date_of_receipt_of_the_document = $request->date_of_receipt_of_the_document;
        $education->name_of_the_faculty = $request->name_of_the_faculty;
        $education->name_of_the_specialty = $request->name_of_the_specialty;

        $education->save();
      }
      return redirect('/admin');
    }

    public function informationAboutEducationsDelete(Request $request) {
      $education = Information_about_education::find($request->id);
      if (isset($education)) {
        $education->delete();
      }
      return redirect('/admin');
    }

    public function informationAboutProgrammerUpdate(Request $request) {
      if (isset($request->id)) {
        $programmer = Information_about_the_programmer::find($request->id);
      } else {
        $programmer = new Information_about_the_programmer;
      }
      if (isset($programmer)) {
        $programmer->language = $request->language;
        $programmer->gender_of_the_person = $request->gender_of_the_person;
        $programmer->date_of_birth = $request->date_of_birth;
        $programmer->country_of_residence = $request->country_of_residence;
        $programmer->city_of_residence = $request->city_of_residence;
        $programmer->phone = $request->phone;
        $programmer->email = $request->email;

        if (isset($request->photo)) {
          $path_photo = $request->photo->store('');
          Storage::delete($programmer['photo']);
          $programmer->photo = $path_photo;
        }

        $programmer->save();
      }
      return redirect('/admin');
    }

    public function informationAboutProgrammerDelete(Request $request) {
      $programmer = Information_about_the_programmer::find($request->id);
      if (isset($programmer)) {
        $programmer->delete();
      }
      return redirect('/admin');
    }

    public function informationSkillVariablesUpdate(Request $request) {
      if (isset($request->id)) {
        $variables = Key_skill_variables::find($request->id);
      } else {
        $variables = new Key_skill_variables;
      }
      if (isset($variables)) {
        $variables->theory_weighting_factor = $request->theory_weighting_factor;
        $variables->practice_weight_ratio = $request->practice_weight_ratio;
        $variables->new_discoveries_weighting_factor = $request->new_discoveries_weighting_factor;
        $variables->maximum_number_of_projects = $request->maximum_number_of_projects;
        $variables->maximum_number_of_new_discoveries = $request->maximum_number_of_new_discoveries;

        $variables->save();
      }
      return redirect('/admin');
    }

    public function informationSkillUpdate(Request $request) {
      if (isset($request->id)) {
        $skill = Key_skill::find($request->id);
      } else {
        $skill = new Key_skill;
      }
      if (isset($skill)) {
        $skill->skill = $request->skill;
        $skill->percentage_of_theory_study = $request->percentage_of_theory_study;
        $skill->number_of_practice = $request->number_of_practice;
        $skill->number_of_discoveries = $request->number_of_discoveries;

        $skill->save();
      }
      return redirect('/admin');
    }

    public function informationSkillDelete(Request $request) {
      $skill = Key_skill::find($request->id);
      if (isset($skill)) {
        $skill->delete();
      }
      return redirect('/admin');
    }

    public function informationLinkUpdate(Request $request) {
      if (isset($request->id)) {
        $link = Links_to_programmer_resources::find($request->id);
      } else {
        $link = new Links_to_programmer_resources;
      }
      if (isset($link)) {
        $link->resource_name = $request->resource_name;
        $link->host = $request->host;

        $link->save();
      }
      return redirect('/admin');
    }

    public function informationLinkDelete(Request $request) {
      $link = Links_to_programmer_resources::find($request->id);
      if (isset($link)) {
        $link->delete();
      }
      return redirect('/admin');
    }

    public function informationInterestsUpdate(Request $request) {
      if (isset($request->id)) {
        $interest = Professional_interests::find($request->id);
      } else {
        $interest = new Professional_interests;
      }
      if (isset($interest)) {
        $interest->language = $request->language;
        $interest->professional_interests = $request->professional_interests;

        $interest->save();
      }
      return redirect('/admin');
    }

    public function informationInterestsDelete(Request $request) {
      $interest = Professional_interests::find($request->id);
      if (isset($interest)) {
        $interest->delete();
      }
      return redirect('/admin');
    }

    public function informationServicesUpdate(Request $request) {
      if (isset($request->id)) {
        $service = Services_offered::find($request->id);
      } else {
        $service = new Services_offered;
      }
      if (isset($service)) {
        $service->language = $request->language;
        $service->services = $request->services;

        $service->save();
      }
      return redirect('/admin');
    }

    public function informationServicesDelete(Request $request) {
      $service = Services_offered::find($request->id);
      if (isset($service)) {
        $service->delete();
      }
      return redirect('/admin');
    }

    public function informationExperienceUpdate(Request $request) {
      if (isset($request->id)) {
        $experience = Work_experience::find($request->id);
      } else {
        $experience = new Work_experience;
      }
      if (isset($experience)) {
        $experience->language = $request->language;
        $experience->begin_of_work = $request->begin_of_work;
        $experience->end_of_work = $request->end_of_work;
        $experience->name_of_the_organization = $request->name_of_the_organization;
        $experience->current_position = $request->current_position;
        $experience->functions_performed = $request->functions_performed;

        $experience->save();
      }
      return redirect('/admin');
    }

    public function informationExperienceDelete(Request $request) {
      $experience = Work_experience::find($request->id);
      if (isset($experience)) {
        $experience->delete();
      }
      return redirect('/admin');
    }

    public function changingThePassword(Request $request) {
    
      $user = Authentication::find(1);

      $user->id = 1;
      $user->login = $request->new_login;
      $user->password = crypt($request->new_password_one, $request->new_login);
      $user->save();
      $request->session()->put('authorized', false);
      return redirect('/admin');
    }


}
