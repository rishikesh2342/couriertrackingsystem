<div class="table-responsive table--no-card m-b-30">
    <table class="table table-borderless table-striped table-earning">
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Branch Name</th>
                <th>Staff Name</th>
                <th>Staff Number</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody class="staff-List">

        </tbody>
    </table>
</div>
<script>

    window.onload = function () {
        getListOfStaff();
    }
    function getListOfStaff() {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>getAllStaffList',
            success: function (res) {
                $('.staff-List').html(res);
            }
        })
    }

    function deleteStaff(id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>deleteStaff?staffId=' + id,
            success: function (res) {
                if (res.trim() === "1") {
                    window.location.reload();
                } else {
                    alert("Failed !!!");
                }
            }
        });
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
                        deleteStaff(id);
                    } else {
                        swal("staff is safe!");
                    }
                });
    }
</script>