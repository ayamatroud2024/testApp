
        <!--**********************************
            Sidebar start
        ***********************************-->
        <div class="deznav">
            <div class="deznav-scroll">
				<ul class="metismenu" id="menu">
					<li class="menu-title" style="font-size: 100%">Back</li>
					<li><a href="{{ route('admin.dashboard') }}" aria-expanded="false">
						<div class="menu-icon">
							<svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg">
								<path d="M2.5 7.49999L10 1.66666L17.5 7.49999V16.6667C17.5 17.1087 17.3244 17.5326 17.0118 17.8452C16.6993 18.1577 16.2754 18.3333 15.8333 18.3333H4.16667C3.72464 18.3333 3.30072 18.1577 2.98816 17.8452C2.67559 17.5326 2.5 17.1087 2.5 16.6667V7.49999Z" stroke="#888888" stroke-linecap="round" stroke-linejoin="round"/>
								<path d="M7.5 18.3333V10H12.5V18.3333" stroke="#888888" stroke-linecap="round" stroke-linejoin="round"/>
							</svg>
						</div>
						<span class="nav-text">Dashboard</span>
						</a>

					</li>




                    <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
						<div class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#888888" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><path d="M5.52 19c.64-2.2 1.84-3 3.22-3h6.52c1.38 0 2.58.8 3.22 3"/><circle cx="12" cy="10" r="3"/><circle cx="12" cy="12" r="10"/></svg>
						</div>
						<span class="nav-text">Users Info</span>
						</a>
                        <ul aria-expanded="false" class="mm-collapse">
                            <li><a href="{{ route('admin.users.index') }}">Users</a></li>

                        </ul>
					</li>




                     <li><a class="has-arrow " href="javascript:void(0);" aria-expanded="false">
						<div class="menu-icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="#888888" stroke-width="1" stroke-linecap="round" stroke-linejoin="round"><rect x="3" y="3" width="18" height="18" rx="2"/><path d="M21 12H3M12 3v18"/></svg>
                        </div>
                        <span class="nav-text">Tasks Info</span>
						</a>
                        <ul aria-expanded="false" class="mm-collapse">
                            <li><a href="{{ route('admin.tasks.index') }}">Tasks</a></li>
                            {{-- <li><a href="{{ route('admin.portraits.index') }}">Partner Images</a></li> --}}

 </ul>
					</li>



			</div>
        </div>

        <!--**********************************
            Sidebar end
        ***********************************-->
