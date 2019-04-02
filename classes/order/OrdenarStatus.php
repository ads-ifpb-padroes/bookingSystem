<?php

class OrdenarStatus
{
    public $porValor = false;

    public $porData = true;


    public function __construct()
    {
        
    }

    function setPorData($porData)
   {
     $this->porData = $porData;
   }

   function setPorValor($porValor)
   {
     $this->porValor = $porValor;
   }
    

}
