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

        <li class="<?php if ($this->uri->segment(1) === 'Pengujian') {
                        echo 'active';
                    } ?> nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>Pengujian">
                <i class="menu-icon fa fa-user" style="color: #3c8dbc"></i> <span>&ensp;Pengujian</span>
            </a>
        </li>

        <li class="<?php if ($this->uri->segment(1) === 'Statistic') {
                        echo 'active';
                    } ?> nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>Statistic">
                <i class="menu-icon fa fa-user" style="color: #3c8dbc"></i> <span>&ensp;Statistic</span>
            </a>
        </li>

        <li class="<?php if ($this->uri->segment(1) === 'Dosen') {
                        echo 'active';
                    } ?> nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>Dosen">
                <i class="menu-icon fa fa-user " style="color: #3c8dbc"></i> <span>&ensp;Dosen</span>
            </a>
        </li>

        <li class="<?php if ($this->uri->segment(1) === 'Bimbingan') {
                        echo 'active';
                    } ?> nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>Bimbingan">
                <i class="menu-icon fa fa-user" style="color: #3c8dbc"></i> <span>&ensp;Dosen Bimbingan</span>
            </a>
        </li>

        <li class="<?php if ($this->uri->segment(1) === 'Perusahaan') {
                        echo 'active';
                    } ?> nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>Perusahaan">
                <i class="menu-icon fa fa-building" style="color: #3c8dbc"></i> <span>&ensp;Perusahaan</span>
            </a>
        </li>

        <li class="<?php if ($this->uri->segment(1) === 'Sidangkp') {
                        echo 'active';
                    } ?> nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>Sidangkp">
                <i class="menu-icon fa fa-file" style="color: #3c8dbc"></i> <span>&ensp;Sidangkp</span>
            </a>
        </li>

        <li class="<?php if ($this->uri->segment(1) === 'User') {
                        echo 'active';
                    } ?> nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>User">
                <i class="menu-icon fa fa-user" style="color: #3c8dbc"></i> <span>&ensp;User</span>
            </a>
        </li>


    </ul>
</nav>
<!-- partial -->
<div class="main-panel"> 