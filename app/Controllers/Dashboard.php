<?php

namespace App\Controllers;

use App\Models\DeliverymanModel;
use CodeIgniter\Controller;

class Dashboard extends Controller
{

    public function index()
    {
        $deliverymanModel = new DeliverymanModel();

        $data = [
            "deliveries" => $deliverymanModel->orderBy("created_at", "DESC")->paginate(10),
            "pager" => $deliverymanModel->pager
        ];

        return view("dashboard_view", $data);
    }

    public function updateDelivery()
    {
        return view("update_delivery_view");
    }

    public function validation()
    {
        $validation = [
            "firstName" => [
                "rules" => "string",
                "errors" => ["string" => "Seu nome deve conter apenas letras."]
            ],
            "lastName" => [
                "rules" => "string",
                "errors" => ["string" => "Seu sobrenome deve conter apenas letras."]
            ],
            "status" => [
                "rules" => "matches['A confirmar', 'A caminho', 'Entregue',]",
                "errors" => ["matches" => "Selecione um status válido."]
            ]
        ];
    }
}
