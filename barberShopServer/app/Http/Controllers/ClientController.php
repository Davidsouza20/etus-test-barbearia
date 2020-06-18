<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientController extends Controller
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }
    public function index() {
        $clients = Client::all();
        return response()->json($clients);
    }

    public function show($id) {
        $client = Client::find($id);
        return response()->json($client);
    }

    public function create(Request $request) {
        try {
            $client = $this->client->create($request->all());

            return response()->json([
                'msg' => 'Cliente criado com sucesso!',
                'client' => $client
            ], 201);

        } catch (\Exception $e) {
            if(config('app.debug')) {
                return response()->json([
                    'message' => $e->getMessage(),
                    'code' => 500

                ]);
            }
            return response()->json([
                'message' => 'Houve um erro ao realizar operação de criar cliente',
                'code' => 500
            ]);
        }
    }

    public function update(Request $request, $id) {
        try {
            $client = Client::find($id)->update($request->all());

            return response()->json([
                'msg' => 'Cliente alterado com sucesso!',
                'client' => $client
            ], 201);

        } catch (\Exception $e) {
            if(config('app.debug')) {
                return response()->json([
                    'message' => $e->getMessage(),
                    'code' => 500
                ]);
            }
            return response()->json([
                'message' => 'Houve um erro ao realizar operação de alterar cliente',
                'code' => 500
            ]);
        }
    }

    public function delete($id) {
        try {
            Client::find($id)->delete();

            return response()->json([
                'msg' => 'Cliente deletado com sucesso!',
            ], 201);

        } catch (\Exception $e) {
            if(config('app.debug')) {
                return response()->json([
                    'message' => $e->getMessage(),
                    'code' => 500

                ]);
            }
            return response()->json([
                'message' => 'Houve um erro ao realizar operação de deletar cliente',
                'code' => 500
            ]);
        }
    }

}
