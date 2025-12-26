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
        
       
        
       
       
    </style>
</head>
<body>

<div class="container">
    <form class="search-form" onkeyup="filterTable()">
        <label>Name:</label>
        <input type="text" id="nameSearch" class="search-bar" placeholder="Search for names...">
        <label>Email:</label>
        <input type="text" id="emailSearch" class="search-bar" placeholder="Search for emails...">
        <button type="button" onclick="filterTable()">Search</button>
    </form>
    
    <table id="dataTable">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Gender</th>
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
