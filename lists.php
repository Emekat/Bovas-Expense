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
<!-- These hidden fields hold values to be used by the controller. Their values will be set by javascript -->
                        <input type="hidden" value="route" name="what"/>
                        <input type="hidden" value="routeid" name="routeid" id="routeid"/>
                        <input type="hidden" value="truckid" name="truckid" id="truckid"/>
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
                        <button class="btn btn-primary" onclick="javascript:initFormValues('truck');" type="submit">Assign</button>
                    </div>
<?php }
elseif($_GET['list'] === "complete"){
    $rows = query("SELECT `tripid`, `date`, `platenumber`, `routename` FROM `truck`, `route`, `trip` WHERE".
        " `truck`.`truckid` = `trip`.`truckid` AND `route`.`routeid` = `trip`.`routeid` IS NULL");
?>
 <div class="col-lg-5 col-lg-offset-1">
<h3>Mark Trip as completed</h3>
                    <div class="form-group">
                        <input type="hidden" value="trip" name="what"/>
                        <input type="hidden" value="routeid" name="routeid" id="routeid"/>
                        <input type="hidden" value="tripid" name="tripid" id="tripid"/>
                        <input type="hidden" value="truckid" name="truckid" id="truckid"/>
                         <label for="trip">Trip</label>
                        <input type="hidden" value="trip" name="what"/>
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
                        <button class="btn btn-primary" onclick="javascript:initFormValues('trip');" type="submit">Submit</button>
                    </div>


<?php }?>
