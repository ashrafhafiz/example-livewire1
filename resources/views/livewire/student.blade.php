<div>
    @include('livewire.studentmodal');
    <!-- Button trigger modal -->
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                @if (session()->has('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        Student has been created successfully.
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card">
                    <div class="card-header d-flex flex-row justify-content-between align-items-center py-4">
                        <h4>Student CRUD with Bootstrap Modal</h4>
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Add New Student
                        </button>
                    </div>
                    <div class="card-body">
                        Table of Contents
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
