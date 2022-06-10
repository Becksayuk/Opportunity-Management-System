<?php
include_once $_SERVER['DOCUMENT_ROOT'] ."/oms/model/employer_class.php";
class EmployerView extends Employer {
    function selectCategoryView(){
        $result  = $this->selectCategory();
        foreach($result as $row){
            $id = $row['id'];
            $category = $row['category'];
            ?>
            <input type="checkbox" name="category[]" value="<?php echo $id;?>"><?php echo $category;?>
            <?php
        }
    }
}