<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Report</title>
</head>

<body class="antialiased">
    <h1 class="text-center h1">REPORT</h1>
    <table class="table table-hover">
        <thead>
            <th>
                Date
            </th>
            <th>
                Item Code
            </th>
            <th>
                Description
            </th>
            <th>
                Quantity
            </th>
            <th>
                Department
            </th>
        </thead>

        <tbody>
            @foreach($assets as $asset)
            <tr>
                <td>
                    {{$asset->created_at}}
                </td>
                <td>
                    {{$asset->instrument->instrument_code}}
                </td>
                <td>
                    {{$asset->instrument->description}}
                </td>
                <td>
                    {{$asset->quantity}}
                </td>
                <td>
                    {{$asset->department->name}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>