<?php
include("../src/view/header.php");

if (!isset($_GET["view"])){
    echo '<script> location.replace("index.php?view=indexmain"); </script>';
}else if($_GET["view"] == "indexmain"){
    include("../src/view/indexmain.php");
}else if($_GET["view"] == "book"){
    include("../src/view/book.php");
}else if($_GET["view"] == "type_of_book"){
    include("../src/view/type_of_book.php");
}else if($_GET["view"] == "personal"){
    include("../src/view/personal.php");
}else if($_GET["view"] == "tableDB"){
    include("../src/view/tableDB.php");
}else if($_GET["view"]== "borrow"){
    include("../src/view/borrow.php");
}

include("../src/view/footer.php");