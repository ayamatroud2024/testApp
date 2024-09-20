<x-admin-layouts.admin-app>
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li><h5 class="bc-title">{{ __('Edit Task') }}</h5></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Home </a>
                </li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{  __('Edit Task') }} </a></li>
            </ol>
            <a class="text-primary fs-13" href="{{ route('admin.tasks.index') }}" >{{  __('Tasks') }}</a>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="offcanvas-body">
                                <div class="container-fluid">
                                <h4 class="heading mb-0"> {{ __('Edit Task') }}</h4>

                            <form method="POST" action="{{ route("admin.tasks.update",$task->id) }}" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <input type="hidden" name="id" value="{{ $task->id }}">
                                    <div class="col-xl-8 mb-3">
                                        <label for="ckeditor" class="form-label">Tiltle<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="exampleFormControlInputfirst" name="title" value="{{ old('title',$task->title) }}">

                                        @error('title')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-xl-8 mb-3">
                                        <label for="ckeditor" class="form-label">Description<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="exampleFormControlInputfirst" name="title" value="{{ old('description',$task->description) }}">

                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>



                                    <div class="col-xl-8 mb-3">
                                        <label class="form-label">Status<span class="text-danger">*</span></label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="inactive" type="radio" name="status" value="pending" @checked(old('status',$task->status)=='pending')>
                                            <label class="form-check-label" for="inactive">
                                                Pending
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="active" type="radio" name="status" value="in-progress" @checked(old('status',$task->status)=="in-progress")>
                                            <label class="form-check-label" for="active">
                                                In-progress
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="active" type="radio" name="status" value="completed" @checked(old('status',$task->status)=="completed")>
                                            <label class="form-check-label" for="active">
                                                Completed
                                            </label>
                                        </div>
                                        @error('status')
                                        <div class="text-danger">{{ $message }}</div>
                                         @enderror
                                    </div>


                                    <div class="col-xl-8 mb-3">
                                        <input type="submit" class="btn btn-primary me-1" value='Update'>
                                    </div>


                                </div>

                            </form>

                        </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--**********************************
        Content body end
    ***********************************-->

</x-admin-layouts.admin-app>
