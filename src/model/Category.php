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

    public function getCategory($con){
        try {
            $query="SELECT id,category_name FROM category";
            $stmt=$con->prepare($query);
            $stmt->execute();
            if($stmt->rowCount()>0){
                while($row=$stmt->fetch(PDO::FETCH_ASSOC)){
                    $catList[]=$row;
                }
                return $catList;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    public function createCategory($con,$id){
        try {
            $query2="SELECT category_name FROM category WHERE LOWER(category_name)=LOWER(?)";
            $stmt=$con->prepare($query2);
            $stmt->bindParam(1,$this->categoryName);
            if($stmt->rowCount()>0){
                return false;
            }else{
                $query="INSERT INTO category(category_name,created_by,updated_by) VALUES (?,?,?)";
                $stmt=$con->prepare($query);
                $stmt->bindParam(1,$this->categoryName);
                $stmt->bindParam(2,$id);
                $stmt->bindParam(3,$id);
                $stmt->execute();
                return $stmt->rowCount()>0;
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function deleteCategory($con,$id){
        try {
            $query="DELETE FROM category WHERE id=?";
            $stmt=$con->prepare($query);
            $stmt->bindParam(1,$id);
            $stmt->execute();
            return $stmt->rowCount()>0;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
