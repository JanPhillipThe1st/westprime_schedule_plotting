
<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
<div class="container-fluid">
    <div class="row p-2">
        <div class="col-lg-12 rounded bg-white">
            <div class="row m-2">
                <div class="col-lg-10">
                    <h4 class="text-dark ">Manage Teachers</h4>
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-primary d-flex align-items-center" id="btn_add_schedule" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class='bx bx-plus-circle mx-2'></i> Add a teacher </button>
                </div>
            </div>
        <table class="table table-bordered table-striped ">
            <thead>
                <tr>
                    <th>Teacher ID</th>
                    <th>Teacher Name</th>
                    <th>Teacher Address</th>
                    <th>Teacher Contact</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="table_data">
                <tr>
                    <td>922819</td>
                    <td>HIS 101</td>
                    <td>Life and Works of Rizal</td>
                    <td>2C</td>
                    <td>
                        <button class="btn btn-success d-flex align-items-center w-50"> <i class='bx bx-edit mx-2'></i> Edit</button>
                        <button class="btn btn-danger d-flex align-items-center w-50"><i class='bx bx-trash mx-2'></i> Delete</button>
                    </td>
                </tr>
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
                        <h5 class="modal-title text-dark" id="exampleModalLabel">New Schedule</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-dark">
                        <div class="form-group">
                          <label for="teacher_name">Teacher Name</label>
                          <input type="text" name="teacher_name" id="teacher_name" class="form-control" placeholder="Enter name here..." >
                          <label for="teacher_address">Teacher Address</label>
                          <input type="text" name="teacher_address" id="teacher_address" class="form-control" placeholder="Enter address here..." >
                          <label for="teacher_contact">Teacher Contact</label>
                          <input type="number" name="teacher_contact" id="teacher_contact" class="form-control" placeholder="Enter contact here..." >
                          </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id="save_changes" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>

<script>
       $(document).ready(()=>{
        getTeachers();
        $("#save_changes").click(()=>{
            var teacher_name = $("#teacher_name").val();
            var teacher_address = $("#teacher_address").val();
            var teacher_contact = $("#teacher_contact").val();
            if(window.confirm("Are you sure you want to add this record?")){
                
                $.post("../ajax.php",{action:"add_teacher",teacher_name:teacher_name,teacher_address:teacher_address,teacher_contact:teacher_contact},(data,status)=>{
                    alert("Teacher Information Added Successfully!");
                    getTeachers();
                });
            }
        });
        function getTeachers(){
            $.post("../ajax.php",{action:"get_teachers"},(response)=>{
                var table_data = $("#table_data");
                table_data.empty();
                var rooms = [];
                rooms =JSON.parse(response);
                rooms.forEach((room,room_index)=>{
                    table_data.append(
                        $("<tr></tr>")
                        .append("<td>"+room.ID+"</td>")
                        .append("<td>"+room.teacher_name+"</td>")
                        .append("<td>"+room.teacher_address+"</td>")
                        .append("<td>"+room.teacher_contact+"</td>")
                        .append(
                            $("<td></td>")
                            .append("<button class='btn btn-success d-flex align-items-center w-50'> <i class='bx bx-edit mx-2'></i> Edit</button>")
                            .append("<button class='btn btn-danger d-flex align-items-center w-50'><i class='bx bx-trash mx-2'></i> Delete</button>")
                        )
                    );
                });
            });
        }
    });
</script>
