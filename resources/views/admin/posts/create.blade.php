<x-admin-layouts.admin-app>
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li><h5 class="bc-title">{{ __('Add Post') }}</h5></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Home </a>
                </li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{  __('Add Post') }} </a></li>
            </ol>
            <a class="text-primary fs-13" href="{{ route('admin.posts.index') }}" >{{  __('Posts') }}</a>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="offcanvas-body">
                                <div class="container-fluid">
                                <h4 class="heading mb-0"> {{ __('Add Post') }}</h4>

                            <form method="POST" action="{{ route('admin.posts.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    {{-- <div class="col-xl-8 mb-3">
                                        <label for="ckeditor" class="form-label">Address-En<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="exampleFormControlInputfirst" name="address_en" value="{{ old('address_en') }}">

                                        @error('address_en')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div> --}}

                                    <div class="col-xl-8 mb-3">
                                        <label for="ckeditor" class="form-label">Name<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="exampleFormControlInputfirst" name="name" value="{{ old('name') }}">

                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-xl-8 mb-3">
                                        <label class="form-label">Gender<span class="text-danger">*</span></label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="male" type="radio" name="gender" value="0" @checked(old('gender')==0)>
                                            <label class="form-check-label" for="male">
                                                Male
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="female" type="radio" name="gender" value="1" @checked(old('gender')==1)>
                                            <label class="form-check-label" for="female">
                                                Female
                                            </label>
                                        </div>
                                        @error('gender')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-xl-8 mb-3">
                                        <label for="ckeditor" class="form-label">Address<span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" id="exampleFormControlInputfirst" name="address" value="{{ old('address') }}">

                                        @error('address')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    {{-- <div class="col-xl-8 mb-3">
                                        <label class="form-label">Description-En<span class="text-danger">*</span></label>
                                        <textarea class="form-txtarea form-control" rows="8" name="description_en">{{ old('description_en') }}</textarea>
                                        @error('description_en')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div> --}}

                                    <div class="col-xl-8 mb-3">
                                        <label for="ckeditor1" class="form-label">Description<span class="text-danger">*</span></label>
                                        {{-- <div class="card-body custom-ekeditor"> --}}
                                        <textarea id="ckeditor1" class="form-txtarea form-control" rows="8" name="description">{{ old('description') }}</textarea>
                                        {{-- </div> --}}
                                        @error('description')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-xl-8 mb-3" id="toField">
                                        <label class="form-label">Event Date</label>
                                        <input type="date" class="form-control" name="event_date" value="{{ old('event_date') }}">
                                        @error('event_date')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>



                                    <div class="col-xl-8 mb-3">
                                        <label class="form-label">Type<span class="text-danger">*</span></label>
                                        <div class="form-check">
                                            <input class="form-check-input" id="missing" type="radio" name="type" value="0" @checked(old('type')==0)>
                                            <label class="form-check-label" for="missing">
                                                Missing
                                            </label>
                                        </div>
                                        <div class="form-check">
                                            <input class="form-check-input" id="found" type="radio" name="type" value="1" @checked(old('type')==1)>
                                            <label class="form-check-label" for="found">
                                                Found
                                            </label>
                                        </div>
                                        @error('type')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-xl-8 mb-3" id="minField">
                                        <label class="form-label">Age</label>
                                        <input type="date" class="form-control" name="age" value="{{ old('age') }}">
                                        @error('age')
                                        <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>











}


<div class="col-xl-8 mb-3">
    <label class="form-label">Status<span class="text-danger">*</span></label>
    <div class="form-check">
        <input class="form-check-input" id="notsuggested" type="radio" name="status" value="0" @checked(old('status')==0)>
        <label class="form-check-label" for="notsuggested">
            InActive
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" id="suggested" type="radio" name="status" value="1" @checked(old('status')==1)>
        <label class="form-check-label" for="suggested">
            Active
        </label>
    </div>
    @error('status')
    <div class="text-danger">{{ $message }}</div>
     @enderror
</div>

<div class="col-xl-8 mb-3">
    <label class="form-label">Show<span class="text-danger">*</span></label>
    <div class="form-check">
        <input class="form-check-input" id="hidden" type="radio" name="show" value="0" @checked(old('show')==0)>
        <label class="form-check-label" for="hidden">
          Hidden
        </label>
    </div>
    <div class="form-check">
        <input class="form-check-input" id="visible" type="radio" name="show" value="1" @checked(old('show')==1)>
        <label class="form-check-label" for="visible">
            Visible
        </label>
    </div>
    @error('show')
    <div class="text-danger">{{ $message }}</div>
     @enderror
