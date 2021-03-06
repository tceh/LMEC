<?php
$this->breadcrumbs=array(
	'Clientes'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Lista Clientes', 'url'=>array('index')),
	array('label'=>'Crear Cliente', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('customer-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar Clientes</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'customer-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'id',
		//'customer_type_id',                
                //'customerType.type',
                array(
                        //'name'=>'customerType.type',
                        'name'=>'customer_type_id',
                        'value'=>'$data->customerType->type',
                ),
		//'contacts',
                array(
                        'name'=>'nombreContacto',
                        'value'=>'$data->contacts[0]->name', // reemplazar acá el campo del modelo Departamento que representa el nombre.
                ),
                //'contact.name',
		'address',
		//'dependence_id',
                //'dependence.name',
                array(
                        'name'=>'dependence_id',
                        'value'=>'$data->dependence->name', // reemplazar acá el campo del modelo Departamento que representa el nombre.
                ),
		'active',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
