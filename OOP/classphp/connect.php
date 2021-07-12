<?php

class info
{

    public $firstName;
    public $lastName;
    public $age;

    public function setName($first)
    {
        $this->firstName=$first;
    }
    public function getName()
    {
        return $this->firstName;
    }

}

$infomation =new info();
$infomation->setName("dao ngoc khue");
echo $infomation->getName();

class connectDatabase
{

    public $sever ;
    public $userName ;
    public $password ;
    public $dataName ;
    public $result ;
    public function Connection()
    {
        $this->sever="localhost";
        $this->userName = "root";
        $this->password ="root";
        $this->dataName ="Shop_cafe";
        $result = new mysqli($this->sever, $this->userName,$this->password,$this->dataName);
        return $result;

    }


}

class Edit_product extends connectDatabase
{

    public function insert($ID,$productName)
    {

      $this->Connection() ->query("insert into products values($ID,N'$productName')");

    }

}




$products = new Edit_product();
$products->insert(4,"cocacola");


?>