<div class="content-wrapper">
    <div class="col-md-12 grid-margin" id="listUser">
        <div class="card">
            <div class="card-body">
                <div class="box-header">
                    <h3 class="box-title">User List</h3>
                    <hr>
                </div>
                <div class="box-body">
                    <hr>
                    <table class="table table-bordered table-striped dt-responsive" id="myData" width="100%" >
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Username</th>
                            <th>Level</th>
                            <th>Last Login</th>
                            <th></th>
                        </tr>
                        </thead>
                    </table>
                    <br>
                    <button type="button" class="btn btn-success" onclick="showRegisterUser()"
                            style="width: 100%;">
                        Add New User
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-success fade" id="adduserform">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label class="border-bottom border-gray pb-2">Add User</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="closeuser()">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="border-bottom border-gray pb-2">Username</label>
                    <input type="text" class="form-control" id="usernameInput"
                           placeholder="Input Username...">
                </div>
                <div class="form-group">
                    <label class="border-bottom border-gray pb-2">Password</label>
                    <input type="text" class="form-control" id="passwordInput"
                           placeholder="Input Password...">
                </div>
                <div class="form-group">
                    <label class="border-bottom border-gray pb-2">Level</label>
                    <input type="text" class="form-control" id="levelInput"
                           placeholder="Input Level...">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal"
                        onclick="closeuser()">Close
                </button>
                <button onclick="addUser()" type="button" class="btn btn-outline">Add User
                </button>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-success fade" id="updateuserform">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label class="border-bottom border-gray pb-2">Update User</label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"
                        onclick="closeuser()">
                    <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label class="border-bottom border-gray pb-2">Name</label>
                    <input type="text" class="form-control" id="userName"
                           placeholder="Input Name...">
                </div>
                <div class="form-group">
                    <label class="border-bottom border-gray pb-2">Password</label>
                    <input type="text" class="form-control" id="userPassword"
                           placeholder="Input Password...">
                </div>
                <div class="form-group">
                    <label class="border-bottom border-gray pb-2">Level</label>
                    <input type="text" class="form-control" id="userLevel"
                           placeholder="Input Level...">
                </div>
            </div>
            <div class="modal-footer">
                <input style="display: none" type="text" id="idUsers">
                <button type="button" class="btn btn-outline pull-left" data-dismiss="modal"
                        onclick="closeuser()">Close
                </button>
                <button onclick="updateUser()" type="button" class="btn btn-outline">Update User
                </button>
            </div>
        </div>
    </div>
</div>

<script>
    showData();

    function showRegisterUser() {
        $('#adduserform').modal({
            backdrop: 'static',
            keyboard: false
        });
        $("#adduserform").modal('show');
    }

    function closeuser() {
        //  document.getElementById("itemlist1").innerText = "";
        //document.getElementById("conditiondropdown").innerText = "";
        $("#adduserform").modal('hide');
        $("#updateuserform").modal('hide');
    }

    function addUser() {

        var username = document.getElementById("usernameInput").value;
        var password = document.getElementById("passwordInput").value;
        var level = document.getElementById("levelInput").value;

        // alert(name + password + level);

        $.ajax({
            url: "<?php echo base_url('User/addUser'); ?>",
            type: "post",
            data: {
                username:username,
                password:password,
                level:level,
            },
            cache: false,
            success: function (response) {
                // alert(response);
                if(response !== 0){
                    alert('User Added !');
                    showData();
                    closeuser();
                }else if(response == "Failed"){
                    alert('Failed !');
                }
            }
        });

    }

    function updateUser() {
        var username = document.getElementById("userName").value;
        var level = document.getElementById("userLevel").value;
        var id = document.getElementById("idUsers").value;

        $.ajax({
            url: "<?php echo base_url('User/updateData'); ?>",
            type: "post",
            data: {
                idUsers:id,
                username: username,
                level: level,
            },
            cache: false,
            success: function (response) {
                // alert(response);
                if(response == "Ok"){
                    alert('User updated !');
                    showData();
                    closeuser()
                }else{
                    alert("Error cok euy !");
                }
            }
        });
    }

    function deleteUser(id) {
        $.ajax({
            url: "<?php echo base_url('User/deleteData'); ?>",
            type: "post",
            data: {idUsers:id},
            cache: false,
            success: function (response) {
                // alert(response);
                if(response == "Ok"){
                    alert('User deleted !');
                    showData();

                }else{
                    alert("Error cok euy !");
                }
            }
        });
    }

    function getOne(id) {
        $("#updateuserform").modal('show');
        $.ajax({
            url: "<?php echo base_url('User/getOne'); ?>",
            type: "post",
            data: {idUser:id},
            cache: false,
            success: function (response) {
                // alert(response);
                if(response != ""){
                    response = JSON.parse(response);
                    document.getElementById("userName").value = response['username'];
                    document.getElementById("userLevel").value = response['level'];
                    // document.getElementById("userPassword").value = response['password'];
                    document.getElementById("idUsers").value = response['idUsers'];
                    showRegisterUser('update');
                    showData();
                    $("#updateuserform").modal('hide');
                }else{
                    alert("Error cok euy !");
                }
            }
        });
    }

    function showData() {
        //datatables
        table = $('#myData').DataTable({
            "columnDefs": [ {
                "targets": 0,
                "width": "50px"
            },
                {
                    "targets": [1,2,3],
                    "width": "200px"
                }],
            "ordering": false,
            "destroy": true,
            "serverSide": true,
            "order": [],

            "ajax": {
                "url": "<?php echo site_url('User/getAll')?>",
                "async":false,
                "type": "POST"
            },


        });

    };
</script>
