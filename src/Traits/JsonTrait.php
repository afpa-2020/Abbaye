<?php

namespace App\Traits;

/**
 * Trait appliqué à l'ensemble de nos Entity afin d'en faciliter le transfert via Ajax.
 */
trait JsonTrait {

    /**
     *Encode l'entité en Json passable via une méthode Ajax.
     * @return string
     */
    public function toJson(){
        return json_encode(get_object_vars($this));
    }

    /**
     *Retourne un tableau associatif contenant les propriétés (y compris privées) de l'objet.
     * @return array
     */
    public function toJsonArray(){
        return get_object_vars($this);
    }
}