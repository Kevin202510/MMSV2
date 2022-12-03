<div id="EditProfileModal" class="modal fade" role="dialog">
    <div class="modal-dialog modal-lg">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Profile</h5>
                <button type="button" aria-label="Close" class="close outline-none" data-dismiss="modal">×</button>
            </div>
            <form enctype="multipart/form-data">
                <div class="modal-body">
                    <input type="hidden" name="id" id="id" value="{{\Illuminate\Support\Facades\Auth::user()->id}}">
                    <input type="hidden" name="role_id" id="role_id" value="{{\Illuminate\Support\Facades\Auth::user()->role_id}}">
                    <input type="hidden" name="isApproved" id="isApproved" value="{{\Illuminate\Support\Facades\Auth::user()->isApproved}}">
                    @csrf
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Firstname</label><span class="required">*</span>
                            <input type="hidden" id="pfImages" value="{{\Illuminate\Support\Facades\Auth::user()->profile}}">
                            <input type="text" name="fname" id="fname" value="{{\Illuminate\Support\Facades\Auth::user()->fname}}" class="form-control" required autofocus tabindex="1">
                        </div>
                        <div class="form-group col-sm-6 d-flex">
                            <div class="col-sm-4 col-md-6 pl-0 form-group">
                                <label>Profile Image:</label>
                                <br>
                                <label
                                        class="image__file-upload btn btn-primary text-white"
                                        tabindex="2"> Choose
                                    <input type="file" name="pfImage" id="pfImage" class="d-none" >
                                </label>
                            </div>
                            <div class="col-sm-3 preview-image-video-container float-right mt-1">
                                <img id='edit_preview_photo' class="img-thumbnail user-img user-profile-img profilePicture"
                                     src="{{asset('profiles/logo.png')}}"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>Lastname</label><span class="required">*</span>
                            <input type="text" name="lname" id="lname" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->lname}}" required autofocus tabindex="1">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Address</label><span class="required">*</span>
                            <input type="text" name="address" id="address" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->address}}" required autofocus tabindex="1">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Contact</label><span class="required">*</span>
                            <input type="text" name="contact" id="contact" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->contact}}" required autofocus tabindex="1">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Username</label><span class="required">*</span>
                            <input type="text" name="username" id="username" class="form-control" value="{{\Illuminate\Support\Facades\Auth::user()->username}}" required autofocus tabindex="1">
                        </div>
                    </div>
                    <div class="text-right">
                        <button type="submit" class="btn btn-primary" id="btnPrEditSave" tabindex="5">Save</button>
                        <button type="button" class="btn btn-light ml-1 edit-cancel-margin margin-left-5"
                                data-dismiss="modal">Cancel
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

