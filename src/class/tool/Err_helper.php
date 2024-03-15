<?php

namespace CT275_project\tool;

class Err_helper {
    public bool $notError;
    public string $errorClassname;
    public string $errorMsg;
    public function __construct(string $errorClassname, string $errorMsg){
        $this->norError = false;
        $this->errorClassname = $errorClassname;
        $this->errorMsg = $errorMsg;
    }

    public function PDOFactoryErr(): ?string 
    {
        if ($this->errorClassname == "PDOFactory"){
            return $this->errorMsg;
        }
        return null;
    }

    public function errMsg(): string
    {
        return $this->errorMsg;
    }
}