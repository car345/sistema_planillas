<?php 
 
 include '../../../../../conecta.php';

 if(isset($_POST))
 {
    $id_modalidad=$_POST['cod_modal'];
    $sql="SELECT*FROM categoria where CODIGO ='$id_modalidad'";
    $result=mysqli_num_rows($query);
    mysqli_close($conn);
    $data ='';
    if($result>0)
    {
        $data=mysqli_fetch_assoc($query);
    }
    else
    {
        $data=0;
    }   
    echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }else
    {
        $data ='no';
        echo json_encode($data,JSON_UNESCAPED_UNICODE);
    }  
 }
?>