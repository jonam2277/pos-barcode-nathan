 <?php
    try{
        $pdo = new PDO('mysql:host=localhost;dbname=post_barcode_db','root','');
     }catch(PDOException $e){
        echo $e->getMessage();
    }