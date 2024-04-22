<div class="container-fluid">
    <div class="card text-left">
    <img class="card-img-top" src="holder.js/100px180/" alt="">
    <div class="card-body">
        <h4 class="card-title">Quick View</h4>
        <div class="row">
            <div class="col-lg-6">
            <div class="card">
            <div class="card-header">
                <p class="card-title text-dark">Active Blocks</p>
            </div>
            <!-- <img class="card-img-top" src="../assets/img/school_logo_sample.png" alt="Card image cap"> -->
            <div class="card-body">
                <h1 class="card-text text-primary">5</h1>
                <div class="card-footer d-flex align-items-right">
                    <a href="blocks.php" class="btn btn-primary float-right">View Blocks <i class='bx bxs-chevrons-right'></i></a>
                </div>
            </div>
            </div>
            </div>
            <div class="col-lg-6">
            <div class="card">
            <div class="card-header">
                <p class="card-title text-dark">Active Teachers</p>
            </div>
            <!-- <img class="card-img-top" src="../assets/img/school_logo_sample.png" alt="Card image cap"> -->
            <div class="card-body">
                <h1 class="card-text text-warning">5</h1>
                <div class="card-footer d-flex align-items-right">
                    <a href="teachers.php" class="btn btn-warning text-white">View Teachers <i class='bx bxs-chevrons-right'></i></a>
                </div>
            </div>
            </div>
            </div>
        </div>
    </div>
    </div>
</div>
<div class="container-fluid my-3">
    <div class="card text-left">
    <img class="card-img-top" src="holder.js/100px180/" alt="">
    <div class="card-body">
        <h4 class="card-title">Analytics</h4>
        <div class="row">
            <div class="col-lg-5">
                <div class="container bg-white rounded py-1"  >
                    <h6 class="text-dark p-2">Number of teachers per subject</h6>
                    <canvas id="teachers_chart"></canvas>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="row bg-white rounded text-dark p-3">
                    Schedule
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>Subject</th>
                                <th>Course Code</th>
                                <th>Teacher</th>
                                <th>Time</th>
                                <th>Room</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Life and Works of Rizal</td>
                                <td>HIS 101</td>
                                <td>Mr. John May</td>
                                <td>8:40 - 10:10 am</td>
                                <td>2C</td>
                            </tr>
                            <tr>
                                <td>Readings in Philippine History</td>
                                <td>HIS 102</td>
                                <td>Mr. Jake Liverpool</td>
                                <td>10:10 - 11:40 am</td>
                                <td>1C</td>
                            </tr>
                        </tbody>
                    </table>
                    
                    <a href="#" class="btn btn-success text-white" id="manage_schedule_link">Manage Schedule <i class='bx bxs-chevrons-right'></i></a>
                </div>
                
            </div>
          
        </div>
    </div>
    </div>
    
</div>
<script src="../assets/js/chart.umd.min.js"></script>
<script>
    $(document).ready(()=>{
     $("#manage_schedule_link").click(()=>{
        $("#manage_schedule_link").html("<div class='spinner-border text-light' role='status'>"
        +" <span class='sr-only'></span>"+
"</div>");
        $("#content").load("./contents/schedule.php");
        $("#btn_schedules").addClass("active");
        $("#btn_dashboard").removeClass("active");
        $("#btn_users").removeClass("active");
        $("#btn_blocks").removeClass("active");
        $("#btn_teachers").removeClass("active");
     });
  const ctx = document.getElementById('teachers_chart');
        new Chart(ctx, {
    type: 'doughnut',
    data: {
      labels: ['IT 101', 'IT 113', 'IT 211', 'IT 301', 'IT 104', 'IT 102'],
      datasets: [{
        label: '# of Teachers',
        data: [2, 1, 1, 2, 2, 3],
        borderWidth: 1
      }]
    },
    options: {  
        responsive:true,
        maintainAspectRatio: true
    },
    plugins:{
        title:{
            display:true
        }
    }
  });
    });
</script>