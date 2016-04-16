<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
        <h2>Password Reset</h2>
        <ol class="breadcrumb">
            <li>
                <a href="process/dashboard" class="ajax-link" >Dashboard</a>
            </li>
            <li class="active">
                <strong>Password Reset</strong>
            </li>
        </ol>
    </div>
</div>
<div class="wrapper wrapper-content">
    <div class="col-lg-6">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <h5>Reset your password</h5>
            </div>
            <div class="ibox-content">
                <form class="form-horizontal ajax-form" method="POST" action="process/reset_password">
                    <div class="form-group"><label class="col-lg-4 control-label">Current Password</label>
                        <div class="col-lg-8">
                        <input type="password" placeholder="Old password" class="form-control input-sm" name="old_pwd" required>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-4 control-label">New Password</label>
                        <div class="col-lg-8">
                        <input type="password" placeholder="New Password" class="form-control input-sm" name="new_pwd" required>
                        </div>
                    </div>
                    <div class="form-group"><label class="col-lg-4 control-label">Confirm Password</label>
                        <div class="col-lg-8">
                        <input type="password" placeholder="Confirm Password" class="form-control input-sm" name="confirm_pwd" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-lg-offset-4 col-lg-8">
                            <button class="btn btn-sm btn-primary" type="submit">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>