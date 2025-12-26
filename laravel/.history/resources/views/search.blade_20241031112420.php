<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>User List</h1>

    <form method="GET" action="{{route('user.create')}}">
        <label for="searchName">Name:</label>
        <input type="text" id="searchName" name="name" value="{{ request('name') }}">

        <label for="searchEmail">Email:</label>
        <input type="text" id="searchEmail" name="email" value="{{ request('email') }}">

        <label for="searchGender">Gender:</label>
        <select id="searchGender" name="gender">
            <option value="">--Select--</option>
            <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>Male</option>
            <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>Female</option>
        </select>

        <label for="searchAge">Age:</label>
        <input type="number" id="searchAge" name="age" value="{{ request('age') }}">

        <button type="submit">Search</button>
    </form>

    <br>

    <table>
        <thead>
            <tr>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Gender</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>
         

         
        </tbody>
    </table>
</body>
</html>