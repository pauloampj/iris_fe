<!--Data Table-->
					                <!--===================================================-->
					                <div class="panel-body">
					                    <div class="pad-btm form-inline">
					                        <div class="row">
					                            <div class="col-sm-6 table-toolbar-left">
					                                <button class="btn btn-mint"><i class="demo-pli-add icon-fw"></i>Novo</button>
					                            </div>
					                            <div class="col-sm-6 table-toolbar-right">
					                                <div class="form-group">
					                                    <input type="text" autocomplete="off" class="form-control" placeholder="Search" id="demo-input-search2">
					                                </div>
					                                <div class="btn-group">
					                                    <button class="btn btn-default"><i class="demo-pli-pen-5 icon-lg"></i></button>
					                                    <button class="btn btn-default"><i class="demo-pli-trash icon-lg"></i></button>
					                                </div>
					                                <div class="btn-group">
					                                    <div class="btn-group dropdown">
					                                        <button class="btn btn-default btn-active-primary dropdown-toggle" data-toggle="dropdown">
					                                        <i class="demo-pli-dot-vertical icon-lg"></i>
					                                    </button>
					                                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
					                                            <li><a href="#">Imprimir</a></li>
					                                        </ul>
					                                    </div>
					                                </div>
					                            </div>
					                        </div>
					                    </div>
					                    <div class="table-responsive">
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
					                    </div>
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
					                </div>
					                <!--===================================================-->
					                <!--End Data Table-->
