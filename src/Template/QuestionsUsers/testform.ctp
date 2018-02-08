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

  
   ?>
   <?= $question->question_id ?>
   <?php

   
}
?>

</body>
</html>>