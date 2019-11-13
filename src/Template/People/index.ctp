<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
	<!--Page content-->
	<!--===================================================-->
	<div id="page-content">
		<ol class="breadcrumb pad-btm-20">
			<li><a href="#"><i class="demo-pli-home"></i></a></li>
			<li><a href="#">Pessoas</a></li>
			<li class="active">Listar</li>
		</ol>

		<div class="panel">
			<div class="panel-body">
				<div class="fixed-fluid">
					<?php
						echo $this->element('table', [
								'headers' => [
									'CPF / CNPJ'			=> ['key' => 'CPFCNPJ', 'format' => 'cpfcnpj', 'link' => ['controller' => 'People', 'action' => 'view']],
									'Nome'					=> ['key' => 'ShortName', 'format' => 'text'],
									'Tipo'					=> ['key' => 'Type', 'format' => 'person_type'],
									'Nascimento / Criação'	=> ['key' => 'BirthDate', 'format' => 'date'],
							]
						]);
					?>
				</div>
			</div>
		</div>
	</div>
	<!--===================================================-->
	<!--End page content-->
</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->