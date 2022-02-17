<?php
namespace App\Services;

use App\Models\GeneralEducationalQualification;
use App\Models\GeneralLanguage;
use App\Models\GeneralTraining;
use App\Models\GeneralUser;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;

class GeneralUserService
{

    /**
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function getGeneralUser(Request $request)
    {
        $query     = GeneralUser::with('division', 'district', 'upazila');

        if ($request->filled('name')) {
            $query->where('name','like', '%'. $request->name.'%');
        }
        if ($request->filled('email')) {
            $query->where('email','like', '%'. $request->email.'%');
        }
        if ($request->filled('division')) {
            $query->where('division_id',$request->division);
        }
        if ($request->filled('district')) {
            $query->where('district_id',$request->district);
        }
        if ($request->filled('upazila')) {
            $query->where('upazila_id',$request->upazila);
        }

        return $query->paginate(10);
    }

    /**
     * @param Request $request
     * @param $id
     * @return \Illuminate\Database\Eloquent\Builder|\Illuminate\Database\Eloquent\Model|object|null
     */
    public function getGeneralUserShow(Request $request, $id){
        $query     = GeneralUser::with('division', 'district', 'upazila', 'trainings', 'languages', 'educationalQualifications');
        $query->where('id', $id);
        return $query->first();
    }

    public function storeGeneralUser($request_data){
        $userKeys                    = ['name', 'email', 'address'];
        $general_user                = array_filter($request_data, function ($v) use ($userKeys) {
            return in_array($v, $userKeys);
        }, ARRAY_FILTER_USE_KEY);
        $general_user['division_id'] = $request_data['division'];
        $general_user['district_id'] = $request_data['district'];
        $general_user['upazila_id']  = $request_data['upazila'];
        $user                        = GeneralUser::create($general_user);
        foreach ($request_data['educations'] as $education) {
            $education_ins               = new GeneralEducationalQualification();
            $education_ins->board_id     = $education['board_id'];
            $education_ins->exam_id      = $education['exam_id'];
            $education_ins->institute_id = $education['institute_id'];
            $education_ins->result       = $education['result'];
            $education_ins->user_id      = $user->id;
            $education_ins->save();
        }
        if ($request_data['training']) {
            foreach ($request_data['training_opt'] as $training_opt) {
                $training_opt_ins          = new GeneralTraining();
                $training_opt_ins->name    = $training_opt['name'];
                $training_opt_ins->details = $training_opt['details'];
                $education_ins->user_id    = $user->id;
                $training_opt_ins->save();
            }
        }
        if ($request_data['language']) {
            foreach ($request_data['language'] as $language) {
                $language_ins           = new GeneralLanguage();
                $language_ins->language = $language;
                $language_ins->user_id  = $user->id;
                $language_ins->save();
            }
        }
    }

    /**
     * @param $request_data
     * @return void
     */
    public function updateGeneralUser($request_data, $id){
        $userKeys                    = ['name', 'email', 'address'];
        $general_user                = array_filter($request_data, function ($v) use ($userKeys) {
            return in_array($v, $userKeys);
        }, ARRAY_FILTER_USE_KEY);
        $general_user['division_id'] = $request_data['division'];
        $general_user['district_id'] = $request_data['district'];
        $general_user['upazila_id']  = $request_data['upazila'];
        $user                        = GeneralUser::where('id',$id)->create($general_user);
        foreach ($request_data['educations'] as $education) {
            $education_ins               = GeneralEducationalQualification::find($education);
            $education_ins->board_id     = $education['board_id'];
            $education_ins->exam_id      = $education['exam_id'];
            $education_ins->institute_id = $education['institute_id'];
            $education_ins->result       = $education['result'];
            $education_ins->user_id      = $user->id;
            $education_ins->save();
        }
        if ($request_data['training']) {
            foreach ($request_data['training_opt'] as $training_opt) {
                $training_opt_ins          = new GeneralTraining();
                $training_opt_ins->name    = $training_opt['name'];
                $training_opt_ins->details = $training_opt['details'];
                $education_ins->user_id    = $user->id;
                $training_opt_ins->save();
            }
        }
        if ($request_data['language']) {
            foreach ($request_data['language'] as $language) {
                $language_ins           = new GeneralLanguage();
                $language_ins->language = $language;
                $language_ins->user_id  = $user->id;
                $language_ins->save();
            }
        }
    }

    /**
     * @param $request_data
     * @return array
     */
    public function validation($request_data)
    {
        $rules                              = [];
        $rules['name']                      = 'required|string';
        $rules['email']                     = 'required|email|unique:general_users';
        $rules['division']                  = 'required';
        $rules['district']                  = 'required';
        $rules['upazila']                   = 'required';
        $rules['address']                   = 'required';
        $rules['educations.*.exam_id']      = 'required';
        $rules['educations.*.institute_id'] = 'required';
        $rules['educations.*.board_id']     = 'required';
        $rules['educations.*.result']       = 'required';
        $rules['language.*']                = 'required';
        if ($request_data['training']) {
            $rules['training_opt.*.name']    = 'required';
            $rules['training_opt.*.details'] = 'required';
        }
        return $rules;
    }

}

?>