</div>


<div class="col-xl-8 mb-3">
    <label class="form-label">Order</label>
    <input type="text" class="form-control" name="order" value="{{ old('order') }}">
    @error('order')
        <div class="text-danger">{{ $message }}</div>
    @enderror
</div>





                                    <div class="col-xl-8 mb-3">
                                        <label class="form-label">Lat</label>
                                        <input type="text" class="form-control" name="lat" value="{{ old('lat') }}">
                                        @error('lat')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-xl-8 mb-3">
                                        <label class="form-label">Long</label>
                                        <input type="text" class="form-control" name="long" value="{{ old('long') }}">
                                        @error('long')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>





                                    <div class="col-xl-8 mb-3">
                                        <label class="form-label">Reward</label>
                                        <input type="text" class="form-control" name="reward" value="{{ old('reward') }}">
                                        @error('reward')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>


                                    <div class="col-xl-8 mb-3">
                                        <label class="form-label">Area<span class="text-danger">*</span></label>
                                        <select class="default-select form-control wide mb-3" name="area_id" tabindex="null">
                                            <option selected disabled>Select Area</option>
                                            @foreach ($areas as $area)
                                                <option value="{{ $area->id }}" @selected(old('area_id')==$area->id)>{!! $area->getTranslation('name', 'ar') !!}</option>
                                            @endforeach
										</select>
                                        @error('area_id')
                                            <div class="text-danger">{{ $message }}</div>
                                         @enderror
                                    </div>



                                    <div class="col-xl-8 mb-3">
                                        <label class="form-label">User<span class="text-danger">*</span></label>
                                        <select class="default-select form-control wide mb-3" name="user_id" tabindex="null">
                                            <option selected disabled>Select User</option>
                                            @foreach ($users as $user)
                                                <option value="{{ $user->id }}" @selected(old('user_id')==$user->id)>{{ $user->name }}</option>
                                            @endforeach
										</select>
                                        @error('user_id')
                                            <div class="text-danger">{{ $message }}</div>
                                         @enderror
                                    </div>



                               <div class="col-xl-8 mb-3">
                                        <label for="image" class="form-label">Image<span class="text-danger">*</span></label>
                                        <input class="form-control" type="file" name="image" id="image">
                                        @error('image')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>





                              <div class="col-xl-8 mb-3">
                                        <input type="submit" class="btn btn-primary me-1" value='Save'>
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



    <script>
        // Get references to the rent and sale radio buttons
        const rentRadio = document.getElementById('rent');
        const saleRadio = document.getElementById('sale');

        // Get references to the fields
        const minField = document.getElementById('minField');
        const maxField = document.getElementById('maxField');
        const periodField = document.getElementById('periodField');
        const fromField = document.getElementById('fromField');
        const toField = document.getElementById('toField');
        const periodRadios = document.getElementsByName('period');

        // Function to show or hide the fields based on the selected radio button
        function toggleFields() {
            if (rentRadio.checked) {
                minField.style.display = 'block';
                maxField.style.display = 'block';
                periodField.style.display = 'block';
                fromField.style.display = 'block';
                toField.style.display = 'block';
                for (let i = 0; i < periodRadios.length; i++) {
                    periodRadios[i].disabled = false;
                }
            } else {
                minField.style.display = 'none';
                maxField.style.display = 'none';
                periodField.style.display = 'none';
                fromField.style.display = 'none';
                toField.style.display = 'none';
                for (let i = 0; i < periodRadios.length; i++) {
                    periodRadios[i].disabled = true;
                }
            }
        }

        // Add event listeners to theradio buttons to toggle the fields
        rentRadio.addEventListener('change', toggleFields);
        saleRadio.addEventListener('change', toggleFields);

        // Call toggleFields() initially to set the initial state
        toggleFields();



</script>


    <!--**********************************
        Content body end
    ***********************************-->
    {{-- @push('javasc')
    <script>
    ClassicEditor
    .create( document.querySelector( '#ckeditor1'),{language: 'en'} )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
    .create( document.querySelector( '#ckeditor2'),{language: 'fr'} )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
    .create( document.querySelector( '#ckeditor3'),{language: 'es'} )
        .catch( error => {
            console.error( error );
        } );
    ClassicEditor
    .create( document.querySelector( '#ckeditor4'),{language: 'ru'} )
        .catch( error => {
            console.error( error );
        } );
    </script>
    @endpush --}}
</x-admin-layouts.admin-app>
