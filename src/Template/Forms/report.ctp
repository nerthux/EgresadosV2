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
    $numUsers=0;
    if($value!=""){
    $query2 = TableRegistry::get('QuestionsUsers')->find()->where(['question_id' => $quest->id,'value'=>$value]);
    foreach ($query2 as $eso) {
     $numUsers++;
    }
    echo "$value";
    #$numUsers = count($query2);

    echo "respuestas: $numUsers";
    echo "<br>";
                  }
    }
  } 
#$query = TableRegistry::get('QuestionsUsers')->find()->where(['form_id' => 18]);
#$query->select(['question_id'])
#    ->distinct(['question_id']);
  ?>
</body>
</html>