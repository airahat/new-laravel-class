<?php 
namespace App\Http\Controllers;
use App\Models\Trainee;

 class TraineeController
{
        public function index() {
            $trainees = Trainee::all();
            return view('admin.pages.trainees.index', ['trainees' => $trainees]);
            // return view('pages.about');
        }
        public function show($id) {
            $trainees = Trainee::findTrainee($id);
            return view('admin.pages.trainees.show', ['trainees' => $trainees]);
            // return view('pages.about');
        }


}




?>