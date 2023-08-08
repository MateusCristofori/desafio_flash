<?php

function formatCEP(string $cep): string
{
    return trim(implode("", explode("-", $cep)));
}
