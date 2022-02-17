<?php

namespace App\Http\Controllers;

use App\Http\Resources\GeneralUserResource;
use App\Models\Board;
use App\Models\District;
use App\Models\Division;
use App\Models\Exam;
use App\Models\GeneralEducationalQualification;
use App\Models\GeneralLanguage;
use App\Models\GeneralTraining;
use App\Models\GeneralUser;
use App\Models\Institute;
use App\Models\Upazila;
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
        $users     = (new GeneralUserService)->getGeneralUser($request);
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
        $divisions  = Division::get();
        $exams      = Exam::get();
        $institutes = Institute::get();
        $boards     = Board::get();
        return view('registartion-form', compact('divisions', 'exams', 'institutes', 'boards'));
    }


    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        parse_str($request->form_data, $request_data);

        $validation_rules =  (new GeneralUserService)->validation($request_data);
        $validator        = Validator::make($request_data, $validation_rules);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => Response::HTTP_BAD_REQUEST]);
        }
        $user     = (new GeneralUserService)->storeGeneralUser($request_data);
        return response()->json(['data' => $user, 'status' => Response::HTTP_OK, 'msg' => 'Data stored successfully']);

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
    public function edit(Request $request, $id)
    {
        $divisions  = Division::get();
        $districts  = District::get();
        $upazilas   = Upazila::get();
        $exams      = Exam::get();
        $institutes = Institute::get();
        $boards     = Board::get();
        $user      = (new GeneralUserService)->getGeneralUserShow($request, $id);
        return view('admin.registartion-form-edit', compact('user', 'divisions', 'districts', 'upazilas', 'exams', 'institutes', 'boards'));
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

        return response()->json(['status' => Response::HTTP_OK, 'msg' => 'this module is not complete. I am working on it ']);
        parse_str($request->form_data, $request_data);

        $validation_rules =  (new GeneralUserService)->validation($request_data);
        $validator        = Validator::make($request_data, $validation_rules);
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors(), 'status' => Response::HTTP_BAD_REQUEST]);
        }
        $user     = (new GeneralUserService)->updateGeneralUser($request_data);
        return response()->json(['data' => $user, 'status' => Response::HTTP_OK, 'msg' => 'Data stored successfully']);

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
