<html>

<head>
    <title>Pinme | Web map</title>
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon.ico">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link href="../css/styles.css" rel="stylesheet">
    <link href="../css/all.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert-dev.js"></script>
</head>

<body>
    <nav class="navbar bg-secondary text-uppercase fixed-bottom" style="padding-bottom: 1px;padding-top: 1px;"
        id="mainNav">
        <div class="container" id="main_navbar" style="margin-bottom: 0px;">
            <a class="navbar-brand"><i class="fa-solid fa-location-pin fa-bounce"></i> Pin<font color="#FF6666">me
                </font></a>
            <div id="button_group"><button id="create_sudo_pwd" class="btn btn-danger" style="margin-left: 5px;;"
                    onclick="create_sudo_pwd()">สร้างบัญชีผู้ผู้ดูแลระบบ</button>
            </div>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ms-auto">
                </ul>
            </div>
        </div>
    </nav>

    <div id="edit_pwd_modal" class="modal fade" style="--bs-modal-width: 370px;">
        <div class="modal-dialog" style="top: 20%;">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"><i class="fa-solid fa-lock"></i> สร้างบัญชีผู้ดูแลระบบ</h5>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <form name="edit_pwd_form" id="edit_pwd_form" method="post" enctype=multipart/form-data>
                    <table class="modal_form" border="0" cellspacing="0" cellpadding="10">
                        <tr>
                            <td class="modal_font"><i class="fa-solid fa-user"></i> ชื่อเข้าใช้งาน</td>
                            <td><input id="username_v_edit" class="textInput modal_font" type="text"
                                    name="username_v_edit" required></td>
                        </tr>
                        <tr>
                            <td class="modal_font"><i class="fa-solid fa-key"></i> รหัสผ่าน</td>
                            <td><input id="pwd_v_edit" class="textInput modal_font" type="password" name="pwd_v_edit"
                                    required>
                            </td>
                        </tr>
                        <tr>
                            <td class="modal_font"><i class="fa-solid fa-flag"></i> สิทธิ์เข้าถึง</td>
                            <td><select name="permission_edit" id="permission_edit">
                                    <option value="SUDO" class="modal_font">ผู้ดูแลระบบ</option>
                                </select></td>
                        </tr>
                    </table>
                    <br>
                    <center><button type="submit" class="btn btn-primary modal_font">สร้างบัญชี</button></center>
                </form>
            </div>
        </div>
    </div>

</body>
<script>
    $(function () {
        $('#username_v_edit').on('keypress', function (e) {
            if (e.which == 32) {
                alert('ห้ามมีการเว้นวรรค')
                return false;
            }
        });
    });

    $(function () {
        $('#pwd_v_edit').on('keypress', function (e) {
            if (e.which == 32) {
                alert('ห้ามมีการเว้นวรรค')
                return false;
            }
        });
    });

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
                    setTimeout(function () {
                        swal({
                            title: "เพิ่มบัญชีสำเร็จ",
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

    function create_sudo_pwd() {
        $('#edit_pwd_modal').modal('show');
    }

    function connect_db_pdo() {
        $.ajax({
            method: "POST",
            cache: false,
            url: "../api/connect_db_pdo.php",
            success: function (data) {
                //connect to database and create table
            }
        });
    }
    connect_db_pdo()
</script>

</html>