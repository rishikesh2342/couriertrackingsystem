<div class="table-responsive table--no-card m-b-30">
    <table class="table table-borderless table-striped table-earning">
        <input type="hidden" id="id" name="id" value=""/>
        <thead>
            <tr>
                <th>Sr.No</th>
                <th>Branch Name</th>
                <th>Branch Contact Number</th>
                <th>Branch Email</th>
                <th>Action</th>

            </tr>
        </thead>
        <tbody class="branch-List">
            <?php $count = 1;  ?>
            <?php foreach ($BranchList as $Branch) { ?>
                <tr>
                    <td><?php echo $count; ?></td>
                    <td><?php echo $Branch->branch_name; ?></td>
                    <td><?php echo $Branch->branch_contactnumber; ?></td>
                    <td><?php echo $Branch->branch_email; ?></td>
                    <td><a type="button" href="<?php echo base_url(); ?>updateBranch?branchId=<?php echo $Branch->branch_id; ?>" class="btn bg-teal btn-circle-lg waves-effect waves-circle waves-float"  style="margin: 0px 5px 0px 5px;"><i class="zmdi zmdi-edit"></i></a> 
                        <a type="button" onclick="openconfirmDialogue(<?php echo $Branch->branch_id; ?>)" href="#" class="btn btn-danger btn-circle-lg waves-effect waves-circle waves-float"><i class="zmdi zmdi-delete"></i></a></td></tr>
            <?php $count++ ?>
            <?php } ?>
        </tbody>
    </table>
    <center>
        <ul class="pagination">
            <!--                                           Show pagination links -->
            <?php
            foreach ($links as $link) {

                echo "<li>" . $link . "</li>";
            }
            ?>
        </ul>
    </center>
</div>

<script>

    function deleteBranch(id) {
        $.ajax({
            type: 'POST',
            url: '<?php echo base_url(); ?>deleteBranch?branchId=' + id,
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
                        deleteBranch(id);
                    } else {
                        swal("Branch is safe!");
                    }
                });
    }
</script>

