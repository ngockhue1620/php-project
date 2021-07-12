<?php


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

class Edit_product extends connectDatabase{

    public function show_all(){
        global $productsName;

        $sql="select * from products";
        $result= $this->Connection() ->query($sql);


        while($row = $result->fetch_assoc())
        {
            $productsName[]=$row;

        }
        return $productsName;
    }

    public function Count_(){
              $sql="select * from products";
              $result= $this->Connection() ->query($sql);

             $dem=0;
              while($row = $result->fetch_assoc())
              {
                      $dem+=1;

              }
              return $dem;
    }

    public function insert($ID,$productName){

      $this->Connection() ->query("insert into products(ProductId,ProductName) values($ID,N'$productName')");
    }

    public function delete($id)
    {
        $this->Connection()->query("delete from products where ProductId=$id");
        $this->Connection()->close();
    }

    public function update($id,$values)
    {
        $this->Connection()->query("update  products set productName=N'$values' where ProductId=$id ");
    }


}










?>