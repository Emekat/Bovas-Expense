<?php
require("config.php");
//you want the truck list
if($_GET['list'] === "truck"){
    $rows = query("SELECT `truckid`, `platenumber` FROM truck");
?>
 <div class="col-lg-5 col-lg-offset-1">
<h3>Select Truck and Route</h3>
                                <div class="form-group">
                        <label for="truck">Truck</label>
                        <select class="form-control" name="truck" id="truck">
                            <option value="">Select Truck</option>
<?php
    foreach($rows as $row){
        printf('<option value = "%s">%s</option>', $row['truckid'], $row['platenumber']);
    }?>
              </select>
                    </div>
                    <div class="form-group">
                        <label for="route">Route</label>
                        <select class="form-control" name="route" id="route">
                            <option value="">Select Route</option>
                        <?php $rows = query("SELECT `routeid`, `routename` FROM route");
    foreach($rows as $row){
        printf('<option value = "%s">%s</option>', $row['routeid'], $row['routename']);
    }?>
                        </select>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Assign</button>
                    </div>
<?php }
elseif($_GET['list'] === "complete"){
    $rows = query("SELECT `tripid`, `date`, `platenumber`, `routename` FROM `truck`, `route`, `trip` WHERE".
        " `truck`.`truckid` = `trip`.`truckid` AND `route`.`routeid` = `trip`.`routeid`");
?>
 <div class="col-lg-5 col-lg-offset-1">
<h3>Mark Trip as completed</h3>
                    <div class="form-group">
                        <label for="trip">Trip</label>
                        <select class="form-control" name="trip" id="trip">
                            <option value="">Select Trip</option>
<?php
    foreach($rows as $row){
        printf('<option value = "%s">%s %s %s</option>', $row['tripid'], $row['platenumber'],
        $row['routename'], $row['date']);
    }?>
              </select>
                    </div>
                    <div class="form-group">
                        <label for="waybillno">Waybill Number</label>
                        <input type="text" placeholder="Enter Waybill Number" class="form-control" name="waybillno" id="waybillno">
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary" type="submit">Assign</button>
                    </div>


<?php }?>
