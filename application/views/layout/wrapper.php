<?php
    include('header.php');

	if($this->session->userdata('level') == 1){
		include('leftmenu_mahasiswa.php');
	}elseif($this->session->userdata('level') == 2){
		include('leftmenu_dosen.php');
	}elseif($this->session->userdata('level') == 3){
		include('leftmenu_wali.php');
	}elseif ($this->session->userdata('level') == 4){
		include('leftmenu_koordinator.php');
	}else{
		include('leftmenu_admin.php');
	}

    include('content.php');
    include('footer.php');
?>
