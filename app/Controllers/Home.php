<?php

namespace App\Controllers;

use App\Models\DeliverymanModel;

class Home extends BaseController
{
    public function index(): string
    {
        return view("form_view");
    }

    public function validation()
    {
        $deliverymanModel = new DeliverymanModel();

        $validation = [
            "firstName" => [
                "rules" => "required",
                "errors" => ["required" => "O 'nome' é obrigatório"]
            ],
            "lastName" => [
                "rules" => "required",
                "errors" => ["required" => "O 'sobrenome' é obrigatório"]
            ],
            "email" => [
                "rules" => "required|valid_email",
                "errors" => ["required" => "O 'email' é obrigatório", "valid_email" => "O email precisa ser válido!"]
            ],
            "cpf" => [
                "rules" => "required|max_length[14]",
                "errors" => ["required" => "O 'CPF' é obrigatório"]
            ],
            "cep" => [
                "rules" => "required|max_length[9]",
                "errors" => ["required" => "O 'CEP' é obrigatório"]
            ],
            "status" => [
                "rules" => "required",
                "errors" => ["required" => "Escolha um valor válido."]
            ]
        ];
        if (!$this->validate($validation)) {
            return redirect()->route("home.index")->with("errors", $this->validator->getErrors())->withInput();
        }

        $cep = $this->request->getGetPost()["cep"];
        $validationCEP = viacep(formatCEP($cep));

        if (isset($validationCEP->erro)) {
            return redirect()->route("home.index", [session()->setFlashdata("cep_error", "CEP inválido. Tente novamente")]);
        }

        $cpf = $this->request->getPost("cpf");
        $email = $this->request->getPost("email");

        if ($deliverymanModel->where("cpf", $cpf)->orWhere("email", $email)->findAll(1)) {
            return redirect()->route("home.index", [session()->setFlashdata("emailcep_error", "Email ou CPF já cadastrados!")]);
        }

        $data = [
            "firstName" => $this->request->getPost("firstName"),
            "lastName" => $this->request->getPost("lastName"),
            "email" => $email,
            "cpf" => $cpf,
            "cep" => $validationCEP->cep,
            "city" => $validationCEP->localidade,
            "status" => $this->request->getPost("status"),
        ];
        $deliverymanModel->insert($data);

        return redirect()->route("dashboard.index");
    }
}
