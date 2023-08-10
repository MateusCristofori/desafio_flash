<?php

namespace App\Controllers;

use App\Models\DeliverymanModel;
use App\Controllers\Search;

class Dashboard extends BaseController
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

    public function updateDelivery(int $deliverymanID)
    {
        $deliverymanModel = new DeliverymanModel();
        return view("update_delivery_view", ["deliveryman" => $deliverymanModel->find($deliverymanID)]);
    }

    public function validation()
    {
        $deliveryModel = new DeliverymanModel();
        $deliverymanID = $this->request->getGetPost()["buttonInput"];

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
                "rules" => "required",
                "errors" => ["required" => "O status precisa ser selecionado."]
            ]
        ];
        if (!$this->validate($validation)) {
            return redirect()->route("dashboard.index")->with("errors", $this->validator->getErrors())->withInput();
        }

        $data = [
            "firstName" => $this->request->getGetPost()["firstName"],
            "lastName" => $this->request->getGetPost()["lastName"],
            "status" => $this->request->getGetPost()["status"]
        ];
        $deliveryModel->update($deliverymanID, $data);

        return redirect()->route("dashboard.index");
    }

    public function delete(int $deliverymanID)
    {
        $deliverymanModel = new DeliverymanModel();
        $deliverymanModel->delete($deliverymanID);
        return view("messages_view", ["message" => "Usuário deletado com sucesso."]);
    }

    public function filter()
    {
        $deliveryamModel = new DeliverymanModel();
        $searchBarInfo = $this->request->getPost("searchBar");

        if (empty($searchBarInfo)) {
            return redirect()->route("dashboard.index", [session()->setFlashdata("errors", "Campo de busca não pode estar vazio.")]);
        }

        $filtered = $deliveryamModel
            ->like(["firstName" => "%" . $searchBarInfo . "%"])
            ->orLike(["lastName" => "%" . $searchBarInfo . "%"])
            ->orLike(["cpf" => "%" . $searchBarInfo . "%"])
            ->orLike(["status" => "%" . $searchBarInfo . "%"])
            ->orderBy("created_at", "DESC")
            ->findAll();

        if (!$filtered) {
            return redirect()->route("dashboard.index", [session()->setFlashdata("errors", "Usuário não encontrado. Tente novamente.")]);
        }
        return view("dashboard_view", ["filtered" => $filtered, "pager" => $deliveryamModel->pager]);
    }
}
