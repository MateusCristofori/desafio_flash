<?php

namespace App\Controllers;

use App\Classes\Search;
use App\Models\DeliverymanModel;
use CodeIgniter\Database\RawSql;

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
        $deliverymanID = $this->request->getPost("buttonInput");

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
            "firstName" => $this->request->getPost("firstName"),
            "lastName" => $this->request->getPost("lastName"),
            "updated_at" => new RawSql("CURRENT_TIMESTAMP"),
            "status" => $this->request->getGetPost("status")
        ];
        $deliveryModel->update($deliverymanID, $data);

        return redirect()->route("dashboard.index");
    }

    public function delete(int $deliverymanID)
    {
        $deliverymanModel = new DeliverymanModel();
        $deliverymanModel->delete($deliverymanID);
        return view("message_view");
    }

    public function filter()
    {
        $searchFilter = new Search();
        return $searchFilter->filterSearch($this->request->getPost("searchBar"));
    }
}
