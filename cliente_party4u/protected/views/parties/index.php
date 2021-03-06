<div class="box-row">
	<div class="box-cell">
		<div class="box-inner padding">
			<div class="row">
				<?php foreach ($fiestas as $fiesta): ?>
				<div class = "col-xs-12">
					<div class = "md-list md-whiteframe-z0 bg-white m-b">
						<div class = "md-list-item">
							<div class="rounded w-64 bg-white pull-left">
			                  <img src="<?=Yii::app()->baseUrl;?>/images/a0.jpg" class="img-responsive rounded">
			                </div>
							<div class = "md-list-item-content">
								<h3 class = "text-md"><?=$fiesta->nombre_fiesta;?></h3>
								<small class = "font-thin"><?=$fiesta->idUser->username;?></small>
								<p>Necesita: $<?=$fiesta->min_cuota;?>.00</p>
								<p>Monto recaudado: $200</p>
								<div class = "progress">
									<div id = "barra" class = "progress-bar progress-bar-info" style="width:30%">30%</div>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.....</p>
								<button id = "fondear" class = "btn btn-rounded btn-stroke btn-info waves-effect pull-right">¡Fondea aquí!</button>
								<button class = "btn btn-rounded btn-stroke btn-info waves-effect pull-right">Ver</button>
							</div>
						</div>
					</div>
				</div>
				<?php endforeach ?>
				<div class = "col-xs-12">
					<div class = "md-list md-whiteframe-z0 bg-white m-b">
						<div class = "md-list-item">
							<div class="rounded w-64 bg-white pull-left">
			                  <img src="<?=Yii::app()->baseUrl;?>/images/a0.jpg" class="img-responsive rounded">
			                </div>
							<div class = "md-list-item-content">
								<h3 class = "text-md">Extreme pool party</h3>
								<small class = "font-thin">alsvader</small>
								<p>Necesita: $3000.00</p>
								<p>Monto recaudado: $3000.00</p>
								<div class = "progress">
									<div class = "progress-bar progress-bar-info" style="width:30%">30%</div>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.....</p>
								<a href="<?php echo Yii::app()->createUrl('parties/ver');?>" class = "btn btn-rounded btn-stroke btn-info waves-effect pull-right">Ver</a>
							</div>
						</div>
					</div>
				</div>
				<div class = "col-xs-12">
					<div class = "md-list md-whiteframe-z0 bg-white m-b">
						<div class = "md-list-item">
							<div class="rounded w-64 bg-white pull-left">
			                  <img src="<?=Yii::app()->baseUrl;?>/images/a0.jpg" class="img-responsive rounded">
			                </div>
							<div class = "md-list-item-content">
								<h3 class = "text-md">Escalofríos night</h3>
								<small class = "font-thin">alsvader</small>
								<p>Necesita: $3000.00</p>
								<p>Monto recaudado: $3000.00</p>
								<div class = "progress">
									<div class = "progress-bar progress-bar-info" style="width:70%">70%</div>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.....</p>
								<button class = "btn btn-rounded btn-stroke btn-info waves-effect pull-right">Ver</button>
							</div>
						</div>
					</div>
				</div>
				<div class = "col-xs-12">
					<div class = "md-list md-whiteframe-z0 bg-white m-b">
						<div class = "md-list-item">
							<div class="rounded w-64 bg-white pull-left">
			                  <img src="<?=Yii::app()->baseUrl;?>/images/a0.jpg" class="img-responsive rounded">
			                </div>
							<div class = "md-list-item-content">
								<h3 class = "text-md">The cool zombie party</h3>
								<small class = "font-thin">alsvader</small>
								<p>Necesita: $3000.00</p>
								<p>Monto recaudado: $3000.00</p>
								<div class = "progress">
									<div class = "progress-bar progress-bar-info" style="width:50%">50%</div>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.....</p>
								<button class = "btn btn-rounded btn-stroke btn-info waves-effect pull-right">Ver</button>
							</div>
						</div>
					</div>
				</div>
				<div class = "col-xs-12">
					<div class = "md-list md-whiteframe-z0 bg-white m-b">
						<div class = "md-list-item">
							<div class="rounded w-64 bg-white pull-left">
			                  <img src="<?=Yii::app()->baseUrl;?>/images/a0.jpg" class="img-responsive rounded">
			                </div>
							<div class = "md-list-item-content">
								<h3 class = "text-md">Jason's ultimate party</h3>
								<small class = "font-thin">alsvader</small>
								<p>Necesita: $3000.00</p>
								<p>Monto recaudado: $3000.00</p>
								<div class = "progress">
									<div class = "progress-bar progress-bar-info" style="width:60%">60%</div>
								</div>
								<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.....</p>
								<button class = "btn btn-rounded btn-stroke btn-info waves-effect pull-right">Ver</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	document.getElementById('fondear').addEventListener('click', function () {
		this.disabled = true;
		document.getElementById('barra').style.width = "70%";
		document.getElementById('barra').innerHTML = "70%";
	});
</script>