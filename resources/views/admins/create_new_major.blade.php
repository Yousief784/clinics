@extends('layouts.default_admins')

@section('content')

    @if (session('status'))
        <div class="alert alert-danger mx-5">
            {{ session('status') }}
        </div>
    @endif

    <div class="mx-5">
        <form action="{{ route('admin.store_new_major') }}" method="post">
            @csrf
            <div>
                <x-label for="major" :value="__('Major Title')" />

                <x-input id="major" class="d-block mt-1 w-fluid form-control" type="text" name="major" :value="old('major')" required autofocus />
            </div>

            <div class="d-grid">
                <button type="submit" class="ml-4 mb-5 mt-4 btn btn-danger btn-lg">{{ __('SAVE') }}</button>
            </div>
        </form>
    </div><!-- form add new major -->
    <div class="mx-5 mt-4">
        @php($i=1)
        <table class="table table-dark table-hover">
            <thead class="">
            <th class="text-white">#</th>
            <th class="text-white">Major Title</th>
            <th class="text-white">Edit</th>
            <th class="text-white">Delete</th>
            </thead>

            @foreach($all_majors as $major)
                <tbody>
                    <td class="text-white">{{ $i }}</td>
                    <td class="text-white">{{ $major->major }}</td>
                    <td class="text-white"><button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#edit{{ $major->id }}">Edit</button></td>
                    <td class="text-white"><button class="btn btn-danger text-white" data-bs-toggle="modal" data-bs-target="#delete{{ $major->id }}">Delete</button></td>
                </tbody>
                @php($i++)

            <!-- Start Modal Edit -->
                <div class="modal fade" id="edit{{ $major->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <form action="{{ route('admin.update_major', ['major_id' => $major->id]) }}" method="post">
                            @csrf
                            @method('put')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Major Title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <label>Major</label>
                                    <input type="text" name="major" class="form-control" value="{{ $major->major }}">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Modal Edit -->

                <!-- Start Modal Edit -->
                <div class="modal fade" id="delete{{ $major->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <form action="{{ route('admin.destroy_major', ['major_id' => $major->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Edit Major Title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <label>Major</label>
                                    <input type="text" name="major" class="form-control" value="{{ $major->major }}" disabled>
                                </div>
                                <p class="alert alert-danger">Are you Sure??</p>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- End Modal Edit -->
            @endforeach
        </table>
    </div>
@endsection
