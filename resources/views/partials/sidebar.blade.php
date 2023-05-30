<div class="d-flex flex-column flex-shrink-0 p-3 text-bg-dark " style="height:100%;">
    <hr>
    <ul class="nav nav-pills flex-column mb-auto">

        {{-- DASHBOARD --}}
        <li class="nav-item btn btn-outline-info m-1">
            <a href="{{ route('admin.dashboard') }}" class="nav-link text-white">
                <svg class="bi pe-none me-2" width="16" height="16">
                    <use xlink:href="#speedometer2"></use>
                </svg>
                Dashboard
            </a>
        </li>

        {{-- PROJECT --}}
        <li>
            <div class="dropdown ">
                <button class="btn btn-outline-info m-1 dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Project
                </button>
                {{-- LIST --}}
                <ul class="dropdown-menu-dark dropdown-menu">
                    <li class="dropdown-item">
                        <a href="{{ route('admin.projects.index') }}" class="nav-link text-white">
                            <svg class="bi pe-none me-2" width="16" height="16">
                                <use xlink:href="#speedometer2"></use>
                            </svg>
                            List
                        </a>
                    </li>
                    {{-- CREATE --}}
                    <li class="dropdown-item">
                        <a href="{{ route('admin.projects.create') }}" class="nav-link text-white">
                            <svg class="bi pe-none me-2" width="16" height="16">
                                <use xlink:href="#speedometer2"></use>
                            </svg>
                            Create
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- TYPE --}}
        <li>
            <div class="dropdown ">
                <button class="btn btn-outline-info m-1 dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Type:
                </button>
                {{-- LIST --}}
                <ul class="dropdown-menu-dark dropdown-menu">
                    <li class="dropdown-item">
                        <a href="{{ route('admin.types.index') }}" class="nav-link text-white">
                            <svg class="bi pe-none me-2" width="16" height="16">
                                <use xlink:href="#speedometer2"></use>
                            </svg>
                            List
                        </a>
                    </li>
                </ul>
            </div>
        </li>

        {{-- TECHNOLOGY --}}
        <li>
            <div class="dropdown ">
                <button class="btn btn-outline-info m-1 dropdown-toggle" type="button" data-bs-toggle="dropdown"
                    aria-expanded="false">
                    Technology:
                </button>
                {{-- LIST --}}
                <ul class="dropdown-menu-dark dropdown-menu">
                    <li class="dropdown-item">
                        <a href="{{ route('admin.technologies.index') }}" class="nav-link text-white">
                            <svg class="bi pe-none me-2" width="16" height="16">
                                <use xlink:href="#speedometer2"></use>
                            </svg>
                            List
                        </a>
                    </li>
                    {{-- CREATE --}}
                    <li class="dropdown-item">
                        <a href="{{ route('admin.technologies.create') }}" class="nav-link text-white">
                            <svg class="bi pe-none me-2" width="16" height="16">
                                <use xlink:href="#speedometer2"></use>
                            </svg>
                            Create
                        </a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    <hr>
</div>
