
<link rel="stylesheet" href="../assets/vendor/bootstrap/css/bootstrap.css">
<div class="container-fluid">
    <div class="row p-2">
        <div class="col-lg-12 rounded bg-white">
            <div class="row m-2">
                <div class="col-lg-10">
                    <h4 class="text-dark ">Manage Blocks</h4>
                </div>
                <div class="col-lg-2">
                    <button class="btn btn-primary d-flex align-items-center" id="btn_add_schedule" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class='bx bx-plus-circle mx-2'></i> Add new Block </button>
                </div>
            </div>
        <table class="table table-bordered table-striped ">
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
            <tbody>
                <tr>
                    <td>922819</td>
                    <td>HIS 101</td>
                    <td>Life and Works of Rizal</td>
                    <td>Mr. John May</td>
                    <td>8:40 - 10:10 am</td>
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
                          <label for="room">Choose Room</label>
                          <select name="room" id="room" class="form-control">
                            <option value="1A">1A</option>
                            <option value="1B">1B</option>
                            <option value="1C">1C</option>
                            <option value="1D">1D</option>
                          </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                    </div>
                </div>
                </div>

<script>
</script>
