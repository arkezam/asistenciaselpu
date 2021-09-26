<?php 
        if(!$this->session->userdata('s_usuario')){
            
            redirect('Cpanel');
        }
 ?>
 <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url()?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>  <?php echo $this->session->userdata('s_usuario'); ?>
</p>
          <a href="<?php echo base_url()?>cpanel/ingresar"><i class="fa fa-circle text-success"></i> Activo</a>
        </div>
      </div>

      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
        <li class="header">Menu de Navegación</li>
                
        <li class="active"><a href="<?php echo base_url()?>cpanel/cregistro"><i class="fa fa-address-book"></i> <span>Registro Personal</span></a></li>

          
        <li class="treeview">
          <a href="#">
            <i class="fa fa-search"></i> <span>Personal</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url()?>cpanel/cpersonal"><i class="fa fa-search"></i> Buscar Trabajador</a></li>
            <!-- <li><a href="<?php //echo base_url()?>cpanel/cficha"><i class="fa fa-address-card"></i> Registrar Personal</a></li> -->
            <li class="active"><a href="<?php echo base_url()?>crud/create"><i class="fa fa-search"></i> Agregar Nuevo Trabajador </a></li>
            <!-- <li><a href="<?php //echo base_url()?>cpanel/cficha"><i class="fa fa-address-card"></i> Registrar Personal</a></li> -->
            <li class="active"><a href="<?php echo base_url()?>crud/listabaja"><i class="fa fa-search"></i> Dados de Baja </a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-files-o"></i>
            <span>Data</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="active"><a href="<?php echo base_url()?>cpanel/creporte"><i class="fa fa-circle-o"></i> Exportar a SIELSE </a></li>
            <li class="active"><a href="<?php echo base_url()?>cpanel/creportesap"><i class="fa fa-circle-o"></i> Exportar a SAP </a></li>

          </ul>
        </li>


      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">