<?php
?>
<!DOCTYPE html>
<html>
<head>
<?php 
use Cake\ORM\TableRegistry;
?>
<title>Reportes por from</title>
</head>
<body>
  <?php
  echo "<h1>Id de Form: $form->id</h1>";
  $query = TableRegistry::get('Questions')->find()->where(['form_id' => $form->id]);
  $query->select(['id','label', 'choices']);
  echo "";
  foreach ($query as $quest) {
    echo "$quest->id $quest->label";
    echo "<br>";
    $claves = preg_split("/[\[\]\"\s,]+/", $quest->choices);
  foreach ($claves as $value)
   {
   //acciones
    if($value!=""){
    echo "$value";
    echo "<br>";
    }

    }
  }
  #$fecha = "04/30/1973";
  #list($mes, $día, $año) = split('[/.-]', $fecha);
  #echo "Mes: $mes; Día: $día; Año: $año<br />\n";
// divide la frase mediante cualquier número de comas o caracteres de espacio,
// lo que incluye " ", \r, \t, \n y \f
?>

</body>