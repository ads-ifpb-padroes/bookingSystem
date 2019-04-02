<?php

//set page headers
$page_title = "Deletar atração";
include_once "header.php";
include_once 'classes/database.php';
include_once 'classes/atracao.php';
include_once 'initial.php';
// get database connection

$atracao = new atracao($db);

// check if the submit button yes was clicked
if (isset($_POST['del-btn']))
{
    $id = $_GET['id'];
    $atracao->delete($id);
    header("Location: delete.php?deleted");
}
      // check if the Atração was deleted
      if(isset($_GET['deleted'])){
        echo "<div class=\"alert alert-success alert-dismissable\">";
        echo "<button type=\"button\" class=\"close\" data-dismiss=\"alert\" aria-hidden=\"true\">
                    &times;
              </button>";
        echo "Success! A atração foi deletada.";
        echo "</div>";
      }
?>
<!-- Bootstrap Form for deleting a Atração -->
<?php
    if (isset($_GET['id'])) {
        echo "<form method='post'>";
            echo "<table class='table table-hover table-responsive table-bordered'>";
                echo "<input type='hidden' name='id' value='id' />";
                    echo"<div class='alert alert-warning'>";
                        echo"Você realmente quer deletar essa atração?";
                    echo"</div>";
                echo"<button type='submit' class='btn btn-danger' name='del-btn'>";
                    echo"Sim";
                echo"</button>";
                    echo str_repeat('&nbsp;', 2);
                echo"<a href='index.php' class='btn btn-default' role='button'>";
                    echo" Não";
                echo"</a>";
            echo"</table>";
        echo"</form>";
    }
else {  // Back to the first page
        echo"<a href='index.php' class='btn btn-large btn-success'><span class='glyphicon glyphicon-backward'></span> Home </a>";
     }
?>

<?php
include_once "footer.php";
?>