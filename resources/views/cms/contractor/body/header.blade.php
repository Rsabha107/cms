@php


    $current_event_id = session()->get('EVENT_ID');
    $event = App\Models\Cms\Event::findOrFail($current_event_id);

    $id = Auth::user()->id;
    $profileData = App\Models\User::find($id);

@endphp

<nav class="navbar navbar-top fixed-top navbar-expand" id="navbarDefault">
    <div class="collapse navbar-collapse justify-content-between">
        <div class="navbar-logo">

            <button class="btn navbar-toggler navbar-toggler-humburger-icon hover-bg-transparent" type="button"
                data-bs-toggle="collapse" data-bs-target="#navbarVerticalCollapse" aria-controls="navbarVerticalCollapse"
                aria-expanded="false" aria-label="Toggle Navigation"><span class="navbar-toggle-icon"><span
                        class="toggle-line"></span></span></button>
            <a class="navbar-brand me-1 me-sm-3" href="{{ route('cms.admin') }}">
                <div class="d-flex align-items-center">
                    <div class="d-flex align-items-center">
                        {{-- <img src="{{ asset('assets/img/icons/mds.jpg') }}" alt="{{ __('mds.page_title') }}"
                            width="27" /> --}}
                        <img src="{{ asset(config('settings.website_logo')) }}" alt="{{ __('mds.page_title') }}"
                            width="150" />
                        {{-- @if ($session_set) --}}
                        <h3 class="logo-text ms-2 d-none d-sm-block">{{ config('settings.website_name') }} </h3>
                        <div class="theme-control-toggle fa-icon-wait px-2 d-none d-sm-block">
                            <h6 class="mt-2 d-sm-block d-none text-primary">({{ $event->name }})</h6>
                        </div>
                        {{-- @else
                        <h6 class="logo-text ms-2 d-none d-sm-block">{{ __('mds.page_title') }}</h6>
                            @endif --}}
                        {{-- <div class="theme-control-toggle fa-icon-wait px-2">
                            <h6 class="mt-2">({{ $event->name }})</h6>
                        </div> --}}
                    </div>
                </div>
            </a>
        </div>
    @php
    // get the contractor's events
    $contractor_id = auth()->user()->employee_id;
    $contractor = \App\Models\Cms\Contractor::where('id', $contractor_id)->first();
    $contractor_events = $contractor->events;
    // Filter the events to only include those that are active
    // and sort them by name
    $contractor_events = $contractor_events->where('active_flag', 1)->sortBy('name');
    @endphp

        <ul class="navbar-nav navbar-nav-icons flex-row">
            <li class="nav-item">
                <div class="theme-control-toggle fa-icon-wait px-2">
                    <h6 class="mt-2">{{ $profileData->name }}</h6>
                </div>
                <div class="theme-control-toggle fa-icon-wait px-2">
                    <input class="form-check-input ms-0 theme-control-toggle-input" type="checkbox"
                        data-theme-control="phoenixTheme" value="dark" id="themeControlToggle" />
                    <label class="mb-0 theme-control-toggle-label theme-control-toggle-light" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Switch theme"
                        style="height:32px;width:32px;"><span class="icon" data-feather="moon"></span></label>
                    <label class="mb-0 theme-control-toggle-label theme-control-toggle-dark" for="themeControlToggle"
                        data-bs-toggle="tooltip" data-bs-placement="left" data-bs-title="Switch theme"
                        style="height:32px;width:32px;"><span class="icon" data-feather="sun"></span></label>
                </div>
            </li>

            {{-- // end of notification block --}}

            {{-- // Start of Event switch block --}}
            <li class="nav-item dropdown">
                <a class="nav-link" href="#" style="min-width: 2.25rem" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                    data-bs-auto-close="outside"><span class="d-block" style="height:20px;width:20px;"><span
                            data-feather="calendar" style="height:20px;width:20px;"></span></span></a>

                <div class="dropdown-menu dropdown-menu-end notification-dropdown-menu py-0 shadow border navbar-dropdown-caret"
                    id="navbarDropdownNotfication" aria-labelledby="navbarDropdownNotfication">
                    <div class="card position-relative border-0">
                        <div class="card-header p-2">
                            <div class="d-flex justify-content-between">
                                <h5 class="text-body-emphasis mb-0">Events</h5>
                                {{-- <button class="btn btn-secondary p-0 fs-9 fw-normal" type="button">Switch to another event</button> --}}
                            </div>
                        </div>
                        <div class="card-body p-0">
                            <div class="scrollbar-overlay" style="height: 27rem;">
                                @foreach ($contractor_events as $event)
                                    @if (session()->get('EVENT_ID') == $event->id)
                                        @php
                                            $avatar_status = 'status-online';
                                            $read = 'read';
                                        @endphp
                                    @else
                                        @php
                                            $avatar_status = '';
                                            $read = 'unread';
                                        @endphp
                                    @endif
                                    <a href="{{ route('cms.contractor.orders.switch', $event->id) }}"
                                        class="text-decoration-none text-body-emphasis">
                                    <div class="px-2 px-sm-3 py-3 notification-card position-relative {{ $read }} border-bottom">
                                        <div
                                            class="d-flex align-items-center justify-content-between position-relative">
                                            <div class="d-flex">
                                                <div class="avatar avatar-m {{ $avatar_status }} me-3">
                                                    <img class="rounded-circle"
                                                        src="/storage/event/logo/{{ $event->event_logo ? $event->event_logo : 'default.png' }}"
                                                        alt="" />
                                                </div>
                                                <div class="flex-1 me-sm-3">
                                                    
                                                        {{-- <p class="fs-9 text-body-highlight mb-2 mb-sm-3 fw-normal"><span
                                                                class='me-1 fs-10'>💬</span>Event
                                                            <span class="ms-2 text-body-quaternary text-opacity-75 fw-bold fs-10">10m</span>
                                                        </p> --}}
                                                    <h4 class="fs-9 text-body-emphasis">{{ $event->name }}</h4>

                                                </div>
                                            </div>
                                            {{-- <div class="dropdown notification-dropdown">
                                                            <button
                                                                class="btn fs-10 btn-sm dropdown-toggle dropdown-caret-none transition-none"
                                                                type="button" data-bs-toggle="dropdown" data-boundary="window"
                                                                aria-haspopup="true" aria-expanded="false"
                                                                data-bs-reference="parent"><span
                                                                    class="fas fa-ellipsis-h fs-10 text-body"></span></button>
                                                            <div class="dropdown-menu py-2"><a class="dropdown-item"
                                                                    href="#!">Mark as unread</a></div>
                                                        </div> --}}
                                        </div>
                                    </div>
                                    </a>
                                @endforeach
                            </div>
                        </div>
                        {{-- <div class="card-footer p-0 border-top border-translucent border-0">
                            <div class="my-2 text-center fw-bold fs-10 text-body-tertiary text-opactity-85"><a
                                    class="fw-bolder" href="pages/notifications.html">Notification history</a></div>
                        </div> --}}
                    </div>
                </div>
            </li>
            {{-- // End of Event switch block --}}
            {{-- // application block --}}
            {{-- <li class="nav-item dropdown">
                <a class="nav-link" id="navbarDropdownNindeDots" href="#" role="button"
                    data-bs-toggle="dropdown" aria-haspopup="true" data-bs-auto-close="outside"
                    aria-expanded="false">
                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <circle cx="2" cy="2" r="2" fill="currentColor"></circle>
                        <circle cx="2" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="2" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="8" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="14" r="2" fill="currentColor"></circle>
                        <circle cx="8" cy="2" r="2" fill="currentColor"></circle>
                        <circle cx="14" cy="2" r="2" fill="currentColor"></circle>
                    </svg></a> --}}

                {{-- <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-nine-dots shadow border"
                    aria-labelledby="navbarDropdownNindeDots">
                    <div class="card bg-body-emphasis position-relative border-0">
                        <div class="card-body pt-3 px-3 pb-0 overflow-auto scrollbar" style="height: 20rem;">
                            <div class="row text-center align-items-center gx-0 gy-0">
                                <div class="col-4"><a
                                        class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="{{ route('home') }}"><img src="../../assets/img/nav-icons/bitbucket.webp"
                                            alt="" width="30">
                                        <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">MDS</p>
                                    </a>
                                </div>
                                <div class="col-4"><a
                                        class="d-block bg-body-secondary-hover p-2 rounded-3 text-center text-decoration-none mb-3"
                                        href="{{ route('bookapp') }}"><img src="../../assets/img/nav-icons/figma.webp"
                                            alt="" width="20">
                                        <p class="mb-0 text-body-emphasis text-truncate fs-10 mt-1 pt-1">TDS</p>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
            {{-- </li> --}}
            {{-- // end application block --}}

            <li class="nav-item dropdown"><a class="nav-link lh-1 pe-0" id="navbarDropdownUser" href="#!"
                    role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-haspopup="true"
                    aria-expanded="false">
                    <div class="avatar avatar-l ">
                        <img class="rounded-circle "
                            src="{{ !empty($profileData->photo) ? url('storage/upload/profile_images/' . $profileData->photo) : url('upload/default.png') }}"
                            alt="" />

                    </div>
                </a>
                <div class="dropdown-menu dropdown-menu-end navbar-dropdown-caret py-0 dropdown-profile shadow border"
                    aria-labelledby="navbarDropdownUser">
                    <div class="card position-relative border-0">
                        <div class="card-body p-0">
                            <div class="text-center pt-4 pb-3">
                                {{-- <div class="avatar avatar-xl ">
                                    <img class="rounded-circle "
                                        src="{{ asset('fnx/assets/img/team/72x72/57.webp') }}" alt="" />

                                </div> --}}
                                {{-- <h6 class="mt-2 text-body-emphasis">{{$profileData->name}}</h6> --}}
                            </div>
                            {{-- <div class="mb-3 mx-3">
                                <input class="form-control form-control-sm" id="statusUpdateInput" type="text"
                                    placeholder="Update your status" />
                            </div> --}}
                        </div>
                        <div class="overflow-auto scrollbar" style="height: 10rem;">
                            <ul class="nav d-flex flex-column mb-2 pb-1">
                                <li class="nav-item"><a class="nav-link px-3 d-block"
                                        href="{{ route('cms.admin.users.profile') }}"> <span
                                            class="me-2 text-body align-bottom"
                                            data-feather="user"></span><span>Profile</span></a></li>
                                {{-- <li class="nav-item"><a class="nav-link px-3 d-block"
                                        href="{{ route('cms.admin.dashboard') }}"><span
                                            class="me-2 text-body align-bottom"
                                            data-feather="pie-chart"></span>Dashboard</a></li> --}}
                                <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                                            class="me-2 text-body align-bottom"
                                            data-feather="settings"></span>Settings &amp; Privacy </a></li>
                                <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                                            class="me-2 text-body align-bottom" data-feather="help-circle"></span>Help
                                        Center</a></li>
                                <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                                            class="me-2 text-body align-bottom"
                                            data-feather="globe"></span>Language</a></li>
                            </ul>
                        </div>
                        <div class="card-footer p-2">
                            {{-- <div class="card-footer p-0 border-top border-translucent"> --}}
                            {{-- <ul class="nav d-flex flex-column my-3">
                                <li class="nav-item"><a class="nav-link px-3 d-block" href="#!"> <span
                                            class="me-2 text-body align-bottom" data-feather="user-plus"></span>Add
                                        another account</a></li>
                            </ul> --}}
                            {{-- <hr /> --}}
                            <div class="px-3">
                                {{-- <li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button class="dropdown-item" type="submit">
                                            Logout
                                        </button>
                                    </form>
                                </li> --}}
                                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button class="nav-link text-danger" type="submit">
                                        <span class="me-2 text-danger" data-feather="log-out">
                                        </span>Sign out
                                    </button>
                                </form>
                                {{-- <a class="btn btn-phoenix-secondary d-flex flex-center w-100"
                                    href="{{ route('logout') }}"> <span class="me-2" data-feather="log-out">
                                    </span>Sign out</a> --}}
                            </div>
                            {{-- <div class="my-2 text-center fw-bold fs-10 text-body-quaternary"><a
                                    class="text-body-quaternary me-1" href="#!">Privacy policy</a>&bull;<a
                                    class="text-body-quaternary mx-1" href="#!">Terms</a>&bull;<a
                                    class="text-body-quaternary ms-1" href="#!">Cookies</a></div> --}}
                        </div>
                    </div>
                </div>
            </li>
        </ul>
    </div>
</nav>
