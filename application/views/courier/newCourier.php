<style>
    .modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1; /* Sit on top */
        padding-top: 100px; /* Location of the box */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgb(0,0,0); /* Fallback color */
        background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
    }

    /* Modal Content */
    .modal-content {
        background-color: #fefefe;
        margin-bottom: 10%;
        margin-left: 40%;
        margin-right: 10%;
        margin-top: 10%;
        padding: 20px;
        border: 1px solid #888;
        width: 310px;
    }
</style>
<div style="display:inline-block;width: 100%">
    <div style="float: left;width: 50%;">
        <label for="status" class="status-filter-label">Status</label>
        <select name="status" id="status" class="form-control status-filter">
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
<div class="table-responsive table--no-card m-b-30">
    <input type="hidden" id="id" name="id" value=""/>
    <table class="table table-borderless table-striped table-earning">
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Refrence Number</th>
                <th>Sender Name</th>
                <th>Recipient Name</th>
                <th>Courier Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody class="courier-data">

        </tbody>
    </table>
</div>
<div id="myModal" class="modal">
    <!-- Modal content -->
    <div class="modal-content">
        Are you sure you want to delete Courier.
        <div class="modal-footer">
            <button type="button" class="btn btn-info" onclick="deleteCourier()" data-dismiss="modal">OK</button>
            <button type="button" class="btn btn-danger" onclick="closeConfirmDialog()" data-dismiss="modal">Close</button>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>

                function openConfirmDialog(id) {
                    $("#myModal").css("display", "block");
                    $("#id").val(id);
                }

                function closeConfirmDialog() {
                    $("#myModal").css("display", "none");
                }

                function deleteCourier() {
                    var id = $("#id").val();
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url(); ?>deleteCourier?courierId=' + id,
                        success: function (res) {
                            if (res.trim() === "1") {
                                $("#myModal").css("display", "none");
                                $("#id").val("");
                                getAllCourierList();
                            } else {
                                alert("Failed !!!");
                            }
                        }
                    });
                }



                window.onload = function () {
                    getAllCourierList();
                };

                $(document).ready(function () {
                    $("#status").change(function () {
                        getCourierListByStatus($("#status").val());
                    });
                });


                function getAllCourierList() {
                    $.ajax({
                        type: 'POST',
                        url: '<?php echo base_url(); ?>getCourierList',
                        data: {'status': $("#status").val()},
                        success: function (res) {
                            $('.courier-data').html(res);
                        }

                    });
                }
                function getCourierListByStatus() {
                    var status = $("#status").val()
                    if (status === " ") {
                        getAllCourierList();
                    } else {
                        $.ajax({
                            type: 'GET',
                            url: '<?php echo base_url(); ?>getCourierListByStatus',
                            data: {'status': $("#status").val()},
                            success: function (res) {
                                $('.courier-data').html(res);
                            }

                        });
                    }

                }
</script>