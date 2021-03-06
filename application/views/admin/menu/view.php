<link href="<?php echo base_url()?>template/AdminLTE/css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="<?php echo base_url()?>template/AdminLTE/css/AdminLTE.css" rel="stylesheet" type="text/css" />
<div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">Data menu</h3>
                                </div><!-- /.box-header -->
                                
                                
                                <?php
                                if($this->session->flashdata('pesan')){
                                        echo"<div class='alert alert-info'>
                                        <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>
                                                &times;
                                        </button>";
                                        echo $this->session->flashdata('pesan');
                                        echo"</div>";
                                }
                                echo anchor('admin/menu/post','Input menu',array('class'=>'btn btn-primary btn-sm'))
                                ?>
                            
                                <div class="box-body table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Nama menu</th>
                                                <th>Jenis</th>
                                                <th></th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $no=1;
                                            foreach ($record as $r){
                                                echo "<tr>
                                                      <td width='10'>$no</td>
                                                      <td>".  strtoupper($r->menu_title)."</td>
                                                      <td>";
                                                      if($r->parent==0){
                                                          echo "menu UTAMA";
                                                      }else{
                                                          $parent=$this->db->get_where('tabel_menu',array('menu_id'=>$r->parent))->row_array();
                                                          echo strtoupper($parent['menu_title']);
                                                          //echo $r->parent;
                                                      }
                                                      echo"</td>
                                                      <td width='10'>".anchor("admin/menu/edit/".$r->menu_id,"<span class='glyphicon glyphicon-tags' aria-hidden='true'></span>",array('title'=>'edit data'))."</td>
                                                      <td width='10'>".anchor("admin/menu/delete/".$r->menu_id,"<span class='glyphicon glyphicon-trash' aria-hidden='true'></span>",array('title'=>'delete data',
                                                        'onclick'=>"return confirm('yakin akan menghapus data ini ?')"))."</td>
                                                    </tr>";
                                                $no++;
                                            }
                                            ?>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                             <script src="<?php echo base_url()?>template/AdminLTE/js/jquery.min.js"></script>
        <script src="<?php echo base_url()?>template/AdminLTE/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/AdminLTE/js/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="<?php echo base_url()?>template/AdminLTE/js/raphael-min.js"></script>       
        <!-- DATA TABES SCRIPT -->
        <script src="<?php echo base_url()?>template/AdminLTE/js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="<?php echo base_url()?>template/AdminLTE/js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="<?php echo base_url()?>template/AdminLTE/js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="<?php echo base_url()?>template/AdminLTE/js/AdminLTE/demo.js" type="text/javascript"></script>
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
                $('#example2').dataTable({
                    "bPaginate": true,
                    "bLengthChange": false,
                    "bFilter": false,
                    "bSort": true,
                    "bInfo": true,
                    "bAutoWidth": false
                });
            });
        </script>