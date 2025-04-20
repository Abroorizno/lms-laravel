@extends('layouts.main')
{{-- @section('title', 'Data Categories') --}}

@section('content')
    <section class="section">
        <div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                    <div class="card">
                        <div class="d-flex align-items-end row">
                            <div class="col-sm-12">
                                <div class="card-header">
                                    <div
                                        class="d-flex justify-content-between align-items-start flex-column flex-sm-row mt-3">
                                        <h5 class="card-title text-primary">{{ $title ?? '' }}</h5>
                                        <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                            data-bs-target="#add-user">
                                            Add Users
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-3" id="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>NIP</th>
                                                    <th>Name Instructor</th>
                                                    <th>Class on Hold</th>
                                                    <th>Email</th>
                                                    <th>Phone Number</th>
                                                    <th>Address</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($users as $user)
                                                    <tr>
                                                        <td>{{ $no++ }}. </td>
                                                        <td>{{ $user->nip }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->major->name_major ?? 'Admin' }}</td>
                                                        <td>{{ $user->email }}</td>
                                                        <td>{{ $user->phone }}</td>
                                                        <td>{{ $user->address }}</td>
                                                        <td>{{ $user->created_at }}</td>
                                                        <td>
                                                            <a href="javascript:void(0)" class="btn btn-secondary"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#edit-users-{{ $user->id }}">EDIT</a>
                                                            <form action="{{ route('users.destroy', $user->id) }}"
                                                                method="POST" style="display: inline;">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-light"
                                                                    onclick="return confirm('Are you sure you want to delete this instructor?')">DELETE</button>
                                                            </form>
                                                        </td>
                                                    </tr>

                                                    <!-- MODAL EDIT -->
                                                    <div class="modal fade" id="edit-users-{{ $user->id }}"
                                                        tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Edit Instructor</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form action="{{ route('users.update', $user->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="col mb-3">
                                                                            <label for="nameBasic" class="form-label">Class
                                                                                on Hold</label>
                                                                            <select name="class" id="class"
                                                                                class="form-control">
                                                                                <option value="#" disabled selected>
                                                                                    Select Category</option>
                                                                                @foreach ($major as $majors)
                                                                                    <option
                                                                                        {{ $user->class_id == $majors->id ? 'selected' : '' }}
                                                                                        value="{{ $majors->id }}">
                                                                                        {{ $majors->name_major }}</option>
                                                                                @endforeach
                                                                            </select>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col mb-3">
                                                                                <label
                                                                                    for="editClassyName{{ $user->id }}"
                                                                                    class="form-label">Instructor
                                                                                    Name</label>
                                                                                <input type="text" name="instructor_name"
                                                                                    id="editClassName{{ $user->id }}"
                                                                                    class="form-control"
                                                                                    value="{{ $user->name }}" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col mb-3">
                                                                                <label
                                                                                    for="editClassyName{{ $user->id }}"
                                                                                    class="form-label">Email
                                                                                    Instructor</label>
                                                                                <input type="text"
                                                                                    name="instructor_email"
                                                                                    id="editClassName{{ $user->id }}"
                                                                                    class="form-control"
                                                                                    value="{{ $user->email }}" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col mb-3">
                                                                                <label
                                                                                    for="editClassyName{{ $user->id }}"
                                                                                    class="form-label">Instructor
                                                                                    Phone</label>
                                                                                <input type="text"
                                                                                    name="instructor_phone"
                                                                                    id="editClassName{{ $user->id }}"
                                                                                    class="form-control"
                                                                                    value="{{ $user->phone }}" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col mb-3">
                                                                                <label
                                                                                    for="editClassyName{{ $user->id }}"
                                                                                    class="form-label">Instructor Address
                                                                                </label>
                                                                                <textarea name="instructor_address" id="" cols="30" rows="5" class="form-control">{{ $user->address }}</textarea>
                                                                            </div>
                                                                        </div>
                                                                        <div class="modal-footer">
                                                                            <button type="submit"
                                                                                class="btn btn-primary">Save</button>
                                                                            <button type="button"
                                                                                class="btn btn-outline-secondary"
                                                                                data-bs-dismiss="modal">Close</button>
                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                {{-- MODAL --}}
                                <div class="modal fade" id="add-user" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel1">Add New User</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('users.store') }}" method="post">
                                                    @csrf
                                                    <div class="col mb-3">
                                                        <label for="nameBasic" class="form-label">Class on Hold</label>
                                                        <select name="class" id="class" class="form-control">
                                                            <option value="#" disabled selected>Select Category
                                                            </option>
                                                            @foreach ($major as $majors)
                                                                <option value="{{ $majors->id }}">
                                                                    {{ $majors->name_major }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="col mb-3">
                                                        <label for="nameBasic" class="form-label">Levels</label>
                                                        <select name="level" id="level" class="form-control">
                                                            <option value="#" disabled selected>Select Category
                                                            </option>
                                                            @foreach ($level as $levels)
                                                                <option value="{{ $levels->id }}">
                                                                    {{ $levels->name_levels }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="editClassyName" class="form-label">
                                                                Name</label>
                                                            <input type="text" name="name" id="mame"
                                                                class="form-control" placeholder="Input User Name" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="editClassyName" class="form-label">Email
                                                            </label>
                                                            <input type="text" name="email" id="email"
                                                                class="form-control" placeholder="Input User Email" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="editClassyName" class="form-label">
                                                                Phone</label>
                                                            <input type="number" name="phone" id="phone"
                                                                class="form-control" placeholder="Input User Phone" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="editClassyName" class="form-label">
                                                                Address
                                                            </label>
                                                            <textarea name="address" id="" cols="30" rows="5" class="form-control"></textarea>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Save</button>
                                                <button type="button" class="btn btn-outline-secondary"
                                                    data-bs-dismiss="modal">
                                                    Close
                                                </button>
                                            </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Transactions -->
            </div>
        </div>
    </section>
@endsection
