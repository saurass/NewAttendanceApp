<?php
    if(isset($_POST['get']) and isset($_POST['roll']) and isset($_POST['pass'])) {
    ?>

<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link rel="stylesheet" type="text/css" href="./custom.css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pusher/4.3.0/pusher.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/mustache.js/2.3.2/mustache.min.js"></script>
<script>
	var roll = '<?php echo $_POST['roll'] ?>';
	var pass = '<?php echo $_POST['pass'] ?>';
</script>
<script src="./custom.js"></script>


<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.min.css" rel='stylesheet' type='text/css'>

<div class="container">
    <div class="row">
    
    <p></p>
    <h1>Your Attendance goes Here !</h1>
    
        <div class="col-md-10 col-md-offset-1">

            <div class="panel panel-default panel-table">
              <div class="panel-heading">
                <div class="row">
                  <div class="col col-xs-6">
                    <h3 class="panel-title">Panel Heading</h3>
                  </div>
                  
                </div>
              </div>
              <div class="panel-body">
                <table class="table table-striped table-bordered table-list">
                  <thead>
                    <tr>
                        <th>Subject ID</th>
                        <th>Total Classes</th>
                        <th>Attended</th>
                        <th>Percentage</th>
                    </tr> 
                  </thead>
                  <tbody id="target">
                          
                   </tbody>
                </table>
            
              </div>
            </div>

</div></div></div>

	<?php
	    } else {
	    header('location: index.php');
	    }
?>