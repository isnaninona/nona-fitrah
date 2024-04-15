<div id="sidebar" class='active'>
    <div class="sidebar-wrapper active">
        {{-- <div class="sidebar-header">
            <img src="assets/images/logo.svg" alt="" srcset="">
        </div> --}}
        <p class="mt-4">
        <h1 class="text-center"><b>E-Learning</b></h1>
        </p>
        <div class="sidebar-menu">
            <ul class="menu">


                <li class='sidebar-title'>Main Menu
                </li>




                <li class="sidebar-item {{ $page == 'home' ? 'active' : '' }} ">
                    <a href="/" class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Dashboard</span>
                    </a>

                </li>

                @if(Auth::user()->role_id == 2)
                <li class="sidebar-item {{ $page == 'materis' ? 'active' : '' }} ">
                    <a href="materis" class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Materi</span>
                    </a>

                </li>

                <li class="sidebar-item {{ $page == 'tugas' ? 'active' : '' }} ">
                    <a href="tugas" class='sidebar-link'>
                        <i data-feather="home" width="20"></i>
                        <span>Tugas</span>
                    </a>

                </li>
                @endif

                <li class="sidebar-item {{ $page == 'management_users' ? 'active' : '' }}  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="user" width="20"></i>
                        <span>Management User</span>
                    </a>

                    <ul class="submenu {{ $page == 'management_users' ? 'active' : '' }}">

                        <li>
                            <a href="{{ route('roles.index') }}">Role</a>
                        </li>
                        <li>
                            <a href="{{ route('users.index') }}">User</a>
                        </li>

                    </ul>
                </li>
                <li class="sidebar-item {{ $page == 'participans' ? 'active' : '' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="briefcase" width="20"></i>
                        <span>Peserta Ujian</span>
                    </a>

                    <ul class="submenu {{ $page == 'participans' ? 'active' : '' }}">
                        <li>
                            <a href="{{ route('participant.index') }}">List Peserta</a>
                        </li>
                        <li>
                            <a href="{{ route('participant.create') }}">Tambah Peserta Ujian</a>
                        </li>
                    </ul>

                </li>
                <li class="sidebar-item {{ $page == 'teachers' ? 'active' : '' }} has-sub">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="users" width="20"></i>
                        <span>Management Guru</span>
                    </a>

                    <ul class="submenu {{ $page == 'teachers' ? 'active' : '' }}">
                        <li>
                            <a href="{{ route('teachers.index') }}">List Guru</a>
                        </li>
                        <li>
                            <a href="{{ route('teachers.create') }}">Tambah Guru</a>
                        </li>
                    </ul>

                </li>
                <li class="sidebar-item {{ $page == 'sesi' ? 'active' : '' }}  has-sub">
                    <a href="#" class='sidebar-link'>
                        <i data-feather="clock" width="20"></i>
                        <span>Sesi Ujian</span>
                    </a>

                    <ul class="submenu {{ $page == 'sesi' ? 'active' : '' }}">
                        <li>
                            <a href="{{ route('exam-session.index') }}">List Sesi Ujian</a>
                        </li>
                        <a href="{{ route('exam-session.create') }}">Tambah Sesi Ujian</a>
                </li>
            </ul>
            </li>
            <li class="sidebar-item {{ $page == 'mapel' ? 'active' : '' }}  has-sub">
                <a href="#" class='sidebar-link'>
                    <i data-feather="book" width="20"></i>
                    <span>Mata Pelajaran</span>
                </a>

                <ul class="submenu {{ $page == 'mapel' ? 'active' : '' }}">
                    <li>
                        <a href="{{ route('mapels.index') }}">List Mata Pelajaran</a>
                    </li>
                    <li>
                        <a href="{{ route('mapels.create') }}">Tambah Mata Pelajaran</a>
                    </li>
                </ul>

            </li>
            <li class="sidebar-item {{ $page == 'kelas' ? 'active' : '' }}  has-sub">
                <a href="#" class='sidebar-link'>
                    <i data-feather="trello" width="20"></i>
                    <span>Kelas & Jurusan</span>
                </a>

                <ul class="submenu {{ $page == 'kelas' ? 'active' : '' }}">
                    <li>
                        <a href="{{ route('class.index') }}">Kelas</a>
                    </li>
                    <li>
                        <a href="{{ route('majors.index') }}">Jurusan</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item {{ $page == 'question' ? 'active' : '' }} has-sub">
                <a href="#" class='sidebar-link'>
                    <i data-feather="server" width="20"></i>
                    <span>Soal Ujian</span>
                </a>

                <ul class="submenu {{ $page == 'question' ? 'active' : '' }}">
                    <li>
                        <a href="{{ route('question.index') }}">List Soal Ujian</a>
                    </li>
                    <li>
                        <a href="{{ route('question.create') }}">Tambah Soal Ujian</a>
                    </li>
                </ul>
            </li>
            <li class="sidebar-item {{ $page == 'exam' ? 'active' : '' }}  has-sub">
                <a href="#" class='sidebar-link'>
                    <i data-feather="monitor" width="20"></i>
                    <span>Management Ujian</span>
                </a>

                <ul class="submenu {{ $page == 'exam' ? 'active' : '' }}">
                    <li>
                        <a href="{{ route('exam.index') }}">List Ujian</a>
                    </li>
                    <li>
                        <a href="{{ route('exam.create') }}">Tambah Ujian</a>
                    </li>
                </ul>

            </li>
            <li class="sidebar-item {{ $page == 'participan_session' ? 'active' : '' }} has-sub">
                <a href="#" class='sidebar-link'>
                    <i data-feather="watch" width="20"></i>
                    <span>Peserta per Sesi</span>
                </a>

                <ul class="submenu {{ $page == 'participan_session' ? 'active' : '' }}">
                    <li>
                        <a href="{{ route('participant-session.index') }}">List Peserta per Sesi</a>
                    </li>
                    <li>
                        <a href="{{ route('participant-session.create') }}">Tambah Peserta per Sesi</a>
                    </li>
                </ul>

            </li>
            <li class="sidebar-item {{ $page == 'answer' ? 'active' : '' }}">
                <a href="{{route('answer.index')}}" class='sidebar-link'>
                    <i data-feather="archive" width="20"></i>
                    <span>Hasil Ujian</span>
                </a>
            </li>
            <li class="sidebar-item {{ $page == 'nilai' ? 'active' : '' }}">
                <a href="{{route('nilai.index')}}" class='sidebar-link'>
                    <i data-feather="database" width="20"></i>
                    <span>Nilai Ujian</span>
                </a>
            </li>
            <li class="sidebar-item">
                <a href="{{route('clear-cache.index')}}" class='sidebar-link'>
                    <i data-feather="refresh-cw" width="20"></i>
                    <span>Clear Cache</span>
                </a>
            </li>
            </ul>
        </div>
        <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
    </div>
</div>