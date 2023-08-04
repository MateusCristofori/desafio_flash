<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        return view("form");
    }

    public function validation()
    {
        $rules = [
            "email" => "required|valid_email",
            "password" => "required",
            "cep" => "required",
            //"infoAddiotional" => "required",
        ];

        if ($this->validate($rules)) {
            return redirect()->route("dashboard.index");
        }

        return redirect()->route("/")->with("errors", $this->validator->listErrors())->withInput();
    }
}
