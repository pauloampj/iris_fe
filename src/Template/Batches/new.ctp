<!--CONTENT CONTAINER-->
<!--===================================================-->
<div id="content-container">
	<!--Page content-->
	<!--===================================================-->
	<div id="page-content">
		<ol class="breadcrumb pad-btm-20">
			<li><a href="#"><i class="demo-pli-home"></i></a></li>
			<li><a href="#">Lotes</a></li>
			<li class="active">Novo</li>
		</ol>

		<div class="panel" id="basicInfoContainer">
			<div class="panel-heading bg-colored-grey">
				<h3 class="panel-title">Básico</h3>
			</div>
			<div class="panel-body">
				<div class="fixed-fluid">
					<div class="row">
					    <div class="col-sm-6">
					        <div class="form-group">
					            <label class="control-label">Nome</label>
					            <input type="text" class="form-control" name="data[name]">
					        </div>
					    </div>
					    <div class="col-sm-6">
					        <div class="form-group">
					            <label class="control-label">Cubo</label>
					            <select id="cubeSelect" class="form-control select2" name="data[cube]" >
					            	<?php if(isset($cubes) && count($cubes) > 0): ?>
					            		<option disabled selected value> -- selecione um cubo -- </option>
					            	<?php foreach($cubes as $c): ?>
					            		<option value="<?php echo $c['Key']?>"><?php echo $c['Key'] . ' - ' . $c['Name']?></option>
					            	<?php endforeach; ?>
					            	<?php else: ?>
					            		<option value="-1">Nenhum cubo encontrado</option>
					            	<?php endif; ?>
	                            </select>
					        </div>
					    </div>
					</div>
					<div class="row">
					    <div class="col-sm-12">
					        <div class="form-group">
					            <label class="control-label">Descrição</label>
					            <textarea placeholder="Escreva aqui a descrição do lote..." rows="13" class="form-control" name="data[description]"></textarea>
					        </div>
					    </div>
					</div>
				</div>
			</div>
		</div>
		
		<div class="panel">
			<div class="panel-heading bg-colored-grey">
				<h3 class="panel-title">Pesquisa</h3>
			</div>
			<div class="panel-body">
				<div class="fixed-fluid" id="filterContainer">
					<div class="row">
					    <div class="col-sm-12">
					    	<div class="form-group">
				            	<button class="btn btn-dark" id="addFilterBtn"><i class="ion-funnel icon-fw"></i>adicionar filtro</button>
				            </div>
					    </div>
					    </div>
				</div>
			</div>
		</div>
		
		<div class="panel">
			<div class="panel-heading bg-colored-grey">
				<h3 class="panel-title">Lista
				<button id="loadListBtn" alt="atualizar" class="btn btn-mint btn-icon btn-circle btn-xs" style="float: right;margin-top:6px;"><i class="ion-refresh icon-lg"></i></button>
				</h3>
			</div>
			<div class="panel-body">
				<div class="fixed-fluid">
					<div class="row">
					    <div class="table-responsive" id="itemsList">
					    	<?php if(isset($list)): ?>
					                        <table class="table table-striped">
					                            <thead>
					                                <tr>
					                                	<th>
						                                	<div class="checkbox no-margin-vertical">
									                            <input id="form-checkbox-all" class="magic-checkbox" type="checkbox">
									                            <label for="form-checkbox-all"></label>
									                        </div>
								                        </th>
								                        <?php foreach($headers as $h => $items): ?>
								                        	<th><?php echo $h; ?></th>
								                        <?php endforeach; ?>
					                                </tr>
					                            </thead>
					                            <tbody>
					                            	<?php foreach($list as $key => $row): ?>
								                    	<tr>
						                                	<td>
							                                	<div class="checkbox no-margin-vertical">
										                            <input id="form-checkbox-<?php echo $row['Id']; ?>" class="magic-checkbox" type="checkbox">
										                            <label for="form-checkbox-<?php echo $row['Id']; ?>"></label>
										                        </div>
									                        </td>
									                        <?php foreach($headers as $h => $items): ?>
									                        	<td>
									                        	<?php
									                        		$val = $this->DMPLFormat->format($row[$items['key']], $items['format']);
									                        		
									                        		if(isset($items['link'])){
									                        			$items['link'][] = $row[$items['key']];
									                        			echo $this->Html->link(
									                        					$val,
									                        					$items['link'],
									                        					['class' => 'btn-link']
									                        					);
									                        		}else{
									                        			echo $val;	
									                        		}									                        	
									                        	?>
									                        	</td>
								                        	<?php endforeach; ?>
					                                	</tr>
								                    <?php endforeach; ?>
					                            </tbody>
					                        </table>
					                        <hr class="new-section-xs">
					                    <div class="pull-right">
					                        <ul class="pagination text-nowrap mar-no">
					                            <li class="page-pre disabled">
					                                <a href="#">&lt;</a>
					                            </li>
					                            <li class="page-number active">
					                                <span>1</span>
					                            </li>
					                            <li class="page-number">
					                                <a href="#">2</a>
					                            </li>
					                            <li class="page-number">
					                                <a href="#">3</a>
					                            </li>
					                            <li>
					                                <span>...</span>
					                            </li>
					                            <li class="page-number">
					                                <a href="#">9</a>
					                            </li>
					                            <li class="page-next">
					                                <a href="#">&gt;</a>
					                            </li>
					                        </ul>
					                    </div>
					                        <?php else: ?>
					                        <div class="panel-body">
								                <p class="text-main text-semibold">Lista vazia</p>
								                <p>A sua tabela está vazia. É provável que vocês ainda não tenha atualizado a lista ou tenha restringido demais a pesquisa.</p>
							            	</div>
					                        <?php endif; ?>
					            </div>
					                    
					</div>
				</div>
			</div>
		</div>
		<div class="panel">
			<div class="panel-body" style="padding-bottom:0;">
				<div class="fixed-fluid">
					<div class="row">
					    <div class="col-sm-12 table-toolbar-right">
					    	<button class="btn btn-default btn-lg btn-redirect" data-link="<?php echo $this->Url->build(['controller' => 'Batches', 'action' => 'index']); ?>"><i class="ion-reply icon-fw"></i>Cancelar</button>
					        <button id="btnSave" class="btn btn-success btn-lg"><i class="ion-checkmark-round icon-fw"></i>Salvar</button>
					    </div>
					</div>
				</div>
			</div>
		</div>
		
	</div>
	<!--===================================================-->
	<!--End page content-->
</div>
<!--===================================================-->
<!--END CONTENT CONTAINER-->