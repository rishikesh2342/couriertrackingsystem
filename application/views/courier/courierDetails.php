<style>
    .del-panel{
        width: 25%;
        margin: 14% auto;
        padding: 30px;
    }
</style>
<div class="top-campaign">
    <h3 class="title-3 m-b-30">Courier View</h3>
    <p style="padding-bottom: 10px;">Refrence Number: CTSA<?php echo $courierDetails->id; ?></p>
    <p>Courier Date:  <?php echo $courierDetails->courier_date; ?></p>
    <div class="row form-group">
        <div class="col col-md-6">
            <table class="courialDetails-table" style="width:100%">
                <tr>
                    <th class="table-heading" colspan="2">Sender Details</th>
                </tr>
                <tr>
                    <td>Sender Branch</td>
                    <td><?php echo $senderDetails->sender_branch ?></td>
                </tr>
                <tr>
                    <td>Sender Name</td>
                    <td><?php echo $senderDetails->sender_name ?></td>
                </tr>
                <tr>
                    <td>Sender ContactNumber</td>
                    <td><?php echo $senderDetails->sender_contactnumber ?></td>
                </tr>
                <tr>
                    <td>Sender Address</td>
                    <td><?php echo $senderDetails->sender_address ?></td>
                </tr>
                <tr>
                    <td>Sender City</td>
                    <td><?php echo $senderDetails->sender_state ?></td>
                </tr>
                <tr>
                    <td>Sender State</td>
                    <td><?php echo $senderDetails->sender_city ?></td>
                </tr>
                <tr>
                    <td>Sender Pincode</td>
                    <td><?php echo $senderDetails->sender_country ?></td>
                </tr>
                <tr>
                    <td>Sender Country</td>
                    <td><?php echo $senderDetails->sender_pincode ?></td>
                </tr>
            </table>
        </div>
        <div class="col col-md-6">
            <table class="courialDetails-table" style="width:100%">
                <tr>
                    <th class="table-heading" colspan="2">Reciepent Details</th>
                </tr>
                <tr>
                    <td>Reciepent Branch</td>
                    <td><?php echo $reciepentDetails->reciepent_branch ?></td>
                </tr>
                <tr>
                    <td>Reciepent Name</td>
                    <td><?php echo $reciepentDetails->reciepent_name ?></td>
                </tr>
                <tr>
                    <td>Reciepent ContactNumber</td>
                    <td><?php echo $reciepentDetails->reciepent_contactnumber ?></td>
                </tr>
                <tr>
                    <td>Reciepent Address</td>
                    <td><?php echo $reciepentDetails->reciepent_address ?></td>
                </tr>
                <tr>
                    <td>Reciepent City</td>
                    <td><?php echo $reciepentDetails->reciepent_city ?></td>
                </tr>
                <tr>
                    <td>Reciepent State</td>
                    <td><?php echo $reciepentDetails->reciepent_state ?></td>
                </tr>
                <tr>
                    <td>Reciepent Pincode</td>
                    <td><?php echo $reciepentDetails->reciepent_pincode ?></td>
                </tr>
                <tr>
                    <td>Reciepent Country</td>
                    <td><?php echo $reciepentDetails->reciepent_country ?></td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-12 courier-td">
            <table class="courialDetails-table" style="width:100%">
                <tr>
                    <th class="table-heading" colspan="2">Courier Details</th>
                </tr>
                <tr>
                    <td>Courier Description</td>
                    <td><?php echo $courierDetails->courier_description; ?></td>
                </tr>
                <tr>
                    <td>Parcel Weight</td>
                    <td><?php echo $courierDetails->parcel_weight; ?> KG</td>
                </tr>
                <tr>
                    <td>Parcel Dimention Length</td>
                    <td><?php echo $courierDetails->parcel_length; ?> inch</td>
                </tr>
                <tr>
                    <td>Parcel Dimention Height</td>
                    <td><?php echo $courierDetails->parcel_height; ?> inch</td>
                </tr>
                <tr>
                    <td>Parcel Dimention Width</td>
                    <td><?php echo $courierDetails->parcel_width; ?> inch</td>
                </tr>
                <tr>
                    <td>Parcel Price</td>
                    <td><?php echo $courierDetails->parcel_price; ?></td>
                </tr>
                <tr>
                    <td>Parcel Status</td>
                    <td><?php
                        if (isset($courierHistoryDetails[0]->status)) {
                            echo $courierHistoryDetails[0]->status;
                        }
                        ?>

                    </td>
                </tr>
            </table>
        </div>
    </div>
    <div class="row form-group">
        <div class="col col-md-12">
            <input type="hidden" id="id" name="id" value=""/>
            <table class="courialDetails-table" style="width:100%">
                <tr>
                    <th class="table-heading" colspan="5">Courier History</th>
                </tr>
                <tr>
                    <th>Sr.No</th>
                    <th>Remark</th>
                    <th>Status</th>
                    <th>Time</th>
                    <th>Action</th>
                </tr>
                <tbody class="courierHistory-list">

                </tbody>
            </table>
        </div>
    </div>

    <div class="update-btn">
        <button type="button" onclick="clearModelData();" data-toggle="modal" data-target="#statusModal">Update</button>
    </div>
