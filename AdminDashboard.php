<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            background: #008080;
            color: white;
            height: 100vh;
            padding: 20px;
        }
        .sidebar h2 {
            margin-bottom: 20px;
        }
        .sidebar ul {
            list-style: none;
        }
        .sidebar ul li {
            padding: 10px;
            cursor: pointer;
        }
        .sidebar ul li:hover {
            background: #005f5f;
        }
        .main-content {
            flex-grow: 1;
            padding: 20px;
            background: #f4f4f4;
        }
        .cards {
            display: flex;
            gap: 20px;
        }
        .card {
            background: white;
            padding: 20px;
            flex: 1;
            text-align: center;
            border-radius: 5px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
        }
        #content {
            margin-top: 20px;
            padding: 15px;
            background: white;
            border-radius: 5px;
            box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
            display: none; /* Fillimisht e fshehur */
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Admin Dashboard</h2>
        <ul>
            <li>Dashboard</li>
            <li id="users">Users</li> <!-- Shtova id për të targetuar këtë element -->
         
            <li>Settings</li>
        </ul>
    </div>
    <div class="main-content">
        <h1>Dashboard</h1>
        <div class="cards">
            <div class="card">
                <h2>245</h2>
                <p>Total Users</p>
            </div>
            <div class="card">
                <h2>1004</h2>
                <p>Total Posts</p>
            </div>
            <div class="card">
                <h2>15,678</h2>
                <p>Comments</p>
            </div>
            <div class="card">
                <h2>13</h2>
                <p>Categories</p>
            </div>
        </div>

        <!-- Div ku do të shfaqet mesazhi për "Users" -->
        <div id="content">
            <p>Here is the list of all registered users.</p>
        </div>
    </div>

    <script>
  
document.getElementById("users").addEventListener("click", function() {
     let contentDiv = document.getElementById("content");
     contentDiv.style.display = "block";  // Shfaq div-in
     contentDiv.innerHTML = "<p>Loading users...</p>";  // Tregon që po i ngarkon të dhënat

     fetch("get_users.php")
       .then(response => response.json())
       .then(users => {
         let usersList = "<h2>Users List</h2><ul>";
         users.forEach(user => {
           usersList += `
               <li>
                   <strong>${user.first_name} ${user.last_name}</strong> (${user.role})<br>
                   Email: ${user.email}<br>
                   Phone: ${user.phone}<br>
                   <hr>
               </li>
           `;
         });
         usersList += "</ul>";
         contentDiv.innerHTML = usersList;  // Shfaq përdoruesit në div
       })
       .catch(error => {
         contentDiv.innerHTML = "<p>There was an error loading the users.</p>";
       });
   });
</script>



   
</body>
</html>
