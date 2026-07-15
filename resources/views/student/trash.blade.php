<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    @session('success')
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endsession

    <a href="{{ route('student.index') }}" class="btn btn-primary mb-3">
        Kembali
    </a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>

            @forelse($students as $student)
                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $student->name }}</td>

                    <td>{{ $student->email }}</td>

                    <td>{{ $student->gender }}</td>

                    <td>

                        <form action="{{ route('student.restore', $student) }}" method="POST" class="d-inline">

                            @csrf
                            @method('PUT')

                            <button class="btn btn-warning btn-sm">
                                Restore
                            </button>

                        </form>

                        <form action="{{ route('student.forceDelete', $student) }}" method="POST" class="d-inline">

                            @csrf
                            @method('DELETE')

                            <button class="btn btn-danger btn-sm" onclick="return confirm('Hapus Permanen?')">

                                Force Delete

                            </button>

                        </form>

                    </td>

                </tr>

            @empty

                <tr>

                    <td colspan="5" class="text-center">
                        Tidak ada data di Trash
                    </td>

                </tr>
            @endforelse

        </tbody>

    </table>

</x-app>
