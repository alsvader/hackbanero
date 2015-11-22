<style type="text/css">
	.top-dorado{
		border-top: 3px solid #ba932c;
	}
	.left-dorado{
		border-left: 3px solid #ba932c;
	}
	.bottom-dorado{
		border-bottom: 3px solid #ba932c;
	}
	.header-dorado{
		background-color: #ba932c;
	}
	.header-guinda{
		background-color: #521f24;
	}
	.c-guinda{
		color: #521f24;
		color: #6f2931;
	}
	.c-dorado{
		color: #ba932c;
	}
</style>
	<div class="col-md-12">
		<h1>Bitacora</h1>
	</div>
	<?php if (Yii::app()->user->id==3) { ?>
	    <div class="col-md-4">
			<div class="small-box bg-blue">
	            <div class="inner">
	                <h3>
	                	<?php $solicitudes = Solicitud::model()->findAllByAttributes(array('estado'=>1,'fecha'=>date(Y-m-d)));
	                	$n = Solicitud::model()->count('estado=1');
	                	#$count_autorizados=0;
	                	#$n= Solicitud::model()->count(array('estado'=>1,'fecha'=>date(Y-m-d)));
	                	#foreach ($solicitudes as $row) {
	                	#	$count_autorizados++;
	                	#} ?>
	                    <?php if ($n==0) {
	                    	echo "No hay";
	                    } else {
	                    	echo $n;
	                    }?>
	                </h3>
	                <p>
	                    Autorizados
	                </p>
	            </div>
	            <div class="icon">
	                <i class="fa fa-check-square-o"></i>
	            </div>
	            <a href="#" class="small-box-footer">...
	                <!--Ver más <i class="fa fa-arrow-circle-right"></i>-->
	            </a>
	        </div>
	    </div>
	    <div class="col-md-4">
			<div class="small-box bg-red">
	            <div class="inner">
	                <h3>
	                	<?php $solicitudes = Solicitud::model()->findAllByAttributes(array('estado'=>1,'fecha'=>date(Y-m-d)));
	                	$n = Solicitud::model()->count('estado=0');
	                	?>
	                    <?php if ($n==0) {
	                    	echo "No hay";
	                    } else {
	                    	echo $n;
	                    }?>
	                </h3>
	                <p>
	                    Entrantes
	                </p>
	            </div>
	            <div class="icon">
	                <i class="fa fa-minus-square"></i>
	            </div>
	            <a href="#" class="small-box-footer">...
	                <!--Ver más <i class="fa fa-arrow-circle-right"></i>-->
	            </a>
	        </div>
	    </div>
	<?php } elseif (Yii::app()->user->id==6) {?>
		<div class="col-md-4">
			<div class="small-box bg-blue">
	            <div class="inner">
	                <h3>
	                	<?php $solicitudes = Orden::model()->findAllByAttributes(array('estado'=>1,'fecha_aprobado'=>date(Y-m-d)));
	                	$n = Orden::model()->count('estado=1');
	                	?>
	                    <?php if ($n==0) {
	                    	echo "No hay";
	                    } else {
	                    	echo $n;
	                    }?>
	                </h3>
	                <p>
	                    Finalizados
	                </p>
	            </div>
	            <div class="icon">
	                <i class="fa fa-check-square-o"></i>
	            </div>
	            <a href="#" class="small-box-footer">...
	                <!--Ver más <i class="fa fa-arrow-circle-right"></i>-->
	            </a>
	        </div>
	    </div>
	    <div class="col-md-4">
			<div class="small-box bg-red">
	            <div class="inner">
	                <h3>
	                	<?php $solicitudes = Orden::model()->findAllByAttributes(array('estado'=>1,'fecha_aprobado'=>date(Y-m-d)));
	                	$n = Orden::model()->count('estado=0');
	                	?>
	                    <?php if ($n==0) {
	                    	echo "No hay";
	                    } else {
	                    	echo $n;
	                    }?>
	                </h3>
	                <p>
	                    Pendientes
	                </p>
	            </div>
	            <div class="icon">
	                <i class="fa fa-minus-square"></i>
	            </div>
	            <a href="#" class="small-box-footer">...
	                <!--Ver más <i class="fa fa-arrow-circle-right"></i>-->
	            </a>
	        </div>
	    </div>
	<?php }else {
		$this->renderPartial('index', array());
	}?>