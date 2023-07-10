<html>

<head>
    <title>Pinme | Web map</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
</head>

<body>
    <nav class="navbar bg-secondary text-uppercase fixed-bottom"
        style="padding-bottom: 1px;padding-top: 1px;display: none" id="mainNav">
        <div class="container" id="main_navbar" style="margin-bottom: 0px;">
            <a class="navbar-brand"><i class="fa-solid fa-location-pin fa-bounce"></i> Pin<font color="#FF6666">me
                </font></a>
            <div id="button_group">
                <button id="add_pwd" class="btn btn-success" style="display: none;"
                    onclick="$('#add_pwd_modal').modal('show');">เพิ่มบัญชีผู้ใช้</button><button id="sudo_signout"
                    class="btn btn-danger" style="margin-left: 5px;display: none;"
                    onclick="delSession()">ออกจากระบบ</button>
            </div>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                </ul>
            </div>
        </div>
    </nav>

    <div id="add_pwd_modal" class="modal fade" style="--bs-modal-width: 370px;">
        <div class="modal-dialog" style="top: 20%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa-solid fa-lock"></i> เพิ่มบัญชีผู้ใช้</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form name="add_pwd_form" id="add_pwd_form" method="post" enctype=multipart/form-data>
                    <table class="modal_form" border="0" cellspacing="0" cellpadding="10">
                        <tr>
                            <td class="modal_font"><i class="fa-solid fa-user"></i> ชื่อเข้าใช้งาน</td>
                            <td><input id="username_v" class="textInput modal_font" type="text" name="username_v"
                                    required></td>
                        </tr>
                        <tr>
                            <td class="modal_font"><i class="fa-solid fa-signature"></i> ชื่อที่แสดง</td>
                            <td><input class="textInput modal_font" type="text" name="display_name" required></td>
                        </tr>
                        <tr>
                            <td class="modal_font"><i class="fa-solid fa-key"></i> รหัสผ่าน</td>
                            <td><input id="password_v" class="textInput modal_font" type="password" name="pwd_v"
                                    required></td>
                        </tr>

                        <tr>
                            <td class="modal_font"><i class="fa-solid fa-circle-info"></i> หมายเหตุ</td>
                            <td><input class="textInput modal_font" type="text" name="note"></td>
                        </tr>

                        <tr>
                            <td class="modal_font"><i class="fa-solid fa-flag"></i> สิทธิ์เข้าถึง</td>
                            <td><select name="permission" id="permission">
                                    <option value="DEFAULT" class="modal_font">ผู้ใช้ทั่วไป</option>
                                    <option value="PRIVILEGE" class="modal_font">สิทธิ์พิเศษ</option>
                                    <option value="OWNER" class="modal_font">ผู้ดูแล</option>
                                </select></td>
                        </tr>
                    </table>
                    <br>
                    <center><button type="submit" class="btn btn-primary modal_font">เพิ่มผู้ใช้งาน</button></center>
                </form>
            </div>
        </div>
    </div>

    <div id="edit_pwd_modal" class="modal fade" style="--bs-modal-width: 370px;">
        <div class="modal-dialog" style="top: 20%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa-solid fa-lock"></i> แก้ไขบัญชีผู้ใช้</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form name="edit_pwd_form" id="edit_pwd_form" method="post" enctype=multipart/form-data>
                    <table class="modal_form" border="0" cellspacing="0" cellpadding="10">
                        <tr>
                            <td class="modal_font"><i class="fa-solid fa-user"></i> ชื่อเข้าใช้งาน</td>
                            <td><input id="username_v_edit" class="textInput modal_font" type="text"
                                    name="username_v_edit" readonly required></td>
                        </tr>
                        <tr>
                            <td class="modal_font"><i class="fa-solid fa-signature"></i> ชื่อที่แสดง</td>
                            <td><input id="display_name_edit" class="textInput modal_font" type="text"
                                    name="display_name_edit" required></td>
                        </tr>
                        <tr>
                            <td class="modal_font"><i class="fa-solid fa-key"></i> รหัสผ่าน</td>
                            <td><input id="pwd_v_edit" class="textInput modal_font" type="password" name="pwd_v_edit"
                                    placeholder="ปล่อยว่างหากไม่แก้ไข"></td>
                        </tr>

                        <tr>
                            <td class="modal_font"><i class="fa-solid fa-circle-info"></i> หมายเหตุ</td>
                            <td><input id="note_edit" class="textInput modal_font" type="text" name="note_edit"></td>
                        </tr>

                        <tr>
                            <td class="modal_font"><i class="fa-solid fa-flag"></i> สิทธิ์เข้าถึง</td>
                            <td><select name="permission_edit" id="permission_edit">
                                    <option value="DEFAULT" class="modal_font">ผู้ใช้ทั่วไป</option>
                                    <option value="PRIVILEGE" class="modal_font">สิทธิ์พิเศษ</option>
                                    <option value="OWNER" class="modal_font">ผู้ดูแล</option>
                                </select></td>
                        </tr>
                    </table>
                    <br>
                    <center><button type="submit" class="btn btn-primary modal_font">แก้ไขข้อมูล</button></center>
                </form>
            </div>
        </div>
    </div>

    <div id="delpwd_confirm" class="modal fade">
        <div class="modal-dialog" style="top: 30%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa-solid fa-trash fa-shake"></i></i> ยืนยันการลบบัญชึผู้ใช้</h5>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <p>ต้องการบัญชีผู้ใช้ที่เลือกใช่หรือไม่<br><br></p>
                    <center><button id="delpwd_button" type="button" class="btn btn-danger">ลบบัญชีผู้ใช้</button>
                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal">ยกเลิก</button>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <div id="pc_sudo" class="modal fade">
        <div class="modal-dialog" style="top: 30%;width: 350px;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa-solid fa-lock"></i> ยืนยันผู้ใช้งาน</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form name="pc_sudo_form" id="pc_sudo_form" method="post">
                    <table class="modal_form" border="0" cellspacing="0" cellpadding="10">
                        <tr>
                            <td class="modal_font"><i class="fa-solid fa-user"></i> ยูสเซอร์เนม</td>
                            <td><input class="textInput modal_font" type="text" name="sudo_username" required></td>
                        </tr>
                        <tr>
                            <td class="modal_font"><i class="fa-solid fa-key"></i> รหัสผ่าน</td>
                            <td><input class="textInput modal_font" type="password" name="passcode" required></td>
                        </tr>
                    </table>
                    <br>
                    <center><button type="submit" class="btn btn-primary modal_font">เข้าสู่ระบบ</button></center>
                </form>
            </div>
        </div>
    </div>

    <div id="main_table" class="table-responsive" style="display: none;">
        <table id="pwd_list" class="table table-striped text-center">
            <thead>
                <tr>
                    <th scope="col">#ID</th>
                    <th scope="col">ชื่อบัญชีผู้ใช้</th>
                    <th scope="col">ชื่อที่แสดง</th>
                    <th scope="col">สิทธิ์เข้าถึง</th>
                    <th scope="col">หมายเหตุ</th>
                    <th scope="col">คำสั่ง</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
    </div>
