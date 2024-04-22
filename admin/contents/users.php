
<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
<div class="container-fluid">
    <div class="row p-2">
        <div class="col-lg-12 rounded bg-white">
            <div class="row m-2">
                <div class="col-lg-10">
                    <h4 class="text-dark ">Manage User</h4>
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-primary d-flex align-items-center" id="btn_add_schedule" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class='bx bx-plus-circle mx-2'></i> Add new user </button>
                </div>
            </div>
        <table class="table table-bordered table-striped ">
            <thead>
                <tr>
                    <th>Full name</th>
                    <th>Username</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="table_data">
            </tbody>
        </table>
        </div>
    </div>
</div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLabel">New user entry</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-dark">
                        <div class="form-group">
                          <label for="full_name">Full name</label>
                          <input type="text" name="full_name" id="full_name" class="form-control" placeholder="Enter full name here..." >
                          <label for="username">Username</label>
                          <input type="text" name="username" id="username" class="form-control" placeholder="Enter username here..." >
                          <label for="password">Password</label>
                          <input type="password" name="password" id="password" class="form-control" placeholder="Enter password here..." >
                          <label for="confirm_password">Confirm Password</label>
                          <input type="password" name="confirm_password" id="confirm_password" class="form-control" placeholder="Confirm password..." >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="add_user_button">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>

                     <!-- Edit Modal -->
                     <div class="modal fade" id="edit_user_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLabel">Edit user</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-dark">
                        <div class="form-group">
                          <label for="edit_full_name">Full name</label>
                          <input type="text" name="edit_full_name" id="edit_full_name" class="form-control" placeholder="Enter full name here..." >
                          <label for="edit_username">Username</label>
                          <input type="text" name="edit_username" id="edit_username" class="form-control" placeholder="Enter username here..." >
                          <label for="edit_password">Password</label>
                          <input type="password" name="edit_password" id="edit_password" class="form-control" placeholder="Enter password here..." >
                          <label for="edit_confirm_password">Confirm Password</label>
                          <input type="password" name="edit_confirm_password" id="edit_confirm_password" class="form-control" placeholder="Confirm password..." >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="edit_user_button">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>


                <!-- Delete Modal -->
                <div class="modal fade" id="delete_user_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-dark" id="exampleModalLabel">Edit user</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-dark">
                        <div class="form-group">
                          <label for="edit_full_name">Full name</label>
                          <input type="text" name="edit_full_name" id="edit_full_name" class="form-control" placeholder="Enter full name here..." >
                          <label for="edit_username">Username</label>
                          <input type="text" name="edit_username" id="edit_username" class="form-control" placeholder="Enter username here..." >
                          <label for="edit_password">Password</label>
                          <input type="password" name="edit_password" id="edit_password" class="form-control" placeholder="Enter password here..." >
                          <label for="edit_confirm_password">Confirm Password</label>
                          <input type="password" name="edit_confirm_password" id="edit_confirm_password" class="form-control" placeholder="Confirm password..." >
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary" id="update_button">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>

<script>
</script>
<script>

var current_user_id = 2;

    $(document).ready(()=>{
        getUsers();
    });
    $("#edit_user_button").click(()=>{
        if(window.confirm("Are you sure you want to update this user's information?")){
            var full_name = $("#edit_full_name").val();
            var username = $("#edit_username").val();
            var password = $("#edit_password").val();
            var confirm_password = $("#edit_confirm_password").val();
            if (confirm_password == password) {
                    $.post("../ajax.php",{action:"edit_user",full_name:full_name,username:username,password:password,user_id:current_user_id},(response,status)=>{
                        alert("User information successfully updated!");
                        getUsers();
                    });
            }
            else{
                alert("Passwords do not match!");
            }
       
    }
    });
    $("#add_user_button").click(()=>{
        if(window.confirm("Are you sure you want to add this user?")){
            var full_name = $("#full_name").val();
            var username = $("#username").val();
            var password = $("#password").val();
            var confirm_password = $("#confirm_password").val();
            var confirm_password = $("#confirm_password").val();
            if (confirm_password == (password)) {
                    $.post("../ajax.php",{action:"add_user",full_name:full_name,username:username,password:password},(response,status)=>{
                        alert("User successfully added!");
                        getUsers();
                    });
            }
            else{
                alert("Passwords do not match!");
            }
       
    }
    });
function getUsers(){
            $.post("../ajax.php",{action:"get_users"},(response)=>{
                var table_data = $("#table_data");
                table_data.empty();
                var rooms = [];
                rooms =JSON.parse(response);
                rooms.forEach((room,room_index)=>{
                    table_data.append(
                        $("<tr></tr>")
                        .append("<td>"+room.full_name+"</td>")
                        .append("<td>"+room.username+"</td>")
                        .append(
                            $("<td class='action_buttons'></td>")
                            .append($("<button class='btn btn-success d-flex align-items-center w-50'> <i class='bx bx-edit mx-2'></i> Edit</button>"
                            ).click(()=>{
                                current_user_id = room.ID;
                                $.post("../ajax.php",{action:"get_user_by_id",user_id:room.ID},(response,status)=>{
                                    var user_data = JSON.parse(response);
                                    //Populate inputs
                                    $("#edit_full_name").val(user_data.username);
                                    $("#edit_username").val(user_data.full_name);
                                    $("#edit_password").val(user_data.password);
                                    $("#edit_confirm_password").val(user_data.password);
                                    $("#edit_user_modal").modal("toggle");
                                });
                            }))
                            .append($("<button class='btn btn-danger d-flex align-items-center w-50'><i class='bx bx-trash mx-2'></i> Delete</button>").click(()=>{
                                if(window.confirm("Are you sure you want to delete this user?")){
                                    $.post("../ajax.php",{action:"delete_user",user_id:room.ID},(response,status)=>{
                                        alert("User successfully deleted!");
                                        getUsers();
                                    });
                                }

                            }))
                        )
                    );
                });
            });
        }
</script>
