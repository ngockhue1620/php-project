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
        $this->dataName ="quanlybanhang";
        $result = new mysqli($this->sever, $this->userName,$this->password,$this->dataName);
        return $result;

    }


}
class Edit_Customer extends connectDatabase{

    public function AddUser($Users,$password)
    {

         $sql="insert into customers(Users,Password,role)
             values(N'$Users','$password','customers')";

        if( $this->Connection()->query($sql)==true)
        {   
            $this->Connection()->close();
            return true;
        } 
        return false; 


    }
    public function check_login($userName,$password)
    {
        $sql=" select * from customers where Users='$userName' and Password='$password' ";

        $result = $this->Connection()->query($sql); 
        $id=null;
        $role=null;
         while($row = $result->fetch_assoc())
        {   
            
            $id=$row['CustomerId'];
            $role = $row['role'];

        }
        
        return array($id,$role);
   }




}

class Products extends connectDatabase{

    public function Category($CategoryName)
    {
       
        $result=null;
        $sql = "insert into category(CategoryName) values(N'$CategoryName')";
        
    
      
        
        if (  $this->Connection()->query($sql)=== TRUE) {
                $last_id = $this->Connection()->insert_id;
                 return "New record created successfully. Last inserted ID is: " . $last_id;
        }
        else {
                     echo "Error: " . $sql . "<br>" . $this->Connection()->error;
        }
    }
//-----------------------
    public function Category_list()
    {
        $list=null;

        $result= $this-> Connection()->query("select*from category");
        while( $row =$result->fetch_assoc())
        {
            $list[]=$row;
        }   
        return $list;

    }

//-------------$_POST['introduce'],$_POST['note'], $_POST['picture'])
    public function insert_product($CategoryId,
                                   $ProductName,
                                   $Amount,
                                   $price,
                                   $introduce,
                                   $note,
                                   $picture,
                                   $Chip,
                                   $ram,
                                   $CD_driver,
                                   $graphic_card,
                                   $screen)
    {
            $sql="insert into products(ProductName,Amount,Price,CategoryId,introduce,note,picture,Chip,ram,CD_driver,graphic_card,screen) 
                    values(N'$ProductName',
                             $Amount,
                             $price,
                             $CategoryId,
                             N'$introduce',
                             N'$note',
                             '$picture',
                             N'$Chip',
                             '$ram',
                             N'$CD_driver',
                             '$graphic_card',
                             '$screen') ";
        if( $this->Connection()->query($sql)==true)
        {
            return true;
        }
        return false;
    }
//-------------------
    
}


class get_Products extends connectDatabase{

    public function get_product()
    {


        $sql= "select *from products inner join category on products.CategoryId=category.CategoryId";
        $products_list=null;
        $result =$this->Connection()->query($sql);
        while ($row=$result->fetch_assoc()) {

           $products_list[]=$row;
        }
        return $products_list;
    }

    public function get_product_for_muahang($ProductId)
    {
        $sql ="select ProductId,
                      ProductName,
                      picture,Price,
                      Chip,
                      ram,
                      CD_driver,
                      graphic_card,
                      screen  from products where ProductId=$ProductId ; ";
        
        $result =$this->Connection()->query($sql);
        $products_list=null;
    while ($row=$result->fetch_assoc()) {

           $products_list[]=$row;
            }
        
        return $products_list;
    }

    


}


?>
