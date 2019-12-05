<div class="card">
    <div class="card-header">
        <strong>Horizontal</strong> Form
    </div>
    <div class="card-body card-block">
        <form action="" method="post" class="form-horizontal">
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="from-date" class=" form-control-label">From Date</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="date" id="fromDate" name="fromDate"  class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label for="to-date" class=" form-control-label">To Date</label>
                </div>
                <div class="col-12 col-md-9">
                    <input type="date" id="Todate" name="Todate" class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col col-md-3">
                    <label class=" form-control-label">Inline Radios</label>
                </div>
                <div class="col col-md-9">
                    <div class="form-check-inline form-check">
                        <label for="inline-radio1" class="form-check-label ">
                            <input type="radio" id="inline-radio1" name="inline-radios" value="option1" class="form-check-input">Date Wise
                        </label>
                        <label style="margin-left: 10px;" for="inline-radio2" class="form-check-label ">
                            <input type="radio" id="inline-radio2" name="inline-radios" value="option2" class="form-check-input">Month Wise
                        </label>
                        
                    </div>
                </div>
            </div>
        </form>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-primary btn-sm">
            <i class="fa fa-dot-circle-o"></i> Submit
        </button>
        <button type="reset" class="btn btn-danger btn-sm">
            <i class="fa fa-ban"></i> Reset
        </button>
    </div>
</div>