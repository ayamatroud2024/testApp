<x-admin-layouts.admin-app>
    <!--**********************************
        Content body start
    ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li><h5 class="bc-title">{{ $post->id }}</h5></li>
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">
                    <svg width="17" height="17" viewBox="0 0 17 17" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    Home </a>
                </li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $post->id }} </a></li>
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
                                <h4 class="heading mb-5"> {{ $post->id }}</h4>

                                    <p class="mb-3"><strong>Id : </strong> {{  $post->id  }}</p>
                                    <p class="mb-3"><strong>Name : </strong> {{ $post->name }}</p>
                                    <p class="mb-3"><strong>Age : </strong> {{ $post->age }}</p>
                                    <p class="mb-3"><strong>Gender :</strong> {{ $post->gender == 1? 'Female' : 'Male' }}</p>
                                    {{-- <p class="mb-3"><strong>Address-En : </strong> {{ $partner->getTranslation('address', 'en') }}</p> --}}
                                    <p class="mb-3"><strong>Address : </strong> {{ $post->address }}</p>
                                    {{-- <p class="mb-3"><strong>Description-En : </strong> {{ $partner->getTranslation('description', 'en') }}</p> --}}
                                    <p class="mb-3"><strong>Description : </strong> {{ $post->description }}</p>
                                    <p class="mb-3"><strong>Event Date : </strong> {{ $post->event_date }}</p>

                                    <p class="mb-3"><strong>Type :</strong> {{ $post->type == 1? 'Found' : 'Missing' }}</p>
                                    <p class="mb-3"><strong>Status :</strong> {{ $post->status == 1? 'Active' : 'InActive' }}</p>
                                    <p class="mb-3"><strong>Show :</strong> {{ $post->show == 1? 'Visible' : 'Hidden' }}</p>
                                    <p class="mb-3"><strong>Order : </strong> {{ $post->order }}</p>
                                    <p class="mb-3"><strong>Space :</strong> {{ $post->reward }}</p>




                                    <p class="mb-3"><strong>Lat :</strong> {{ $post?->lat}}</p>
                                    <p class="mb-3"><strong> Long : </strong> {{ $post->long }}</p>





                                    <p class="mb-3"><strong>Created At :</strong> {{ $post?->created_at }}</p>
                                    <img class="card-img-bottom img-thumbnail mb-3" style="width: 500px" src="{{ asset( $post->image ) }}" alt="{{ $post->id }}">

                                    <p class="mb-3"><strong>Area :</strong> {!! $post->area->getTranslation('name', 'ar') !!}</p>
                                    <p class="mb-3"><strong>User :</strong> {{ $post?->user?->name }}</p>



                        </div>

                        </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-xl-12">
                    <div class="card">
                        <div class="card-body p-0">
                            <div class="offcanvas-body">
                                <div class="container-fluid">
                                    <x-admin-layouts.alerts />
                                    <div class="table-responsive active-projects manage-client">
                                        <div class="tbl-caption">
                                            <h4 class="heading mb-0"> {{ __('Images') }}</h4>
                                        </div>
                                        <div class="tab-content" id="myTabContent">
                                            <div class="tab-pane fade show active" id="Preview" role="tabpanel"
                                                aria-labelledby="home-tab">
                                                <div class="card-body pt-0">
                                                    <div class="table-responsive">
                                                        <table id="example" class="display table"
                                                            style="min-width: 845px">
                                                            <thead>
                                                                {{-- <tr>


                                                                    <th>Image</th>



                                                                </tr> --}}
                                                            </thead>
                                                            <tbody>
                                                                @forelse ($images as $image)
                                                                    <tr>
                                                                        <img class="card-img-bottom img-thumbnail mb-3" style="width: 400px" src="{{ asset( $image ) }}" alt="soory something error">




                                                                    </tr>

                                                                @empty
                                                                    <tr>
                                                                        <th colspan="5">
                                                                            <h5 class="text-center">There is No data
                                                                            </h5>
                                                                        </th>
                                                                    </tr>
                                                                @endforelse

                                                            </tbody>

                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



        </div>
    </div>



    {{-- <script>
        var audioPlayer = document.getElementById('music-player');
        audioPlayer.src = "{{ asset($partner->music) }}";
    </script> --}}



    <!--**********************************
        Content body end
    ***********************************-->

</x-admin-layouts.admin-app>
