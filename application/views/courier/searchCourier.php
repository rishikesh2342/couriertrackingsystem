<div class="card">
    <div class="card-header">
        <strong>Search By Refrence Number</strong>
    </div>
    <div class="card-body card-block">
        <form method="POST" onsubmit="" id="RegisterForm"  enctype="multipart/form-data" accept-charset="utf-8" class="form-horizontal">            <div class="form-group">
                <label for="inputIsValid" class=" form-control-label">Refrence Number</label>
                <input type="text"  id="searchbox" class="form-control text-truncate" class="form-control">
            </div>
            <div class="form-actions form-group">
                <button  type="button" id="searchbtn" class="btn btn-primary btn-sm">Submit</button>
            </div>
        </form>
    </div>
    <div class="table-responsive table--no-card m-b-30">
        <table class="table table-borderless table-striped table-earning">
            <thead>
                <tr>
                    <th>Sr.No</th>
                    <th>Refrence Number</th>
                    <th>Courier Description</th>
                    <th>Courier Price</th>
                    <th>Courier Date</th>
                </tr>
            </thead>
            <tbody class="courier-data">

            </tbody>
        </table>
    </div>
</div>
<script>
    $('#searchbtn').on('click', function () {
        var search = $('#searchbox').val();
        console.log(search);
        $.ajax({
            type: 'GET',
            url: '<?php echo base_url(); ?>getCourierListBySearch',
            data: {'searchbox': search},
            success: function (res) {
                $('.courier-data').html(res);
            }
        });
    });

</script>
