<?php

namespace App\Controllers;

use App\Models\DeliverymanModel;

class Search extends BaseController
{
    public function index($searchBarInfo)
    {
        // var_dump($searchBarInfo);

        $deliveryamModel = new DeliverymanModel();
        if (!empty($searchBarInfo)) {
            var_dump("Entrou no IF");
            $filtered = $deliveryamModel->like(["firstName" => "%" . $searchBarInfo . "%"])->findAll();
            var_dump("Depois da query builder");
            return view("dashboard_view", ["filtered" => $filtered, "pager" => $deliveryamModel->pager]);
        }
        var_dump("Nao entrou no IF");
        return redirect()->route("dashboard.index");
    }

    // public function filterByCpf()
    // {
    //     $deliveryamModel = new DeliverymanModel();
    //     $cpf = $this->request->getPost("searchBar");
    //     if (!empty($cpf)) {
    //         $filteredByCpf = $deliveryamModel->like(["cpf" => "%" . $cpf . "%"])->findAll();
    //         return view("dashboard_view", ["deliveries" => $filteredByCpf, "pager" => $deliveryamModel->pager]);
    //     }
    //     return view("dashboard_view");
    // }

    // public function filterByStatus()
    // {
    //     $deliveryamModel = new DeliverymanModel();
    //     $status = $this->request->getPost("searchBar");
    //     if (!empty($status)) {
    //         $filteredByStatus = $deliveryamModel->like(["statu" => "%" . $status . "%"])->findAll();
    //         return view("dashboard_view", ["deliveries" => $filteredByStatus, "pager" => $deliveryamModel->pager]);
    //     }
    //     return view("dashboard_view");
    // }
}
