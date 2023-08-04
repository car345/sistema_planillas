<?php
include "../../../conecta.php";

if($_POST['action']== 'searchcliente' )
{
    if(!empty($_POST['cliente']))
    {
        if(strlen($_POST['cliente'])==8)
        {
            
        
        $dni_cliente=$_POST['cliente'];
        $query =mysqli_query($conn,"SELECT *FROM datperso WHERE  CODIGO='$dni_cliente' and id_estado NOT IN (4,5)    ");
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
    }else
    {
       
    }  
    } 


    if($_POST['action']== 'searchclientes' )
    {
    if(!empty($_POST['cliente']))
    {
        $dni_cliente=$_POST['cliente'];
        $mes=$_POST['mes'];
        $query =mysqli_query($conn,"SELECT * FROM persxmes p inner join datperso d on p.REGISTRO=d.id_datperso WHERE p.REGMES='$mes' and  d.NUMERO_DOC='$dni_cliente'  ");
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
        }    
    } 
    


    if($_POST['action']== 'dnimes' )
{
    if(!empty($_POST['cliente']))
    {
        $mesactual=$_POST['mes'];
        $mes=$_POST['cliente'];
        $query =mysqli_query($conn,"SELECT * FROM meses m
        INNER JOIN tiplanil t ON m.id_tiplanil = t.id_tiplanil
        WHERE m.id_meses = '$mes' AND m.id_meses NOT IN ('$mesactual')");
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
        }
     }
 


    
    if($_POST['action']== 'eliminardescuento' )
    {
        if(!empty($_POST['id']))
        {
            $id=$_POST['id'];
            $query =mysqli_query($conn,"DELETE FROM reportxmes  WHERE  id_registro='$id'");
         
            $data ='0';
            
            echo json_encode($data,JSON_UNESCAPED_UNICODE);
            }
    
            
        }

?>