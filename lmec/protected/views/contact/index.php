<?php
$this->breadcrumbs=array(
	'Contactos',
);

$this->menu=array(
	array('label'=>'Crear Contacto', 'url'=>array('create')),
	array('label'=>'Administrar Contactos', 'url'=>array('admin')),
);
?>

<h1>Contactos</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
