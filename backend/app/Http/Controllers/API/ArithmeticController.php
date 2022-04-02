<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Interfaces\IArithmeticServices;
use Illuminate\Support\Facades\Validator;

class ArithmeticController extends Controller
{
    protected $arithmetic_service;

    public function __construct(IArithmeticServices $arithmetic_service)
    {
        $this->arithmetic_service = $arithmetic_service;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function get_all_operators()
    {
        $result = ['status' => 200];
        
        try {
            $result['data'] = $this->arithmetic_service->get_all_operators();
        } catch (Exception $e) {
            $result = [
                'status' => 500,
                'error' => $e->getMessage()
            ];
        }

        return response()->json($result, $result['status']);
    }

    /**
     * check arithmetic opertions for the requested resources.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function check_arithmetic_operations(Request $request)
    {
        $response = ['status' => 200];
        $data = $request->all();

        $validator = Validator::make($data, [
            'number1' => 'required|numeric',
            'number2' => 'required|numeric',
            'emoji_code' => 'required|max:50',
        ]);

        if($validator->fails()){
            return response(['error' => $validator->errors(), 'msg' => 'Validation Error']);
        }

        $response['arithmetic_result'] = $this->arithmetic_service->get_arithmetic_result($data);

        return response()->json($response, $response['status']);
    }

}
