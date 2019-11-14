<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
	<!--Page content-->
	<!--===================================================-->
	<div id="page-content">
		<ol class="breadcrumb pad-btm-20">
			<li><a href="#"><i class="demo-pli-home"></i></a></li>
			<li><a href="#">Lotes</a></li>
			<li class="active">Listar</li>
		</ol>

		<div class="panel">
			<div class="panel-body">
				<div class="fixed-fluid">
					<?php
						echo $this->element('table', [
								'newButton' => ['link' => ['controller' => 'Batches', 'action' => 'new']],
								'headers' => [
									'Chave'				=> ['key' => 'Key', 'format' => 'text', 'link' => ['controller' => 'Batches', 'action' => 'view']],
									'Nome'				=> ['key' => 'Name', 'format' => 'text'],
									'Descrição'			=> ['key' => 'Description', 'format' => 'text'],
									'Data de Criação'	=> ['key' => 'CreateDate', 'format' => 'date'],
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