<?php
namespace App\Services;

use App\Models\GeneralUser;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GeneralUserService
{

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
}

?>
