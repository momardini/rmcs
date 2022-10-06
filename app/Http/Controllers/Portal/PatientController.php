<?php

namespace App\Http\Controllers\Portal;

use App\Models\Patient;
use Exception;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use TCG\Voyager\Events\BreadDataAdded;
use TCG\Voyager\Events\BreadDataDeleted;
use TCG\Voyager\Events\BreadDataRestored;
use TCG\Voyager\Events\BreadDataUpdated;
use TCG\Voyager\Events\BreadImagesDeleted;
use TCG\Voyager\Facades\Voyager;
use TCG\Voyager\Http\Controllers\Traits\BreadRelationshipParser;

class PatientController extends \TCG\Voyager\Http\Controllers\Controller
{
    use BreadRelationshipParser;

    //***************************************
    //               ____
    //              |  _ \
    //              | |_) |
    //              |  _ <
    //              | |_) |
    //              |____/
    //
    //      Browse our Data Type (B)READ
    //
    //****************************************

    public function index(Request $request)
    {
        // GET THE SLUG, ex. 'posts', 'pages', etc.
        $slug = 'patients';

        // GET THE DataType based on the slug
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();
        $model = app($dataType->model_name);

        $dataTypeContent = $model::first();
        // Check permission
        $this->authorize('browse', app($dataType->model_name));
        $actions = [];
        if (!empty($dataTypeContent)) {
            foreach (Voyager::actions() as $action) {
                $action = new $action($dataType, $dataTypeContent);

                if ($action->shouldActionDisplayOnDataType()) {
                    $actions[] = $action;
                }
            }
        }

        return view('portal.patients.index',compact(
            'actions',
            'dataType'));
    }

    //***************************************
    //                ______
    //               |  ____|
    //               | |__
    //               |  __|
    //               | |____
    //               |______|
    //
    //  Edit an item of our Data Type BR(E)AD
    //
    //****************************************

