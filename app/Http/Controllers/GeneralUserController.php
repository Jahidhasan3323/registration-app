<?php

namespace App\Http\Controllers;

use App\Http\Resources\GeneralUserResource;
use App\Models\Board;
use App\Models\Division;
use App\Models\Exam;
use App\Models\GeneralEducationalQualification;
use App\Models\GeneralLanguage;
use App\Models\GeneralTraining;
use App\Models\GeneralUser;
use App\Models\Institute;
use Illuminate\Http\Request;
use App\Services\GeneralUserService;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class GeneralUserController extends Controller
{

    /**
     * @param Request $request
     * @return \Illuminate\Http\Resources\Json\AnonymousResourceCollection
     */
    public function index(Request $request)
    {
        $users = (new GeneralUserService)->getGeneralUser($request);
        $divisions = Division::get();
        return view('admin.general-user-list', compact('users', 'divisions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $divisions = Division::get();
        $exams = Exam::get();
        $institutes = Institute::get();
        $boards = Board::get();
        return view('registartion-form', compact('divisions', 'exams', 'institutes', 'boards'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        parse_str($request->form_data, $request_data);
        $validation_rules=$this->validation($request_data);
        $validator = Validator::make($request_data, $validation_rules);
        if ($validator->fails()){
            return response()->json(['errors'=>$validator->errors(), Response::HTTP_BAD_REQUEST]);
        }
        $userKeys = ['name','email', 'address'];
        $general_user = array_filter($request_data, function($v) use ($userKeys) {
            return in_array($v, $userKeys);
        }, ARRAY_FILTER_USE_KEY);
        $general_user['division_id']=$request_data['division'];
        $general_user['district_id']=$request_data['district'];
        $general_user['upazila_id']=$request_data['upazila'];
        $user = GeneralUser::create($general_user);
        foreach ($request_data['educations'] as $education ){
            $education_ins = new GeneralEducationalQualification();
            $education_ins->board_id=$education['board_id'];
            $education_ins->exam_id=$education['exam_id'];
            $education_ins->institute_id=$education['institute_id'];
            $education_ins->result=$education['result'];
            $education_ins->user_id=$user->id;
            $education_ins->save();
        }
        if ($request_data['training']){
            foreach ($request_data['training_opt'] as $training_opt) {
                $training_opt_ins = new GeneralTraining();
                $training_opt_ins->name = $training_opt['name'];
                $training_opt_ins->details = $training_opt['details'];
                $education_ins->user_id=$user->id;
                $training_opt_ins->save();
            }
        }
        if ($request_data['language']){
            foreach ($request_data['language'] as $language) {
                $language_ins = new GeneralLanguage();
                $language_ins->language = $language;
                $language_ins->user_id=$user->id;
                $language_ins->save();
            }
        }
        return response()->json(['data'=>$user, Response::HTTP_OK]);

    }

    /**
     * @param $request_data
     * @return array
     */
    public function validation($request_data){
        $rules = [];
        $rules['name'] = 'required|string';
        $rules['email'] = 'required|email|unique:general_users';
        $rules['photo'] = 'required|mimes:jpeg,png,jpg,gif';
        $rules['cv'] = 'required|mimes:pdf';
        $rules['division'] = 'required';
        $rules['district'] = 'required';
        $rules['upazila'] = 'required';
        $rules['address'] = 'required';
        $rules['educations.*.exam_id'] = 'required';
        $rules['educations.*.institute_id'] = 'required';
        $rules['educations.*.board_id'] = 'required';
        $rules['educations.*.result'] = 'required';
        $rules['language.*'] = 'required';
        if ($request_data['training']) {
            $rules['training_opt.*.name'] = 'required';
            $rules['training_opt.*.details'] = 'required';
        }
        return $rules;
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\GeneralUser $generalUser
     * @return \Illuminate\Http\Response
     */
    public function show(GeneralUser $generalUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\GeneralUser $generalUser
     * @return \Illuminate\Http\Response
     */
    public function edit(GeneralUser $generalUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\GeneralUser $generalUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, GeneralUser $generalUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\GeneralUser $generalUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(GeneralUser $generalUser)
    {
        //
    }
}
