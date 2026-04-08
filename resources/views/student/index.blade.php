<x-app>
    <x-slot:title>{{ $title }}</x-slot>

    <ul class="list-group">
        @foreach ($student as $student)
            <li class="list-group-item">{{ $student->nim }} {{ $student->name }} </li>
        @endforeach
    </ul>

</x-app>
