<?php
 
   if (isset($_FILES['myFile']))
   {
      $names = $_FILES["myFile"]['name'];
      $arr   = explode('.', $names);
      $name  = $arr[0]; //ͼƬ����
       $date   = date('Y-m-d H:i:s'); //�ϴ�����
       $fp     = fopen($_FILES['myFile']['tmp_name'], 'rb');
       $type   = $_FILES['myFile']['type'];
       $filename = $_FILES['myFile']['name'];
       $tmpname = $_FILES['myFile']['tmp_name'];
       echo $_FILES["myFile"]["error"];
  //���ļ�������������Ŀ¼�� upload �ļ�����
   if(move_uploaded_file($tmpname,"/var/www/AgrIntel/image/".$filename))
   {
      echo "upload image succeed";
    }else{
            echo "upload image failed";
         }
    }
     else
    {

    echo "�ļ�δ�ϴ�";

    }
?>
