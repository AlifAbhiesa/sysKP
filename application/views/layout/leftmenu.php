<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="user-wrapper">
                    <div class="profile-image">
                        <img src="<?php echo base_url()?>assets/images/faces/face1.jpg" alt="profile image">
                    </div>
                    <div class="text-wrapper">
                        <p><?php echo $this->session->userdata('username'); ?></p>
                        <div>
                            <small class="designation text-muted">Manager</small>
                            <span class="status-indicator online"></span>
                        </div>
                    </div>
                </div>
                <button class="btn btn-success btn-block">New Shop
                    <i class="mdi mdi-plus"></i>
                </button>
            </div>
        </li>

        <li class="<?php if ($this->uri->segment(1)==='Dashboard'){
            echo 'active';
        }?> nav-item">
            <a class="nav-link" href="<?php echo base_url()?>Dashboard" >
                <i class="menu-icon mdi mdi-television" style="color: #3c8dbc"></i> <span>&ensp;Dashboard</span>
            </a>
        </li>
		<li class="<?php if ($this->uri->segment(1)==='Goods'){

			echo 'active';
		}?> nav-item">
			<a class="nav-link" href="<?php echo base_url()?>Goods" >
				<i class="menu-icon fa fa-leaf" style="color: #3c8dbc"></i> <span>&ensp;Goods</span>
			</a>
		</li>
		<li class="<?php if ($this->uri->segment(1)==='Receipt'){
			echo 'active';
		}?> nav-item">
			<a class="nav-link" href="<?php echo base_url()?>Receipt" >
				<i class="menu-icon fa fa-file-text" style="color: #3c8dbc"></i> <span>&ensp;Receipt</span>
			</a>
		</li>
        <li class="<?php if ($this->uri->segment(1)==='Po'){
            echo 'active';
        }?> nav-item">
            <a class="nav-link" href="<?php echo base_url()?>Po" >
                <i class="menu-icon fa fa-file-photo-o" style="color: #3c8dbc"></i> <span>&ensp;PO</span>
            </a>
        </li>
        <li class="<?php if ($this->uri->segment(1)==='Shop'){
            echo 'active';
        }?> nav-item">
            <a class="nav-link" href="<?php echo base_url()?>Shop" >
                <i class="menu-icon fa fa-shopping-cart" style="color: #3c8dbc"></i> <span>&ensp;Shop</span>
            </a>
        </li>
		<li class="<?php if ($this->uri->segment(1)==='ShopReference'){
			echo 'active';
		}?> nav-item">
			<a class="nav-link" href="<?php echo base_url()?>ShopReference" >
				<i class="menu-icon fa fa-thumbs-o-up" style="color: #3c8dbc"></i> <span>&ensp;Shop Reference</span>
			</a>
		</li>

        <li class="<?php if ($this->uri->segment(1)==='Inventory'){
            echo 'active';
        }?> nav-item">
            <a class="nav-link" href="<?php echo base_url()?>Inventory" >
                <i class="menu-icon fa fa-briefcase" style="color: #3c8dbc"></i> <span>&ensp;Inventory</span>
            </a>
        </li>
        <li class="<?php if ($this->uri->segment(1)==='Production'){
            echo 'active';
        }?> nav-item">
            <a class="nav-link" href="<?php echo base_url()?>Production" >
                <i class="menu-icon fa fa-magic" style="color: #3c8dbc"></i> <span>&ensp;Production</span>
            </a>
        </li>

        <li class="<?php if ($this->uri->segment(1)==='User'){
            echo 'active';
        }?> nav-item">
            <a class="nav-link" href="<?php echo base_url()?>User" >
                <i class="menu-icon fa fa-user-circle" style="color: #3c8dbc"></i> <span>&ensp;User</span>
            </a>
        </li>
    </ul>
</nav>
<!-- partial -->
<div class="main-panel">

