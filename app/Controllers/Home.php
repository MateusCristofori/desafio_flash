<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view("form_view");
    }

    public function validation()
    {
        helper(["viacep", "formatCEP"]);
        $db = db_connect();

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
            return redirect()->route("home.index", [session()->setFlashdata("errors", "CEP inválido. Tente novamente")]);
        }

        $data = [
            "firstName" => $this->request->getGetPost()["firstName"],
            "lastName" => $this->request->getGetPost()["lastName"],
            "email" => $this->request->getGetPost()["email"],
            "cpf" => $this->request->getGetPost()["cpf"],
            "cep" => $validationCEP->cep,
            "city" => $validationCEP->localidade,
            "status" => $this->request->getGetPost()["status"],
        ];
        $db->table("deliveryman")->insert($data);

        return redirect()->route("dashboard.index");
    }
}
