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


        <li class="<?php if ($this->uri->segment(1) === 'Pengajuan/pengajuanView') {
                        echo 'active';
                    } ?> nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>Pengajuan/pengajuanView">
                <i class="menu-icon fa fa-file" style="color: #3c8dbc"></i> <span>&ensp;Pengajuan</span>
            </a>
        </li>

        <li class="<?php if ($this->uri->segment(1) === 'Mahasiswa/mahasiswaView') {
                        echo 'active';
                    } ?> nav-item">
            <a class="nav-link" href="<?php echo base_url() ?>Mahasiswa/mahasiswaView">
                <i class="menu-icon fa fa-file" style="color: #3c8dbc"></i> <span>&ensp;Mahasiswa</span>
            </a>
        </li>



    </ul>
</nav>
<!-- partial -->
<div class="main-panel">