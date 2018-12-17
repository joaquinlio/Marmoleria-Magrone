<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class pedidoVal implements Rule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $productos = explode("/", $value);
        $numeros = count($productos);
        $resultado = true;
        for ($i=0; $i <$numeros ; $i++) { 
            $producto = explode(",", $productos[$i]);
            if ($producto[5] == "opcion2" || $producto[5] == "opcion3" && $producto[5] =="opcion4" ) {
                $resultado = false;               
            }
        }
        return $resultado;  
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Selecionar solo Opcion 1 para Generar Pedido';
    }
}
