<?php 
    require_once __DIR__ . '/../private/database.php';
    global $database;
    $data = [];
    if(isset($_SESSION['lang'])){
        $data = $database->get_text_in_language($_SESSION['lang']);
    }
?>
<section>
    <h4>
        <?php global $data; echo $data['page_title']; ?>
    </h4>
    <p>
        <?php 
        global $data; 
        echo $data['introduction']; 
        ?>
    </p>
    <p>
        <?php 
        global $data; 
        echo $data['about']; 
        ?>
    </p>
</section>