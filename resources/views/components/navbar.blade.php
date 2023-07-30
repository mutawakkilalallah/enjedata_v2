<nav class="main-header navbar navbar-expand navbar-dark text-xs">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown user-menu">
            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                @php
                    $avatar = App\Models\Document::where('person_uuid', auth()->user()->person_uuid)
                        ->where('type', '=', 'foto-diri')
                        ->orderByDesc('created_at')
                        ->first();
                @endphp
                @if ($avatar)
                    <img src="{{ asset('storage/' . $avatar->path) }}" class="user-image img-circle elevation-2"
                        style="object-fit: cover">
                @else
                    <img src="/assets/dist/img/no_photo.png" class="user-image img-circle elevation-2"
                        style="object-fit: cover">
                @endif
                <span class="d-none d-md-inline">@ {{ auth()->user()->username }} |
                    {{ auth()->user()->role }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">

                <li class="user-header bg-primary">
                    @if ($avatar)
                        <img src="{{ asset('storage/' . $avatar->path) }}" class="img-circle elevation-2"
                            style="object-fit: cover">
                    @else
                        <img src="/assets/dist/img/no_photo.png" class="img-circle elevation-2"
                            style="object-fit: cover">
                    @endif
                    <p>
                        {{ App\Models\Person::where('uuid', '=', Auth::user()->person_uuid)->first()->nama }}
                        <small>{{ auth()->user()->role }}</small>
                    </p>
                </li>
                <li class="user-footer">
                    <a href="/user/{{ auth()->user()->id }}/edit"
                        class="btn btn-default btn-flat float-left rounded mr-2">Edit</a>
                    <a href="/person/{{ auth()->user()->person_uuid }}/detail"
                        class="btn btn-default btn-flat float-left rounded">Profil</a>
                    <form action="/logout" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-default btn-flat float-right rounded">Logout</button>
                    </form>
                </li>
            </ul>
        </li>
    </ul>
</nav>
