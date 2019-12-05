
<form method="POST" onsubmit="return addCourier(this);" id="RegisterForm"  enctype="multipart/form-data" accept-charset="utf-8" class="form-horizontal">
    <div class="row">
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">Sender Detail</div>
                <div class="card-body">
                    <input name="staff_Id" style="display:none" value="<?php echo $this->session->userdata('userId'); ?>"/>
                    <input name="courierId" style="display:none" value="<?php if (isset($courierDetails->id)) {
    echo $courierDetails->id;
} ?>"/>
                    <div class="form-group">
                        <label for="sender-branch" class="control-label mb-1">Sender Branch</label>
                        <input id="senderBranch" value="<?php if (isset($courierDetails->sender_branch)) {
    echo $courierDetails->sender_branch;
} ?>" name="senderBranch" type="text" class="form-control" required>
                    </div>
                    <div class="form-group has-success">
                        <label for="Sender-Name" class="control-label mb-1">Sender Name</label>
                        <input id="senderName" value="<?php if (isset($courierDetails->sender_name)) {
    echo $courierDetails->sender_name;
} ?>" name="senderName" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="sender-ContactNumber" class="control-label mb-1">Sender Contact Number</label>
                        <input maxlength="10" minlength="10" id="senderContactNumber" value="<?php if (isset($courierDetails->sender_contactnumber)) {
    echo $courierDetails->sender_contactnumber;
} ?>" name="senderContactNumber" type="tel" class="form-control cc-number identified visa mobile" value="" data-val="true"
                               data-val-required="Please enter the card number" data-val-cc-number="Please enter a valid card number"
                               autocomplete="cc-number" required>
                    </div>
                    <div class="form-group">
                        <label for="Sender-Address" class="control-label mb-1">Sender Contact Address</label>
                        <textarea name="senderAddress" id="senderAddress" rows="4"  class="form-control" required><?php if (isset($courierDetails->sender_contactnumber)) {
    echo $courierDetails->sender_address;
} ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="sender-State" class="control-label mb-1">Sender State</label>
                        <input id="senderState"  name="senderState" type="text" class="form-control " value="<?php if (isset($courierDetails->sender_state)) {
    echo $courierDetails->sender_state;
} ?>" >
                    </div>
                    <div class="form-group">
                        <label for="sender-City" class="control-label mb-1">Sender City</label>
                        <input id="senderCity" value="<?php if (isset($courierDetails->sender_city)) {
    echo $courierDetails->sender_city;
} ?>" name="senderCity" type="tel" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="sender-Pincode" class="control-label mb-1">Sender Pincode</label>
                        <input id="senderPincode" value="<?php if (isset($courierDetails->sender_pincode)) {
    echo $courierDetails->sender_pincode;
} ?>" name="senderPincode" type="tel" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="sender-Country" class="control-label mb-1">Sender Country</label>
                        <input id="senderCountry" value="<?php if (isset($courierDetails->sender_country)) {
    echo $courierDetails->sender_country;
} ?>" name="senderCountry" type="text" class="form-control">
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="card">
                <div class="card-header">Reciepent Detail</div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="Reciepent-Branch" class="control-label mb-1">Reciepent Branch</label>
                        <input id="reciepentBranch" value="<?php if (isset($courierDetails->reciepent_branch)) {
    echo $courierDetails->reciepent_branch;
} ?>" name="reciepentBranch" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="Reciepent-Name" class="control-label mb-1">Reciepent Name</label>
                        <input id="reciepentName" value="<?php if (isset($courierDetails->reciepent_name)) {
    echo $courierDetails->reciepent_name;
} ?>" name="reciepentName" type="text" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="cc-name" class="control-label mb-1">Reciepent Contact Number</label>
                        <input maxlength="10" minlength="10" id="reciepentContactNumber" value="<?php if (isset($courierDetails->reciepent_contactnumber)) {
    echo $courierDetails->reciepent_contactnumber;
} ?>" name="reciepentContactNumber" type="text" class="form-control mobile" required>
                    </div>
                    <div class="form-group">
                        <label for="Reciepent-Address" class="control-label mb-1">Reciepent Contact Address</label>
                        <textarea name="ReciepentAddress" id="ReciepentAddress" rows="4"  class="form-control" required><?php if (isset($courierDetails->reciepent_address)) {
    echo $courierDetails->reciepent_address;
} ?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="Reciepent-State" class="control-label mb-1">Reciepent State</label>
                        <input id="ReciepentState"  name="ReciepentState" type="text" class="form-control " value="<?php if (isset($courierDetails->reciepent_state)) {
    echo $courierDetails->reciepent_state;
} ?>" >
                    </div>
                    <div class="form-group">
                        <label for="Reciepent-City" class="control-label mb-1">Reciepent City</label>
                        <input id="ReciepentCity" name="ReciepentCity" value="<?php if (isset($courierDetails->reciepent_city)) {
    echo $courierDetails->reciepent_city;
} ?>" type="tel" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Reciepent-Pincode" class="control-label mb-1">Reciepent Pincode</label>
                        <input id="ReciepentPincode" name="ReciepentPincode" value="<?php if (isset($courierDetails->reciepent_pincode)) {
    echo $courierDetails->reciepent_pincode;
} ?>" type="tel" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="Reciepent-Country" class="control-label mb-1">Reciepent Country</label>
                        <input id="ReciepentCountry" name="ReciepentCountry" value="<?php if (isset($courierDetails->reciepent_country)) {
    echo $courierDetails->reciepent_country;
} ?>" type="text" class="form-control">
                    </div>
                </div>
            </div>
        </div>
        <div class="card" style="width: 100%;margin-right: 15px;margin-left: 15px;">
            <div class="card-header">
                <strong>Courier</strong> Details
            </div>
            <div class="card-body card-block">
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="courier-description" class=" form-control-label">Courier Description</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <textarea name="courierDescription" id="courierDescription" rows="4"  class="form-control" required><?php if (isset($courierDetails->courier_description)) {
    echo $courierDetails->courier_description;
} ?></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="parcel-weight" class=" form-control-label">Parcel Weight(in kg)</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="parcelWeight" value="<?php if (isset($courierDetails->parcel_weight)) {
    echo $courierDetails->parcel_weight;
} ?>" name="parcelWeight" class="form-control" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="parcel-Dimention" class=" form-control-label">Parcel Dimention(in inch)</label>
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="parcelWeight" value="<?php if (isset($courierDetails->parcel_weight)) {
    echo $courierDetails->parcel_length;
} ?>" name="ParcelLength" placeholder="Length" class="form-control">
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="parcelWeight" value="<?php if (isset($courierDetails->parcel_weight)) {
    echo $courierDetails->parcel_height;
} ?>" name="ParcelHeight" placeholder="Height" class="form-control">
                    </div>
                    <div class="col-12 col-md-3">
                        <input type="text" id="ParcelWidth" value="<?php if (isset($courierDetails->parcel_weight)) {
    echo $courierDetails->parcel_width;
} ?>" name="ParcelWidth" placeholder="Width" class="form-control">
                    </div>

                </div>
                <div class="row form-group">
                    <div class="col col-md-3">
                        <label for="parcel-Price" class=" form-control-label">Parcel Price</label>
                    </div>
                    <div class="col-12 col-md-9">
                        <input type="text" id="parcelWeight" value="<?php if (isset($courierDetails->parcel_price)) {
    echo $courierDetails->parcel_price;
} ?>" name="parcelPrice" class="form-control">
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit"  class="btn btn-primary btn-sm">
                    <i class="fa fa-dot-circle-o"></i> Submit
                </button>
                <button type="reset" class="btn btn-danger btn-sm">
                    <i class="fa fa-ban"></i> Reset
                </button>
            </div>
        </div>
    </div>
</form>
<script>
    function addCourier(formElement) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>courierRegistration',
            data: $(formElement).serialize(),
            success: function (res) {
                if (res === '1') {
                    swal({
                        title: "Congratulation",
                        text: "Courier has been Added",
                        icon: "success"
                    }).then(function () {
                        window.location.href = '<?php echo base_url(); ?>newCourier';
                    });
                } else {
                    swal({
                        title: "Error!",
                        text: "Unable to submit the form. Please check validation and Try again!!",
                        icon: "error"
                    }).then(function () {
                        window.location.reload();
                    });
                }
            }
        });
        return false;
    }


    $(".mobile").keypress(function (e) {
        //if the letter is not digit then display error and don't type anything
        if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
            return false;
        }
    });
</script>