</body>
<script>
    function check_session() {
        $.ajax({
            method: "POST",
            cache: false,
            url: "api/sudo_check_session.php",
            data: {},
            success: function (data) {
                if (data == 'false') {
                    $('#pc_sudo').modal('show');
                }
                else if (data == 'true') {
                    document.getElementById('main_table').style.display = null;
                    document.getElementById('add_pwd').style.display = null;
                    document.getElementById('sudo_signout').style.display = null;
                    document.getElementById('mainNav').style.display = null;
                    pwd_qry();
                }
            }
        });

    }

    function delSession() {
        $.ajax({
            url: "api/sudo_del_session.php",
            type: "POST",
            data: {},
            success: function (data) {
                if (data = 'del_complete') {
                    setTimeout(function () {
                        swal({
                            title: "ออกจากระบบเรียบร้อยแล้ว",
                            type: "success"
                        }, function () {
                            location.reload();
                        });
                    }, 100);
                }
            }
        })
    }

    $('#add_pwd_form').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "api/sudo_add_pwd.php",
            data: $("#add_pwd_form").serialize(),
            success: function (data) {
                if (data == 'pass') {
                    $('#add_pwd_modal').modal('hide');
                    document.getElementById("add_pwd_form").reset();
                    setTimeout(function () {
                        swal({
                            title: "เพิ่มรหัสยืนยันสำเร็จ",
                            type: "success"
                        }, function () {
                            reqry();
                        });
                    }, 100);
                }
                else {
                    document.getElementById("add_pwd_form").reset();
                    setTimeout(function () {
                        swal({
                            title: "เกิดข้อผิดพลาด",
                            type: "error"
                        }, function () {
                        });
                    }, 100);
                }
            }
        });
    })

    function pwd_qry() {
        $.ajax({
            method: "POST",
            cache: false,
            url: "api/sudo_pwd_qry.php",
            data: {},
            success: function (data) {
                data = JSON.parse(data);
                if (data != 'failed') {
                    for (i in data) {
                        var table_id = document.getElementById("pwd_list");
                        var row = table_id.insertRow(-1);
                        var id_insert = row.insertCell(0);
                        var username_insert = row.insertCell(1);
                        var display_name_insert = row.insertCell(2);
                        var permission_insert = row.insertCell(3);
                        var note_insert = row.insertCell(4);
                        var cmd_insert = row.insertCell(5);
                        id_insert.innerHTML = data[i][0];
                        username_insert.innerHTML = data[i][1];
                        display_name_insert.innerHTML = data[i][3];
                        permission_insert.innerHTML = data[i][4];
                        note_insert.innerHTML = data[i][2];
                        cmd_insert.innerHTML = "<button type='button' class='btn btn-danger' onclick='delpwd_check(" + data[i][0] + ")'>ลบ</button><button type='button' class='btn btn-secondary' style='margin-left: 3px;' onclick='editpwd(" + data[i][0] + ")'>แก้ไข</button>";
                    }
                }
                else {
                    //console.log('failed');
                }
            }
        });

    }

    $('#pc_sudo_form').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            method: "POST",
            url: "api/sudo_pc_verify.php",
            data: $("#pc_sudo_form").serialize(),
            success: function (data) {
                console.log(data);
                if (data == 'pass') {
                    $('#pc_sudo').modal('hide');
                    document.getElementById("pc_sudo_form").reset();
                    check_session();
                    setTimeout(function () {
                        swal({
                            title: "เข้าสู่ระบบสำเร็จ",
                            type: "success"
                        }, function () {
                            //func
                        });
                    }, 100);
                }
                else {
                    document.getElementById("pc_sudo_form").reset();
                    setTimeout(function () {
                        swal({
                            title: "เกิดข้อผิดพลาด",
                            type: "error"
                        }, function () {
                        });
                    }, 100);
                }
            }
        });
    })

    function delpwd_check(ID) {
        $.ajax({
            url: "api/sudo_check_session.php",
            type: "POST",
            data: {},
            success: function (data) {
                if (data == 'false') {
                    //func
                }
                else if (data == 'true') {
                    document.getElementById("delpwd_button").setAttribute('onclick', 'delpwd(' + ID + ')');
                    $('#delpwd_confirm').modal('show');
                }
            }
        })
    }

    function delpwd(ID) {
        $.ajax({
            url: "api/sudo_delpwd.php",
            type: "POST",
            data: { 'ID': ID },
            success: function (data) {
                if (data == 'complete') {
                    $('#delpwd_confirm').modal('hide');
                    setTimeout(function () {
                        swal({
                            title: "ลบรหัสยืนยันเรียบร้อย",
                            type: "success"
                        }, function () {
                            reqry();
                        });
                    }, 100);
                }
                else {
                    setTimeout(function () {
                        swal({
                            title: "เกิดข้อผิดพลาด",
                            type: "error"
                        }, function () {
                            reqry();
                        });
                    }, 100);
                }
            }
        })
    }

    $(function () {
        $('#username_v').on('keypress', function (e) {
            if (e.which == 32) {
                alert('ห้ามมีการเว้นวรรค')
                return false;
            }
        });
    });

    $(function () {
        $('#password_v').on('keypress', function (e) {
            if (e.which == 32) {
                alert('ห้ามมีการเว้นวรรค')
                return false;
            }
        });
    });

    function editpwd(ID) {
        $.ajax({
            method: "POST",
            url: "api/sudo_edit_get.php",
            data: { 'id_edit': ID },
            success: function (data) {
                data = JSON.parse(data);
                if (data[6] == 'true') {
                    var ID_edit = data[0];
                    var note_edit = data[1];
                    var username_edit = data[2];
                    var pwd_edit = data[3];
                    var display_name_edit = data[4];
                    var permission_lv_edit = data[5];
                    document.getElementById("note_edit").value = note_edit;
                    document.getElementById("username_v_edit").value = username_edit;
                    document.getElementById("pwd_v_edit").value = pwd_edit;
                    document.getElementById("display_name_edit").value = display_name_edit;
                    document.getElementById("permission_edit").value = permission_lv_edit;
                    $('#edit_pwd_modal').modal('show');
                }
                else if (data = 'false') {
                    $('#pc_sudo').modal('show');
                }
            }
        });
    }

    $('#edit_pwd_form').on('submit', function (e) {
        e.preventDefault();
        $('#edit_pwd_modal').modal('hide');
        var pinform = $("#edit_pwd_form");
        var params = pinform.serializeArray();
        var pin_formData = new FormData();
        $(params).each(function (index, element) {
            pin_formData.append(element.name, element.value);
        });
        $.ajax({
            method: "POST",
            cache: false,
            url: "api/sudo_editpwd.php",
            data: pin_formData,
            contentType: false,
            processData: false,
            success: function (data) {
                if (data == 'pass') {
                    reqry();
                    setTimeout(function () {
                        swal({
                            title: "แก้ไขข้อมูลสำเร็จ",
                            type: "success"
                        }, function () {
                            document.getElementById("edit_pwd_form").reset();
                            $('#edit_pwd_modal').modal('hide');
                        });
                    }, 100);
                }
                else {
                    setTimeout(function () {
                        swal({
                            title: "เกิดข้อผิดพลาด",
                            type: "error"
                        }, function () {
                            //function
                        });
                    }, 100);
                }
            }
        });
    });

    function reqry() {
        var count = pwd_list.rows.length - 1;
        for (i in [...Array(count).keys()]) {
            document.getElementById("pwd_list").deleteRow(1);
        }
        pwd_qry();
    }

    $('#pc_sudo').on('hidden.bs.modal', function () {
        $.ajax({
            method: "POST",
            cache: false,
            url: "api/sudo_check_session.php",
            data: {},
            success: function (data) {
                if (data == 'true') {
                    //func
                }
                else {
                    $('#pc_sudo').modal('show');
                }
            }
        });
    });

    check_session();
</script>

</html>