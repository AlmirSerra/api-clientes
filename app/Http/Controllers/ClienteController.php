<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use OpenApi\Annotations as OA;

/**
 * @OA\Info(
 *      title="API de Clientes",
 *      version="1.0.0",
 *      description="Documentação da API de Clientes"
 * )
 */

class ClienteController extends Controller
{
    public function store(Request $request)
    {
        // Validação dos campos
        $validator = Validator::make($request->all(), [
            'nome_completo' => 'required|string|max:255',
            'data_nascimento' => 'required|date',
            'tipo_pessoa' => 'required|in:Física,Jurídica',
            'cpf_cnpj' => 'required_if:tipo_pessoa,Física|nullable|string|max:255|unique:clientes,cpf_cnpj',
            'email' => 'required|email|max:255|unique:clientes,email',
            'endereco' => 'required|string|max:255',
            'cep' => 'required|string|max:255',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $cliente = Cliente::create($request->all());

        return response()->json(['message' => 'Cliente criado com sucesso', 'cliente' => $cliente], 201);
    }

    public function show($id)
    {
        $cliente = Cliente::find($id);

        if (!$cliente) {
            return response()->json(['message' => 'Cliente não encontrado'], 404);
        }

        return response()->json($cliente);
    }
}
