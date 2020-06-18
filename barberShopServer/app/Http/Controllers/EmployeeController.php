<?php

namespace App\Http\Controllers;

use App\Employee;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EmployeeController extends Controller
{
    protected $employee;

    public function __construct(Employee $employee)
    {
        $this->employee = $employee;
    }

    public function index() {
        $employees = Employee::all();
        return response()->json($employees);
    }

    public function show($email) {
        $employee = DB::table('employees')->where('email', $email)->first();
        return !empty($employee) ? response()->json($employee) : response()->json('Profissional não cadastrado');
    }

    public function create(Request $request) {
        try {
            $employee = $this->employee->create($request->all());

            return response()->json([
                'msg' => 'Profissional criado com sucesso!',
                'employee' => $employee
            ], 201);

        } catch (\Exception $e) {
            if(config('app.debug')) {
                return response()->json([
                    'message' => $e->getMessage(),
                    'code' => 500
                ]);
            }
            return response()->json([
                'message' => 'Houve um erro ao realizar operação de salvar',
                'code' => 500
            ]);
        }
    }


}
