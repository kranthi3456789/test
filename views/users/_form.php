<?php
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form yii\widgets\ActiveForm */

Modal::begin ( [ 
		'id' => 'modalForm',
		'header' => '<h2>New user</h2>',
		'toggleButton' => [ 
				'label' => 'New user',
				'class' => 'btn btn-success',
		],
		'size' => 'model-md' 
] );

?>


<div class="users-form">
    <?php
	$form = ActiveForm::begin ( [ 
			'id' => 'user-form',
			'options' => [ 
					'class' => 'form-vertical' 
			] 
	] );
	?>
    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'lastname')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

	<?php
	ActiveForm::end ();
	
	Modal::end ();
	?>

</div>

<?php $js = '
var $form = $(this);
$(\'#user-form\').on(\'beforeSubmit\', function() {
    $.ajax({
        url: "create",
        type: \'POST\',
        data: $form.serialize(),
        success: function (data) {
            $(\'#modalForm\').modal(\'hide\');
        },
        error: function(data) {
			alert("Error saving data via Ajax");
        }
     });
     return false; // prevent default submit
});';

$this->registerJs($js);
?>