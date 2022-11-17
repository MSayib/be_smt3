<?php

namespace App\Http\Controllers;

use App\Http\Requests\PatientStoreRequest;
use App\Http\Requests\PatientUpdateRequest;
use App\Http\Resources\PatientResource;
use App\Http\Resources\PatientSingleResource;
use App\Models\Patient;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class PatientController extends Controller
{
    public function __construct()
    {
        /**
         * Membuat middleware untuk memprotect seluruh fungsi di route ini
         */
        $this->middleware('auth:sanctum');
    }

    public function index()
    {
        return PatientResource::collection(Patient::latest()->paginate(10))
            ->additional(["message" => "Get all resource"])
            ->response()
            ->setStatusCode(200);
    }

    public function store(PatientStoreRequest $request)
    {
        $patient = Patient::create($request->validated());
        $data = [
            'message' => 'Resource is added successfully',
            'data' => new PatientSingleResource($patient)
        ];
        return response()->json($data, 201);
    }

    public function show(Patient $patient)
    {
        $data = [
            'message' => 'Get detail resource',
            'data' => new PatientSingleResource($patient)
        ];
        return response()->json($data, 200);
    }

    public function update(PatientUpdateRequest $request, Patient $patient)
    {
        $patient->update($request->validated());
        $data = [
            'message' => 'Resource is updated successfully',
            'data' => new PatientSingleResource($patient)
        ];
        return response()->json($data, 200);
    }

    public function destroy(Patient $patient)
    {
        $patient->delete();
        $data = [
            'message' => 'Resource is deleted successfully',
        ];
        return response()->json($data, 200);
    }

    public function search(Request $request)
    {
        /**
         * Mencari data berdasarkan nama
         * Return selalu paginate, berisi total data
         */
        $patient = Patient::where('name', 'like', '%' . $request->name . '%')->paginate(10);
        if ($patient->count() > 0) {
            return PatientResource::collection($patient)
                ->additional(["message" => "Get searched resource"])
                ->response()
                ->setStatusCode(200);
        }
        throw new NotFoundHttpException();
    }

    public function negative()
    {
        $patient = Patient::where('status_id', 1)->paginate(10);
        if ($patient->count() > 0) {
            return PatientResource::collection($patient)
                ->additional(["message" => "Get negative resource"])
                ->response()
                ->setStatusCode(200);
        }
        throw new NotFoundHttpException();
    }

    public function positive()
    {
        $patient = Patient::where('status_id', 2)->paginate(10);
        if ($patient->count() > 0) {
            return PatientResource::collection($patient)
                ->additional(["message" => "Get positive resource"])
                ->response()
                ->setStatusCode(200);
        }
        throw new NotFoundHttpException();
    }

    public function recovered()
    {
        $patient = Patient::where('status_id', 3)->paginate(10);
        if ($patient->count() > 0) {
            return PatientResource::collection($patient)
                ->additional(["message" => "Get recovered resource"])
                ->response()
                ->setStatusCode(200);
        }
        throw new NotFoundHttpException();
    }

    public function dead()
    {
        $patient = Patient::where('status_id', 4)->paginate(10);
        if ($patient->count() > 0) {
            return PatientResource::collection($patient)
                ->additional(["message" => "Get dead resource"])
                ->response()
                ->setStatusCode(200);
        }
        throw new NotFoundHttpException();
    }
}
