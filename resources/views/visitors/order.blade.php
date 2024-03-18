@extends('visitors.layouts.main')
@section('main-container')
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        th,
        td {
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #007bff;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #e9ecef;
        }
    </style>
    <h1>Completed Orders</h1>
    <table>
        <thead>
            <tr>
                <th>User Name</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Order Date</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($enrollment as $key => $value)
                <tr>
                    <td>{{ $value->user->name }}</td>
                    <td>{{ $value->course->title }}</td>
                    <td>${{ $value->course->price }}</td>
                    <td>{{ $value->created_at }}</td>
                </tr>
            @endforeach



            <!-- Add more rows as needed -->
        </tbody>
    </table>
@endsection
