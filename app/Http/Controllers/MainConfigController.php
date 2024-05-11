<?php

namespace App\Http\Controllers;

use App\Models\MainConfig;
use Illuminate\Http\Request;
use App\Http\Requests\MainConfigRequest;

class MainConfigController extends Controller
{
    public function index()
    {
        $info = MainConfig::orderBy("id","desc")->first();
        return view("workspace.admin.institution_profile",compact("info"));
    }

    public function store(MainConfigRequest $request)
    {
        if($request->ajax())
        {
            MainConfig::create($request->all());

            return response()->json(["message"=>"Información de la institución registrada con exito."]);
        }
    }
}
