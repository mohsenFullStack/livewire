<div>
    @include('livewire.create')
    @include('livewire.update')
    <section class="container-fluid p-0">
        <style>
            nav svg{
                max-height: 20px;
            }
        </style>
        <section class="row m-0">
            <section class="col-8 offset-2">
                @if (session('message'))
                    <section class="alert alert-success text-center mt-3">{{session('message')}}</section>
                @endif
                @if (session('update'))
                    <section class="alert alert-warning text-center mt-3">{{session('update')}}</section>
                @endif
                @if (session('delete'))
                    <section class="alert alert-danger text-center mt-3">{{session('delete')}}</section>
                @endif
                <section class="card-header">
                    <h1>All Students
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#addstudentModal">
                            Add New Student
                        </button>
                    </h1>
                    <input type="text" class="form-control" placeholder="Search..." wire:model="searchTerm"/>
                    <!-- Button trigger modal -->


                </section>
                <table class="table table-dark table-hover">
                    <tr>
                        <td>firstname</td>
                        <td>lastname</td>
                        <td>email</td>
                        <td>phone</td>

                        <td>action</td>
                    </tr>
                    @foreach ($students as $item)
                        <tr>
                            <td>{{$item->firstname}}</td>
                            <td>{{$item->lastname}}</td>
                            <td>{{$item->email}}</td>
                            <td>{{$item->phone}}</td>

                            <td>
                                <button type="button" class="btn btn-info" data-toggle="modal"
                                        data-target="#updatestudentModal" wire:click.prevent="edit({{$item->id}})">edit
                                </button>
                                <button type="button" class="btn btn-danger" wire:click.prevent="delete({{$item->id}})">
                                    delete
                                </button>
                            </td>
                        </tr>
                    @endforeach
                </table>
                    <section class="d-flex justify-content-center align-center">
                        {{$students->links()}}
                    </section>
            </section>
        </section>
    </section>
</div>
