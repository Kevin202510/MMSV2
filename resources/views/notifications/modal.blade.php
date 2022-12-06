<div class="modal fade" id="modal-main" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="modal-title"></h4>
                <div class="pull-left"><button type="button" class="close" data-dismiss="modal"><span class="fa fa-times"></button></div>
            </div>
            <div class="modal-body">
                <form id="set-Model" class="form-horizontal">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="input-group mb-3">
                        <span class="input-group-text">Display Name</span>
                        <input type="text" aria-label="Description" id="display_name" name="display_name" class="form-control">
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary form-control" id="engrave" value="create-new">Save</button>
            </div>
        </div>
    </div>
</div>