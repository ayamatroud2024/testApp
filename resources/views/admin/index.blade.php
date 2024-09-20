<x-admin-layouts.admin-app>

    <!--**********************************
            Content body start
        ***********************************-->
    <div class="content-body">
        <!-- row -->
        <div class="page-titles">
            <ol class="breadcrumb">
                <li>
                    <h5 class="bc-title">Dashboard</h5>
                </li>
                <li class="breadcrumb-item"><a href="javascript:void(0)">
                        <svg width="17" height="17" viewBox="0 0 17 17" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M2.125 6.375L8.5 1.41667L14.875 6.375V14.1667C14.875 14.5424 14.7257 14.9027 14.4601 15.1684C14.1944 15.4341 13.8341 15.5833 13.4583 15.5833H3.54167C3.16594 15.5833 2.80561 15.4341 2.53993 15.1684C2.27426 14.9027 2.125 14.5424 2.125 14.1667V6.375Z"
                                stroke="#2C2C2C" stroke-linecap="round" stroke-linejoin="round" />
                            <path d="M6.375 15.5833V8.5H10.625V15.5833" stroke="#2C2C2C" stroke-linecap="round"
                                stroke-linejoin="round" />
                        </svg>
                        Home </a>
                </li>
                <li class="breadcrumb-item active"><a href="javascript:void(0)">Dashboard</a></li>
            </ol>

        </div>
        <div class="container-fluid">
            <div class="row">



                <div class="row">
                    <div class="col-xl-6">
                      <div class="widget-stat card bg-primary" style="height: 200px; background-color: #f5f5f5; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); display: flex; justify-content: center; align-items: center;">
                        <div class="media" style="width: 90%;">
                          <span class="me-3" style="font-size: 40px;">
                            <i class="material-icons" style="font-size: 40px;">group</i>
                          </span>
                          <div class="media-body text-white" style="text-align: center;">
                            @php
                            $users = App\Models\User::all()->count();
                        @endphp
                            <p class="mb-1">Total Users</p>
                            <h3 class="text-white">{{$users}}</h3>
                            <div class="progress mb-2 bg-secondary" style="height: 12px; border-radius: 6px;">
                              <div class="progress-bar progress-animated bg-white" style="width: 80%;"></div>
                            </div>
                            <small></small>
                          </div>
                        </div>
                      </div>
                    </div>



                    <div class="col-xl-6">
                        <div class="widget-stat card" style="height: 200px; background-color: #7d7d7d; border-radius: 10px; box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); display: flex; justify-content: center; align-items: center;">
                          <div class="media" style="width: 90%;">
                            <div style="position: relative; width: 70px; height: 70px; background-color: #f5f5f5; border-radius: 50%;">
                              <i class="material-icons" style="font-size: 40px; color: #7d7d7d; position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">person</i>
                            </div>
                            <div class="media-body text-white " style="text-align: center;">
                                @php
                                $tasks = App\Models\Task::all()->count();
                            @endphp

                              <p class="mb-1">Total Tasks</p>
                              <h3 class="text-white">{{$tasks}}</h3>
                              <div class="progress mb-2 bg-secondary" style="height: 12px; border-radius: 6px;">
                                <div class="progress-bar progress-animated bg-white" style="width: 80%;"></div>
                              </div>
                              <small></small>
                            </div>
                          </div>
                        </div>
                      </div>

                </div>



                <div class="col-xl-12 wid-100">
                    <div class="row">

                        <div class="col-xl-4 col-sm-6 same-card">
                            <div class="card">
                                <div class="card-body depostit-card">
                                    <div class="depostit-card-media d-flex justify-content-between style-1">
                                        <div>
                                            @php
                                                $data = App\Models\Task::where('status', 'pending')->count();
                                            @endphp
                                            <h6>Pending Tasks</h6>
                                            <h3>{{ $data }}</h3>
                                            <b>{{ $data }}</b>

                                        </div>
                                        <div class="icon-box bg-primary-light">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="#888888" stroke-width="1"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M3 3v18h18" />
                                                <path d="M18.7 8l-5.1 5.2-2.8-2.7L7 14.3" />
                                            </svg>
                                        </div>
                                    </div>
                                    <div id="NewCustomers"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-4 col-sm-6 same-card">
                            <div class="card">
                                <div class="card-body depostit-card">
                                    <div class="depostit-card-media d-flex justify-content-between style-1">
                                        <div>
                                            @php
                                             $data = App\Models\Task::where('status', 'in-progress')->count();
                                            @endphp
                                            <h6>Inprogress Tasks</h6>
                                            <h3>{{ $data }}</h3>
                                            <b>{{ $data }}</b>
                                        </div>
                                        <div class="icon-box bg-danger-light">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="#888888" stroke-width="1"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="9" cy="7" r="4"></circle>
                                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    <div id="NewExperience"></div>
                                </div>
                            </div>
                        </div>


                       <div class="col-xl-4 col-sm-6 same-card">
                            <div class="card">
                                <div class="card-body depostit-card">
                                    <div class="depostit-card-media d-flex justify-content-between style-1">
                                        <div>
                                            @php
                                                $data = App\Models\Task::where('status', 'completed')->count();
                                            @endphp
                                            <h6>Completed Tasks</h6>
                                            <h3>{{$data}}</h3>
                                            <b>{{$data}}</b>
                                        </div>
                                        <div class="icon-box bg-success-light">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                                viewBox="0 0 24 24" fill="none" stroke="#888888" stroke-width="1"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path>
                                                <circle cx="9" cy="7" r="4"></circle>
                                                <path d="M23 21v-2a4 4 0 0 0-3-3.87"></path>
                                                <path d="M16 3.13a4 4 0 0 1 0 7.75"></path>
                                            </svg>
                                        </div>
                                    </div>
                                 <div id="NewCustomers" style="min-height: 40px;"><div id="apexcharts583r4hn9" class="apexcharts-canvas apexcharts583r4hn9 apexcharts-theme-light" style="width: 370px; height: 40px;"><svg id="SvgjsSvg1570" width="370" height="40" xmlns="http://www.w3.org/2000/svg" version="1.1" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)" style="background: transparent;"><g id="SvgjsG1572" class="apexcharts-inner apexcharts-graphical" transform="translate(-1, 0)"><defs id="SvgjsDefs1571"><clipPath id="gridRectMask583r4hn9"><rect id="SvgjsRect1575" width="377" height="42" x="-3" y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><clipPath id="gridRectMarkerMask583r4hn9"><rect id="SvgjsRect1576" width="375" height="44" x="-2" y="-2" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fff"></rect></clipPath><linearGradient id="SvgjsLinearGradient1581" x1="0" y1="0" x2="0" y2="1"><stop id="SvgjsStop1582" stop-opacity="0.4" stop-color="var(--primary)" offset="0"></stop><stop id="SvgjsStop1583" stop-opacity="0.4" stop-color="var(--primary)" offset="0.006"></stop><stop id="SvgjsStop1584" stop-opacity="0" stop-color="white" offset="1"></stop></linearGradient></defs><g id="SvgjsG1587" class="apexcharts-xaxis" transform="translate(0, 0)"><g id="SvgjsG1588" class="apexcharts-xaxis-texts-g" transform="translate(0, -4)"></g></g><g id="SvgjsG1601" class="apexcharts-grid"><g id="SvgjsG1602" class="apexcharts-gridlines-horizontal" style="display: none;"><line id="SvgjsLine1604" x1="0" y1="0" x2="371" y2="0" stroke="#eeeeee" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1605" x1="0" y1="8" x2="371" y2="8" stroke="#eeeeee" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1606" x1="0" y1="16" x2="371" y2="16" stroke="#eeeeee" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1607" x1="0" y1="24" x2="371" y2="24" stroke="#eeeeee" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1608" x1="0" y1="32" x2="371" y2="32" stroke="#eeeeee" stroke-dasharray="0" class="apexcharts-gridline"></line><line id="SvgjsLine1609" x1="0" y1="40" x2="371" y2="40" stroke="#eeeeee" stroke-dasharray="0" class="apexcharts-gridline"></line></g><g id="SvgjsG1603" class="apexcharts-gridlines-vertical" style="display: none;"></g><line id="SvgjsLine1611" x1="0" y1="40" x2="371" y2="40" stroke="transparent" stroke-dasharray="0"></line><line id="SvgjsLine1610" x1="0" y1="1" x2="0" y2="40" stroke="transparent" stroke-dasharray="0"></line></g><g id="SvgjsG1577" class="apexcharts-area-series apexcharts-plot-series"><g id="SvgjsG1578" class="apexcharts-series" seriesName="NetxProfit" data:longestSeries="true" rel="1" data:realIndex="0"><path id="SvgjsPath1585" d="M 0 40L 0 34.666666666666664L 37.1 8L 74.2 21.333333333333332L 111.3 14.666666666666664L 148.4 21.333333333333332L 185.5 16L 222.6 24L 259.7 17.333333333333332L 296.8 21.333333333333332L 333.9 14.666666666666664L 371 8L 371 40M 371 8z" fill="url(#SvgjsLinearGradient1581)" fill-opacity="1" stroke-opacity="1" stroke-linecap="butt" stroke-width="0" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask583r4hn9)" pathTo="M 0 40L 0 34.666666666666664L 37.1 8L 74.2 21.333333333333332L 111.3 14.666666666666664L 148.4 21.333333333333332L 185.5 16L 222.6 24L 259.7 17.333333333333332L 296.8 21.333333333333332L 333.9 14.666666666666664L 371 8L 371 40M 371 8z" pathFrom="M -1 48L -1 48L 37.1 48L 74.2 48L 111.3 48L 148.4 48L 185.5 48L 222.6 48L 259.7 48L 296.8 48L 333.9 48L 371 48"></path><path id="SvgjsPath1586" d="M 0 34.666666666666664L 37.1 8L 74.2 21.333333333333332L 111.3 14.666666666666664L 148.4 21.333333333333332L 185.5 16L 222.6 24L 259.7 17.333333333333332L 296.8 21.333333333333332L 333.9 14.666666666666664L 371 8" fill="none" fill-opacity="1" stroke="var(--primary)" stroke-opacity="1" stroke-linecap="butt" stroke-width="2" stroke-dasharray="0" class="apexcharts-area" index="0" clip-path="url(#gridRectMask583r4hn9)" pathTo="M 0 34.666666666666664L 37.1 8L 74.2 21.333333333333332L 111.3 14.666666666666664L 148.4 21.333333333333332L 185.5 16L 222.6 24L 259.7 17.333333333333332L 296.8 21.333333333333332L 333.9 14.666666666666664L 371 8" pathFrom="M -1 48L -1 48L 37.1 48L 74.2 48L 111.3 48L 148.4 48L 185.5 48L 222.6 48L 259.7 48L 296.8 48L 333.9 48L 371 48"></path><g id="SvgjsG1579" class="apexcharts-series-markers-wrap" data:realIndex="0"></g></g><g id="SvgjsG1580" class="apexcharts-datalabels" data:realIndex="0"></g></g><line id="SvgjsLine1612" x1="0" y1="0" x2="371" y2="0" stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" class="apexcharts-ycrosshairs"></line><line id="SvgjsLine1613" x1="0" y1="0" x2="371" y2="0" stroke-dasharray="0" stroke-width="0" class="apexcharts-ycrosshairs-hidden"></line><g id="SvgjsG1614" class="apexcharts-yaxis-annotations"></g><g id="SvgjsG1615" class="apexcharts-xaxis-annotations"></g><g id="SvgjsG1616" class="apexcharts-point-annotations"></g></g><g id="SvgjsG1600" class="apexcharts-yaxis" rel="0" transform="translate(-18, 0)"></g><g id="SvgjsG1573" class="apexcharts-annotations"></g></svg><div class="apexcharts-legend" style="max-height: 20px;"></div></div></div>
                                 <div class="resize-triggers"><div class="expand-trigger"><div style="width: 406px; height: 134px;"></div></div><div class="contract-trigger"></div></div>
                                </div>
                            </div>
                        </div>






                    </div>


                </div>







            </div>







        </div>
    </div>
</x-admin-layouts.admin-app>