    public function edit(Request $request, $id)
    {
        $slug = 'patients';
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);
            $query = $model->query();
            if ($model && in_array(SoftDeletes::class, class_uses_recursive($model))) {
                $query = $query->withTrashed();
            }
            if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
                $query = $query->{$dataType->scope}();
            }
            $dataTypeContent = call_user_func([$query, 'findOrFail'], $id);
        } else {
            // If Model doest exist, get data from table name
            $dataTypeContent = DB::table($dataType->name)->where('id', $id)->first();
        }

        // Check permission
        $this->authorize('edit', $dataTypeContent);
        $view = 'portal.patients.edit-add';
        return Voyager::view($view, compact('dataType', 'dataTypeContent'));
    }

    //***************************************
    //
    //                   /\
    //                  /  \
    //                 / /\ \
    //                / ____ \
    //               /_/    \_\
    //
    //
    // Add a new item of our Data Type BRE(A)D
    //
    //****************************************

    public function create(Request $request)
    {
        $slug = 'patients';
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        $dataTypeContent = (strlen($dataType->model_name) != 0)
            ? new $dataType->model_name()
            : false;
        $view = 'portal.patients.edit-add';
        return Voyager::view($view, compact('dataType', 'dataTypeContent'));
    }

    public function make_appointment(Request $request)
    {
        $patient_id = $request->patient_id;
        $slug = 'appointments';
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        $dataTypeContent = (strlen($dataType->model_name) != 0)
            ? new $dataType->model_name()
            : false;
        $patient = Patient::findOrFail($patient_id);
        $view = 'portal.patients.edit-add-appointment';
        return Voyager::view($view, compact('dataType', 'dataTypeContent','patient'));
    }
    public function edit_appointment(Request $request)
    {
        $patient_id = $request->patient_id;
        $slug = 'appointments';
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('edit', app($dataType->model_name));
        $patient = Patient::findOrFail($patient_id);
        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);
            $query = $model->query();
            if ($model && in_array(SoftDeletes::class, class_uses_recursive($model))) {
                $query = $query->withTrashed();
            }
            if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
                $query = $query->{$dataType->scope}();
            }
            $dataTypeContent = call_user_func([$query, 'findOrFail'], $patient->editable_appointment->id);
        } else {
            // If Model doest exist, get data from table name
            $dataTypeContent = DB::table($dataType->name)->where('id', $patient->editable_appointment->id)->first();
        }

        $view = 'portal.patients.edit-add-appointment';
        return Voyager::view($view, compact('dataType', 'dataTypeContent','patient'));
    }
    public function take_sign(Request $request)
    {
        $patient_id = $request->patient_id;
        $slug = 'signs';
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        $dataTypeContent = (strlen($dataType->model_name) != 0)
            ? new $dataType->model_name()
            : false;
        $patient = Patient::findOrFail($patient_id);
        $view = 'portal.patients.edit-add-sign';
        return Voyager::view($view, compact('dataType', 'dataTypeContent','patient'));
    }
    public function edit_sign(Request $request)
    {
        $patient_id = $request->patient_id;
        $slug = 'signs';
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('edit', app($dataType->model_name));
        $patient = Patient::findOrFail($patient_id);
        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);
            $query = $model->query();
            if ($model && in_array(SoftDeletes::class, class_uses_recursive($model))) {
                $query = $query->withTrashed();
            }
            if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
                $query = $query->{$dataType->scope}();
            }
            $dataTypeContent = call_user_func([$query, 'findOrFail'], $patient->active_sign->id);
        } else {
            // If Model doest exist, get data from table name
            $dataTypeContent = DB::table($dataType->name)->where('id', $patient->active_sign->id)->first();
        }

        $view = 'portal.patients.edit-add-sign';
        return Voyager::view($view, compact('dataType', 'dataTypeContent','patient'));
    }
    public function do_interview(Request $request)
    {

        $patient_id = $request->patient_id;
        $patient = Patient::findOrFail($patient_id);
        if(!$patient->active_appointment){
            return to_route('portal.patients.index');
        }
        $slug = 'interviews';
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('add', app($dataType->model_name));

        $dataTypeContent = (strlen($dataType->model_name) != 0)
            ? new $dataType->model_name()
            : false;

        $view = 'portal.patients.edit-add-interview';
        return Voyager::view($view, compact('dataType', 'dataTypeContent','patient'));
    }
    public function edit_interview(Request $request)
    {
        $patient_id = $request->patient_id;
        $patient = Patient::findOrFail($patient_id);
        if(!$patient->active_appointment){
            return to_route('portal.patients.index');
        }
        $slug = 'interviews';
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();

        // Check permission
        $this->authorize('edit', app($dataType->model_name));
        if (strlen($dataType->model_name) != 0) {
            $model = app($dataType->model_name);
            $query = $model->query();
            if ($model && in_array(SoftDeletes::class, class_uses_recursive($model))) {
                $query = $query->withTrashed();
            }
            if ($dataType->scope && $dataType->scope != '' && method_exists($model, 'scope'.ucfirst($dataType->scope))) {
                $query = $query->{$dataType->scope}();
            }
            $dataTypeContent = call_user_func([$query, 'findOrFail'], $patient->active_appointment->interview->id);
        } else {
            // If Model doest exist, get data from table name
            $dataTypeContent = DB::table($dataType->name)->where('id', $patient->active_appointment->interview->id)->first();
        }

        $view = 'portal.patients.edit-add-interview';
        return Voyager::view($view, compact('dataType', 'dataTypeContent','patient'));
    }
    public function add_analytics_result(Request $request)
    {
        $patient_id = $request->patient_id;
        $patient = Patient::findOrFail($patient_id);
        $slug = 'analytics';
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();
        // Check permission
        $this->authorize('edit', app($dataType->model_name));
        $view = 'portal.patients.edit-add-analytics-result';
        return Voyager::view($view, compact('dataType', 'patient'));
    }
    public function follow_interview(Request $request)
    {
        $patient_id = $request->patient_id;
        $patient = Patient::findOrFail($patient_id);
        if(!$patient->active_appointment){
            return to_route('portal.patients.index');
        }
        $slug = 'interviews';
        $dataType = Voyager::model('DataType')->where('slug', '=', $slug)->first();
        // Check permission
        $this->authorize('add', app($dataType->model_name));

        $view = 'portal.patients.follow-interview';
        return Voyager::view($view, compact('dataType', 'patient'));
    }

}
