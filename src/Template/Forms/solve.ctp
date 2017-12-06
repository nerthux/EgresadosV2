<?php
/**
  * @var \App\View\AppView $this
  */
?>

<div id="surveyContainer"></div>
<script>

Survey.Survey.cssType = "bootstrap";

function saveMySurvey(){
    $.ajax 
    ( {
        type: "POST",
        url: "/questions-users/save-answers",
        dataType: 'json',
        async: false,
        data: { survey: survey.data, form: <?= $form ?> }
    });
}

function testSave(){
    console.log(survey.data);
}
var survey = new Survey.Model(JSON.stringify(<?= $form->editor ?>));

$("#surveyContainer").Survey({
    model:survey,
    onComplete:saveMySurvey
});
</script>
