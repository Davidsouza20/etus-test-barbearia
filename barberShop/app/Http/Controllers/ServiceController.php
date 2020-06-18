<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    private $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }

    public function index() {
        $services = Service::with('client:id,name,email,phone')->get();
        return response()->json($services);
    }

    public function show($id) {
        $service = Service::find($id);
        return response()->json($service);
    }

    public function create(Request $request) {
        try {
            $service = $this->service->create($request->all());

            return response()->json([
                'msg' => 'Serviço criado com sucesso!',
                'service' => $service
            ], 201);

        } catch (\Exception $e) {
            if(config('app.debug')) {
                return response()->json([
                    'message' => $e->getMessage(),
                    'code' => 500
                ]);
            }
            return response()->json([
                'message' => 'Houve um erro ao realizar operação de agendar serviço',
                'code' => 500
            ]);
        }

    }

    public function update(Request $request, $id) {
        try {
            $service = Service::find($id)->update($request->all());

            return response()->json([
                'msg' => 'Serviço  alterado com sucesso!',
                'service' => $service
            ], 201);

        } catch (\Exception $e) {
            if(config('app.debug')) {
                return response()->json([
                    'message' => $e->getMessage(),
                    'code' => 500
                ]);
            }
            return response()->json([
                'message' => 'Houve um erro ao realizar operação de alterar serviço',
                'code' => 500
            ]);
        }
    }

    public function delete($id) {
        try {
            Service::find($id)->delete();

            return response()->json([
                'msg' => 'Serviço deletado com sucesso!',
            ], 201);

        } catch (\Exception $e) {
            if(config('app.debug')) {
                return response()->json([
                    'message' => $e->getMessage(),
                    'code' => 500
                ]);
            }
            return response()->json([
                'message' => 'Houve um erro ao realizar operação de deletar serviço',
                'code' => 500
            ]);
        }
    }
}
