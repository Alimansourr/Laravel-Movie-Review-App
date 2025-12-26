<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Searchable Table</title>
    <style>
        .container {
            max-width: 600px;
            margin: 20px auto;
            text-align: center;
        }
        .search-bar {
            margin-bottom: 10px;
            padding: 8px;
            width: 100%;
            box-sizing: border-box;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>

<div class="container">
    <lable>Name:</lable>
    <input type="text" id="searchInput" class="search-bar" onkeyup="filterTable()" placeholder="Search for names...">
    <lable>Email:</lable>
    <input type="text" id="searchInput" class="search-bar" onkeyup="filterTable()" placeholder="Search for names...">
    <button>Search</button>

    
    <table id="dataTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>gender</th>
                <th>Age</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                
            </tr>
        </tbody>
    </table>
</div>
</body>
</html>