<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }
</style>

<table>
    <!-- The rest of your table code -->
</table>


<body>

@foreach($person as $person)
@if($person->storagetype == 'space')
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Path</th>
            <th scope="col">Image Space Storage</th>
        </tr>
    </thead>
    <tbody>
                <tr>
                    <td>{{ $person->firstname }}</td>
                    <td>{{ $person->lastname }}</td>
                    <td>{{ $person->photo }}</td>
                    @php
                        $baseUrl = 'https://space-app3.sgp1.cdn.digitaloceanspaces.com/';
                    @endphp
                    <td><img src="{{ asset($baseUrl . $person->photo) }}" alt="Person Image" style="max-width: 100px;"></td>
                </tr>
    </tbody>
</table>
@endif
@if($person->storagetype == 'block')
<table class="table table-bordered">
    <thead>
        <tr>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Path</th>
            <th scope="col">Image Block Storage</th>
        </tr>
    </thead>
    <tbody>
                <tr>
                    <td>{{ $person->firstname }}</td>
                    <td>{{ $person->lastname }}</td>
                    <td>{{ $person->photo }}</td>
                    @php
                    @endphp
                    <td>
    <a href='/view2/{{$person->id}}'>
        Click Me
    </a>
</td>

                </tr>
    </tbody>
</table>
@endif
@endforeach
</body>

</html>


</div>
</body>

</html>
