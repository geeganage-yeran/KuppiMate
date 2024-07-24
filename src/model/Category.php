<?php
class Category
{
    private $categoryId;
    private $categoryName;
    public function setcategoryname($categoryName){
        $this->categoryName = $categoryName;
    }
    public function getCategoryId($con){
        try {
            $query="SELECT id FROM category WHERE category_name=?" ;
            $stmt=$con->prepare($query);
            $stmt->bindParam(1,$this->categoryName);
            $stmt->execute();
            if($stmt->rowCount()>0){
                $row=$stmt->fetch(PDO::FETCH_ASSOC);
                $this->categoryId=$row['id'];
                return $this->categoryId;
            }

        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
