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
                                            Add Course
                                        </button>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-3" id="table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Title</th>
                                                    <th>Instructor</th>
                                                    <th>Class</th>
                                                    <th>Description</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $no = 1;
                                                @endphp
                                                @foreach ($courses as $course)
                                                    <tr>
                                                        <td>{{ $no++ }}. </td>
                                                        <td>{{ $course->title }}</td>
                                                        <td>{{ $course->users->name }}</td>
                                                        <td>{{ $course->major->name_major }}</td>
                                                        <td>{{ $course->description }}</td>
                                                        <td>{{ $course->created_at }}</td>
                                                        <td>
                                                            <div class="d-flex justify-content-end">
                                                                <a href="javascript:void(0)" class="btn btn-secondary me-2"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#edit-course-{{ $course->id }}">EDIT</a>
                                                                <form action="{{ route('course.destroy', $course->id) }}"
                                                                    method="POST" style="display: inline;">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="btn btn-light"
                                                                        onclick="return confirm('Are you sure you want to delete this instructor?')">DELETE</button>
                                                                </form>
                                                            </div>
                                                            <div class="d-flex justify-content-center mt-3">
                                                                <a href="javascript:void(0)" class="btn btn-primary me-2"
                                                                    data-bs-toggle="modal"
                                                                    data-bs-target="#edit-course-{{ $course->id }}">DETAIL</a>
                                                            </div>
                                                        </td>
                                                    </tr>

                                                    <!-- MODAL EDIT -->
                                                    <div class="modal fade" id="edit-course-{{ $course->id }}"
                                                        tabindex="-1" aria-hidden="true">
                                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <h5 class="modal-title">Edit Course</h5>
                                                                    <button type="button" class="btn-close"
                                                                        data-bs-dismiss="modal" aria-label="Close"></button>
                                                                </div>
                                                                <div class="modal-body">
                                                                    <form
                                                                        action="{{ route('course.update', $course->id) }}"
                                                                        method="post">
                                                                        @csrf
                                                                        @method('PUT')
                                                                        <div class="row">
                                                                            <div class="col mb-3">
                                                                                <label
                                                                                    for="editClassyName{{ $course->id }}"
                                                                                    class="form-label">Title</label>
                                                                                <input type="text" name="name"
                                                                                    id="editClassName{{ $course->id }}"
                                                                                    class="form-control"
                                                                                    value="{{ $course->name }}" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col mb-3">
                                                                                <label
                                                                                    for="editClassyName{{ $course->id }}"
                                                                                    class="form-label">Files
                                                                                </label>
                                                                                <input type="text" name="email"
                                                                                    id="editClassName{{ $course->id }}"
                                                                                    class="form-control"
                                                                                    value="{{ $course->email }}" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col mb-3">
                                                                                <label
                                                                                    for="editClassyName{{ $course->id }}"
                                                                                    class="form-label"> Phone</label>
                                                                                <input type="text" name="phone"
                                                                                    id="editClassName{{ $course->id }}"
                                                                                    class="form-control"
                                                                                    value="{{ $course->phone }}" />
                                                                            </div>
                                                                        </div>
                                                                        <div class="row">
                                                                            <div class="col mb-3">
                                                                                <label
                                                                                    for="editClassyName{{ $course->id }}"
                                                                                    class="form-label">Address
                                                                                </label>
                                                                                <textarea name="address" id="" cols="30" rows="5" class="form-control">{{ $course->address }}</textarea>
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
                                                <h5 class="modal-title" id="exampleModalLabel1">Add New Course</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('course.store') }}" method="post"
                                                    enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="editClassyName" class="form-label">
                                                                Title</label>
                                                            <input type="text" name="title" id="title"
                                                                class="form-control" placeholder="Input Title" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="editClassyName" class="form-label">File
                                                            </label>
                                                            <input type="file" name="file" id="file"
                                                                class="form-control" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="editClassyName" class="form-label">
                                                                Link Video</label>
                                                            <input type="text" name="link" id="link"
                                                                class="form-control"
                                                                placeholder="Input Link Video (optional)" />
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col mb-3">
                                                            <label for="editClassyName" class="form-label">
                                                                Description
                                                            </label>
                                                            <textarea name="desc" id="" cols="30" rows="5" class="form-control"></textarea>
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
