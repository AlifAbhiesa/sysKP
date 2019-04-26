<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="user-wrapper">
                    <div class="profile-image">
                        <img src="<?php echo base_url() ?>assets/images/faces/face5.jpg" alt="profile image">
                    </div>
                    <div class="text-wrapper">
                        <p><?php echo $this->session->userdata('username'); ?></p>
                        <div>
                            <small class="designation text-muted">Manager</small>
                            <span class="status-indicator online"></span>
                        </div>
                    </div>
                </div>

        </li>

        <li class="<?php if ($this->uri->segment(1) === 'Dashboard') {
                        echo 'active';
                    } ?> nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>Dashboard">
                <i class="menu-icon mdi mdi-television" style="color: #3c8dbc"></i> <span>&ensp;Dashboard</span>
            </a>
        </li>



        <li class="<?php if ($this->uri->segment(1) === 'Mahasiswa') {
                        echo 'active';
                    } ?> nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>Mahasiswa">
                <i class="menu-icon fa fa-user" style="color: #3c8dbc"></i> <span>&ensp;Mahasiswa</span>
            </a>
        </li>

        <li class="<?php if ($this->uri->segment(1) === 'KP') {
                        echo 'active';
                    } ?> nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>KP">
                <i class="menu-icon fa fa-user" style="color: #3c8dbc"></i> <span>&ensp;Kerja Praktek</span>
            </a>
        </li>

        <li class="<?php if ($this->uri->segment(1)==='Bimbingan'){
            echo 'active';
        }?> nav-item">
            <a class="nav-link" href="<?php echo base_url()?>Bimbingan" >
                <i class="menu-icon fa fa-user" style="color: #3c8dbc"></i> <span>&ensp;Mahasiswa Bimbingan</span>
            </a>
        </li>

        <li class="<?php if ($this->uri->segment(1) === 'Sidangkp/sidangkpView1') {
                        echo 'active';
                    } ?> nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>Sidangkp/sidangkpView1">
                <i class="menu-icon fa fa-file" style="color: #3c8dbc"></i> <span>&ensp;Sidangkp</span>
            </a>
        </li>




    </ul>
</nav>
<!-- partial -->
<div class="main-panel"> 
