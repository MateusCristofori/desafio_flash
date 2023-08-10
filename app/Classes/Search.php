<?php

namespace App\Classes;

use App\Models\DeliverymanModel;

class Search
{
    public function filterSearch(string $searchBarInfo)
    {
        $deliveryamModel = new DeliverymanModel();

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
