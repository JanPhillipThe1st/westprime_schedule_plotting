
<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
<div class="container-fluid">
    <div class="row p-2">
        <div class="col-lg-12 rounded bg-white">
            <div class="row m-2">
                <div class="col-lg-10">
                    <h4 class="text-dark ">Manage Rooms</h4>
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-primary d-flex align-items-center" id="btn_add_schedule" data-bs-toggle="modal" 
                    data-bs-target="#exampleModal"> <i class='bx bx-plus-circle mx-2'></i> Add new room </button>
                </div>
            </div>
        <table class="table table-bordered table-striped ">
            <thead>
                <tr>
                    <th>Room ID</th>
                    <th>Room Number</th>
                    <th>Floor</th>
                    <th>Seating Capacity</th>
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
                        <h5 class="modal-title text-dark" id="exampleModalLabel">New Room</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body text-dark">
                        <div class="form-group">
                          <label for="room_number">Room Number</label>
                          <input type="text" name="room_number" id="room_number" class="form-control" placeholder="Enter room number here..." >
                          <label for="room_floor">Floor</label>
                          <select name="room_floor" id="room_floor" class="form-control">
                            <option value="1st">1st</option>
                            <option value="2nd">2nd</option>
                            <option value="3rd">3rd</option>
                            <option value="4th">4th</option>
                          </select>
                          <label for="seating_capacity">Seating Capacity</label>
                          <input type="number" name="seating_capacity" id="seating_capacity" class="form-control" placeholder="Enter seating capacity here..." >
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" id= "save_changes" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>

<script>
    $(document).ready(()=>{
        getRooms();
        $("#save_changes").click(()=>{
            var room_number = $("#room_number").val();
            var room_floor = $("#room_floor").val();
            var seating_capacity = $("#seating_capacity").val();
            if(window.confirm("Are you sure you want to add this room?")){
                
                $.post("../ajax.php",{action:"add_room",room_number:room_number,room_floor:room_floor,seating_capacity:seating_capacity},(data,status)=>{
                    alert("Room Added Successfully!");
                    $("#exampleModal").modal('toggle');
                    getRooms();
                });
            }
        });
        function getRooms(){
            $.post("../ajax.php",{action:"get_rooms"},(response)=>{
                var table_data = $("#table_data");
                table_data.empty();
                var rooms = [];
                rooms =JSON.parse(response);
                rooms.forEach((room,room_index)=>{
                    table_data.append(
                        $("<tr></tr>")
                        .append("<td>"+room.ID+"</td>")
                        .append("<td>"+room.room_number+"</td>")
                        .append("<td>"+room.room_floor+"</td>")
                        .append("<td>"+room.seating_capacity+"</td>")
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
