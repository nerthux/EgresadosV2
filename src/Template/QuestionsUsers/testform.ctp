<!DOCTYPE html>
<html>
<head>
<?php 
use Cake\ORM\TableRegistry;

$query = TableRegistry::get('QuestionsUsers')->find()->where(['form_id' => 18]);
$query->select(['question_id'])
    ->distinct(['question_id']);
?>
  <title>Reportes por from</title>
</head>
<body>
  <?php
  foreach ($query as $question) {
  $query2 = TableRegistry::get('Questions')->find()->where(['id' => $question->question_id]);
  $query2->select(['label', 'choices']);
  foreach ($query2 as $quest) {
    echo "$quest->label";
  }
  
   ?>
   <?= $question->question_id ?>
   <?php

   
}
?>

</body>
</html>>