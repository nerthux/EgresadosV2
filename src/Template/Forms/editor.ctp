<?php
/**
  * @var \App\View\AppView $this
  */
?>
<div class="container">
  <!-- Modal -->
  <div class="modal fade" id="preferences" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Preferencias de formulario</h4>
        </div>
        <div class="modal-body">
            <div class= "row">
                <div class="col-md-8">
                    <?= $this->Form->create($form) ?>
                    <fieldset>
                    <?=  $this->Form->input('name') ?>
                    <?=  $this->Form->input('description') ?>
                    <?=  $this->Form->hidden('id', ['class' => 'mainkey']) ?>

                </div>
            </div>

            <div class= "row">
                <div class="col-md-6">
                    <?=  $this->Form->input('careers._ids', ['multiple' => 'checkbox']) ?>
                </div>
                <div class="col-md-6">
                    <?=  $this->Form->input('generations._ids', ['multiple' => 'checkbox']) ?>

                </div>
            </div>

            <div class= "row">
                <div id="additional-opts" class="col-md-8">
                    </fieldset>
                </div>
            </div>

            <div class="row">
                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary block full-width m-b', 'id' => 'add-question-btn'])?>
                <?= $this->Form->end() ?>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  
</div>

<div id="surveyEditorContainer"></div>
<script>
var editorOptions = {
    // show the embeded survey tab. It is hidden by default
    showEmbededSurveyTab : false,
    // hide the test survey tab. It is shown by default
    showTestSurveyTab : true,
    // hide the JSON text editor tab. It is shown by default
    showJSONEditorTab : true,
    // show the "Options" button menu. It is hidden by default 
    showOptions: true,
    
    //questionTypes: ["text", "dropdown", "radiogroup","checkbox","rating"]   
    };

    // pass the editorOptions into the constructor. It is an optional parameter.
    var survey = new SurveyEditor.SurveyEditor("surveyEditorContainer", editorOptions);  
    survey.toolbarItems.push({id: "preferencesCustomization", visible: true, title: "Preferences", enabled: true, action: function() { $('#preferences').modal('show'); }});
    survey.text = JSON.stringify(<?= $form->editor ?>);

    function saveMySurvey(){
        $.ajax 
        ( {
            type: "POST",
            url: "/forms/save-editor",
            dataType: 'json',
            async: false,
            data: { editor: survey.text, surveyname: $('#name').val(), surveydescription: $('#description').val(), surveyid: $('.mainkey').val() }
        });

    }

    //set function on save callback
    survey.saveSurveyFunc = saveMySurvey;
</script>
