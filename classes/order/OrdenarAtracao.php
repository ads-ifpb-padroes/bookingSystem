<?php

abstract class OrdenarAtracao
{

    protected $successor;
   
    public abstract function checar(OrdenarStatus $status);
   
    public function sucedicoPor(OrdenarAtracao $successor)
    {
        $this->successor = $successor;
    }
   
    public function proximo(OrdenarStatus $status)
    {
        if ($this->successor) {
            $this->successor->checar($status);
        }
    }
    
}
