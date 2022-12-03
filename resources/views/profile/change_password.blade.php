<div id="changePasswordModal" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Change Password</h5>
                <button type="button" aria-label="Close" class="close outline-none" data-dismiss="modal">×</button>
            </div>
            <form id='changePasswordForm'>
                <input type="hidden" name="id" id="ids" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                <input type="hidden" name="password" id="password" value="{{\Illuminate\Support\Facades\Auth::user()->password}}">
            <div class="modal-body">
                    @csrf
                <div class="row">
                    <div class="form-group col-sm-12">
                        <label>Current Password:</label><span
                                class="required confirm-pwd"></span><span class="required">*</span>
                        <div class="input-group">
                            <input class="form-control input-group__addon" id="currentpassword" name="currentpassword" type="password" required>
                            <div class="input-group-append input-group__icon">
                                <span class="input-group-text" id="showhidepass1"><i class="fa fa-eye-slash"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label>New Password:</label><span
                                class="required confirm-pwd"></span><span class="required">*</span>
                        <div class="input-group">
                            <input class="form-control input-group__addon" id="newPassword" type="password"
                                   name="newPassword" required>
                            <div class="input-group-append input-group__icon">
                                <span class="input-group-text" id="showhidepass2"><i class="fa fa-eye-slash"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group col-sm-12">
                        <label>Confirm Password:</label><span
                                class="required confirm-pwd"></span><span class="required">*</span>
                        <div class="input-group">
                            <input class="form-control input-group__addon" id="confirmPassword" type="password"
                                   name="confirmPassword" required>
                            <div class="input-group-append input-group__icon">
                                <span class="input-group-text" id="showhidepass3"><i class="fa fa-eye-slash"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-right">
                    <button type="button" class="btn btn-primary" id="btnPrPasswordEditSave" data-loading-text="<span class='spinner-border spinner-border-sm'></span> Processing...">Save</button>
                    <button type="button" class="btn btn-light ml-1" data-dismiss="modal">Cancel
                    </button>
                </div>
            </div>
            </form>
        </div>
    </div>
</div>
