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
					                                    <button class="btn btn-default"><i class="demo-pli-information icon-lg"></i></button>
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
									                            <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox" checked="">
									                            <label for="demo-form-checkbox"></label>
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
										                            <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox" checked="">
										                            <label for="demo-form-checkbox"></label>
										                        </div>
									                        </td>
									                        <?php foreach($headers as $h => $items): ?>
								                        		<td><?php echo $this->DMPLFormat->format($row[$items['key']], $items['format']); ?></td>
								                        	<?php endforeach; ?>
					                                	</tr>
								                    <?php endforeach; ?>
					                                <tr>
					                                	<td>
						                                	<div class="checkbox no-margin-vertical">
									                            <input id="demo-form-checkbox" class="magic-checkbox" type="checkbox" checked="">
									                            <label for="demo-form-checkbox"></label>
									                        </div>
								                        </td>
					                                    <td><a href="#" class="btn-link"> Cubo #53431</a></td>
					                                    <td>Parcelas</td>
					                                    <td><span class="text-muted">Cubo para buscar informações de parcelas...</span></td>
					                                    <td><span class="text-muted">Oct 22, 2014</span></td>
					                                </tr>
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
