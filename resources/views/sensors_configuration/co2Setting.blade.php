<div class="card-header">
    <h4>Edit Carbon Dioxide</h4>
</div>
<div class="card-body">
    <form id="carbondioxideSettingForm" class="needs-validation">
    @csrf
        <input type="hidden" name="id" id="carbondioxideid" value="3">
        <div class="row">
            <div class="form-group col-12">
            <label>Sensor Name</label>
            <input type="text" class="form-control" name="sensor_name" id="carbondioxidesensor_name" value="Carbon Dioxide Sensor" required disabled>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-md-7 col-12">
            <label>Minimum Value</label>
            <input type="number" class="form-control" name="sensor_limit_value" id="carbondioxidesensor_limit_value" required>
            </div>
            <div class="form-group col-md-5 col-12">
            <label>Max Value</label>
            <input type="number" name="sensor_max_value" id="carbondioxidesensor_max_value" required class="form-control">
            </div>
        </div>
        <div class="row d-flex justify-content-center">
            <label>Status</label>
            <!-- <button type="button" class="btn btn-outline-success rounded-circle"><i class="fas fa-power-off"></i></button> -->
            <select class="custom-select" name="isOn" id="carbondioxideisOn">
                <option value="1">ON</option>
                <option value="0">OFF</option>
            </select>
        </div>
    </form>
</div>
<div class="card-footer text-right">
    <button class="btn btn-primary" id="savecarbondioxideSetting">Save</button>
    <button class="btn btn-primary" id="updatecarbondioxideSetting">Save Changes</button>
</div>