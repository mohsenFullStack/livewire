<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addstudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form wire:submit.prevent="submitform">
                    <div class="form-group">
                        <label for="firstname">firstname</label>
                        <input type="text" name="firstname" class="form-control" id="firstname" wire:model="firstname">
                    </div>
                    @error('firstname')
                    <section class="alert alert-danger">{{$message}}</section>
                    @enderror
                    <div class="form-group">
                        <label for="lastname">lastname</label>
                        <input type="text" name="lastname" class="form-control" id="lastname" wire:model="lastname">
                    </div>
                    @error('lastname')
                    <section class="alert alert-danger">{{$message}}</section>
                    @enderror
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" name="email" class="form-control" id="email" wire:model="email">
                    </div>
                    @error('email')
                    <section class="alert alert-danger">{{$message}}</section>
                    @enderror
                    <div class="form-group">
                        <label for="phone">phone</label>
                        <input type="text" name="phone" class="form-control" id="phone" wire:model="phone">
                    </div>
                    @error('phone')
                    <section class="alert alert-danger">{{$message}}</section>
                    @enderror

                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" wire:click.prevent="store()">Add Student</button>
            </div>
        </div>
    </div>
</div>
