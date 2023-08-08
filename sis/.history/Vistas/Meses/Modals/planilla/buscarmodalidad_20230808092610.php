<?php 
 
 include '../../../../../conecta.php';

 if(isset($_POST))
 {
    $id_modalidad=$_POST['cod_modal'];
    $sql="SELECT*FROM modali where CODIGO ='$id_modalidad' ";
    $result=$conn->query($sql);
    $rows=mysqli_num_rows($result);
   
    $data ='';
    if($rows>0)
        {
            $data=mysqli_fetch_assoc($sql);
        }
        else
        {
            $data=0;
        }  
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
 }
?>