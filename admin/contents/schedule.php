
<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
<div class="container-fluid">
    <div class="row p-2">
        <div class="col-lg-12 rounded bg-white">
            <div class="row m-2">
                <div class="col-lg-10">
                    <h4 class="text-dark ">Manage Schedules</h4>
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-primary d-flex align-items-center" id="btn_add_schedule" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class='bx bx-plus-circle mx-2'></i> Add new schedule </button>
                </div>
            </div>
        <table class="table table-bordered table-striped " id="schedules_table">
            <thead>
                <tr>
                    <th>Course ID</th>
                    <th>Course Code</th>
                    <th>Subject Description</th>
                    <th>Teacher</th>
                    <th>Time Slot</th>
                    <th>Room</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody id="table_data">
            </tbody>
        </table>
        <div class="row my-3">
            <div class="col-lg-10"></div>
            <div class="col-lg-2">
                <button class="btn btn-secondary w-100" id="print"><i class='bx bx-printer mx-2'></i>Print</button>
            </div>
        </div>
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
                          <label for="course_number">Course Number</label>
                          <input type="text" name="course_number" id="course_number" class="form-control" placeholder="Enter course number here..." >
                          <label for="course_code">Course Code</label>
                          <input type="text" name="course_code" id="course_code" class="form-control" placeholder="Enter course code here..." >
                          <label for="subject_description">Subject Description</label>
                          <input type="text" name="subject_description" id="subject_description" class="form-control" placeholder="Enter description here..." >
                          <label for="time_slot_from">Time slot from</label>
                          <input type="time" name="time_slot_from" id="time_slot_from" class="form-control">
                          <label for="time_slot_to">Time slot until</label>
                          <input type="time" name="time_slot_to" id="time_slot_to" class="form-control">
                          <label for="select_teacher">Select a teacher</label>
                          <select name="select_teacher" id="select_teacher" class="form-control">
                          </select>
                          <label for="room_selection">Choose Room</label>
                          <select name="room_selection" id="room_selection" class="form-control">
                          </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id= "save_changes" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>

                <script src="../assets/js/jasonday-printThis-23be1f8/printThis.js"></script>
<script>
    $(document).ready(()=>{
        getRooms(); 
        getTeachers(); 
        getSchedule();
        $("#print").click(()=>{
            //Insert print function here:
           var schedules_table_original = $("#schedules_table");
           var schedules_table = $("#schedules_table");
            schedules_table.find(".action_buttons").empty();
            schedules_table.find("th").last().empty();
           
           
           schedules_table.printThis({
            header: "<h1>Westprime Horizon Institute</h1>",
            afterPrint: ()=>{
                $("#schedules_table").empty();
                $("#schedules_table") = schedules_table_original;

            }
        });

        });
        $("#save_changes").click(()=>{
            var course_number = $("#course_number").val();
            var course_code = $("#course_code").val();
            var subject_description = $("#subject_description").val();
            var time_slot_from = $("#time_slot_from").val();
            var time_slot_to = $("#time_slot_to").val();
            var select_teacher = $("#select_teacher").val();
            var room_selection = $("#room_selection").val();
            if(window.confirm("Are you sure you want to add this schedule?")){
                
                $.post("../ajax.php",{action:"add_schedule",
                    course_number:course_number,
                    course_code:course_code,
                    subject_description:subject_description,
                    time_slot_from:time_slot_from,
                    time_slot_to:time_slot_to,
                    select_teacher:select_teacher,
                    room_selection:room_selection},(data,status)=>{
                    alert("Schedule Added Successfully!");
                    getSchedule();
                });
            }
        });
        function getRooms(){
            $.post("../ajax.php",{action:"get_rooms"},(response)=>{
                var table_data = $("#room_selection");
                table_data.empty();
                var rooms = [];
                rooms =JSON.parse(response);
                rooms.forEach((room,room_index)=>{
                    table_data.append(
                        $("<option value="+room.ID+">"+room.room_number+"</option>")
                       
                    );
                });
            });
        }

        function getSchedule(){
            $.post("../ajax.php",{action:"get_schedules"},(response)=>{
                var table_data = $("#table_data");
                table_data.empty();
                var rooms = [];
                rooms =JSON.parse(response);
                rooms.forEach((room,room_index)=>{
                    table_data.append(
                        $("<tr></tr>")
                        .append("<td>"+room.ID+"</td>")
                        .append("<td>"+room.course_code+"</td>")
                        .append("<td>"+room.subject_description+"</td>")
                        .append("<td>"+room.teacher_name+"</td>")
                        .append("<td>"+room.time_from +" - "+ room.time_until+"</td>")
                        .append("<td>"+room.room_number+"</td>")
                        .append(
                            $("<td class='action_buttons'></td>")
                            .append("<button class='btn btn-success d-flex align-items-center w-50'> <i class='bx bx-edit mx-2'></i> Edit</button>")
                            .append("<button class='btn btn-danger d-flex align-items-center w-50'><i class='bx bx-trash mx-2'></i> Delete</button>")
                        )
                    );
                });
            });
        }

        function getTeachers(){
            $.post("../ajax.php",{action:"get_teachers"},(response)=>{
                var select_teacher = $("#select_teacher");
                select_teacher.empty();
                var teacher_data_list = [];
                teacher_data_list =JSON.parse(response);
                teacher_data_list.forEach((teacher,teacher_index)=>{
                    select_teacher.append(
                        $("<option value="+teacher.ID+">"+teacher.teacher_name+"</option>")
                       
                    );
                });
            });
        }
    });
</script>