</div>
<!-- modal medium -->
<div class="modal fade" id="statusModal"  role="dialog" aria-labelledby="mediumModalLabel">
    <div class="modal-dialog modal-lg status" role="document">
        <div class="modal-content">
            <form method="POST" onsubmit="return updateStatus(this);" id="RegisterForm"  enctype="multipart/form-data" accept-charset="utf-8" class="form-horizontal">
                <div class="modal-header">
                    <h5 class="modal-title" id="mediumModalLabel">Update Status</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="courierHistoryId" id="courierHistoryId" />
                    <input style="display: none" name="courierId" value="<?php echo $courierDetails->id; ?>"  />
                    <input style="display: none" id="statusUpdateDate" name="statusUpdateDate" value="<?php echo date("d/m/Y"); ?>"  />
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="staff-remark" class=" form-control-label">Staff Remark</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <textarea name="remark" id="staff-remark" rows="4"  class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="Status" class=" form-control-label">Status</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select name="Status" id="select" class="form-control">
                                <option value=" ">Please select</option>
                                <option value="Courier Pickup">Courier Pickup</option>
                                <option value="Shipped">Shipped</option>
                                <option value="Transist">Transist</option>
                                <option value="Arrived At Destination">Arrived At Destination</option>
                                <option value="Out Of Delivery">Out Of Delivery</option>
                                <option value="Deliverd">Deliverd</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="modal-footer update-btn">
                    <button type="button" class="btn btn-secondary" style="background: #6a3232;" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">Confirm</button>
                </div>
            </form>

        </div>
    </div>
</div>
<!-- end modal medium -->

<script>
    window.onload = function () {
        getCourierHistoryList();
    };

    function updateStatus(formElement) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>registerCourierStatus',
            data: $(formElement).serialize(),
            success: function (res) {
                console.log(res);
                if (res === "0") {
                    swal({
                        title: "Congratulation",
                        text: "Status has been Create",
                        icon: "success"
                    }).then(function () {
                        window.location.reload();
                    });
                } else if (res === "1") {
                    swal({
                        title: "Congratulation",
                        text: "Status has been Update",
                        icon: "success"
                    }).then(function () {
                        window.location.reload();
                    });
                }
                else{
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


    function openconfirmDialogue(id) {
        swal({
            title: "Are you sure?",
            text: "Once deleted, you will not be able to recover this imaginary file!",
            icon: "warning",
            buttons: true,
            dangerMode: true,
        })
                .then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            type: 'POST',
                            url: '<?php echo base_url(); ?>deleteCourierStatus?courierHistoryId=' + id,
                            success: function (res) {
                                if (res.trim() === "1") {
                                    $("#myModal").css("display", "none");
                                    $("#id").val("");
                                    window.location.reload();
                                } else {
                                    alert("Failed !!!");
                                }
                            }
                        });
                    } else {
                        swal("status is safe!");
                    }
                });
    }


    function getCourierHistoryList() {
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url(); ?>getAllCourierHistoryList?courierId=' +<?php echo $courierDetails->id; ?>,
            success: function (res) {
                $('.courierHistory-list').html(res);
            }
        })
    }

    function courierHistoryDetails(id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>editCourierHistorydetails?courierHistoryId=' + id,
            success: function (res) {
                console.log(res);
                var data = JSON.parse(res);
                $('#courierHistoryId').val(data.courierHistory.id);
               
                $('#staff-remark').val(data.courierHistory.remark);
                $('#select').val(data.courierHistory.status);
            }
        });
        return false;
    }


    function clearModelData() {
        $('#select').val("");
        $('#id').val("");
        $('#staff-remark').val("");
    }
</script>

