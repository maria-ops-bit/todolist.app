 <?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: login.php");
    exit();
}
require_once "init_db.php";
?>
<!DOCTYPE html>
<html>
<head>
 <title>To-Do List App</title>
 <!-- TP3 Exercise
1: Internal CSS -->
<style>
 body {
 background-color: #f4f6f8;
 font-family: Arial, sans-serif;
 }
 h1 {
 text-align: center;
 }
 </style>
 <!-- TP3 Exercise 1:
External CSS -->
<link rel="stylesheet" href="stylee.css">
  
</head>
<body>

<!-- Exercise 1: Navigation Bar -->
<header>
 <nav>
 <ul>
  
 <li><a href="index.html">Home</a></li>
 <li><a href="tasks.html">My Tasks</a></li>
 <li><a href="projects.html">My Projects</a></li>
 <li><a href="about.html">About</a></li>
 <li><a href="login.html">Login</a></li>
 <li><a href="signup.html">Sign Up</a></li>
 
 </ul>
 </nav>
</header>
<!-- Exercise 2: Home Section -->
<main>

<section>
    <h1>Organize your tasks efficiently</h1>
    <p>This simple To-Do List application helps you manage your daily tasks and projects.</p>

    <form action="php/add_new.php" method="POST">
        <input type="text" name="taskTitle" placeholder="Task title" required/>
        <input type="date" name="taskDate" required/>
        <select name="taskPriority" required>
            <option value="low">low</option>
            <option value="medium">medium</option>
            <option value="high">high</option>
        </select>
        <button type="submit">Add Task</button>
    </form>

    <ul>
    <?php
    $sql    = "SELECT * FROM tasks";
    $result = $conn->query($sql);

  if ($result->num_rows > 0) {

    while ($row = $result->fetch_assoc()) {

        echo '<li class="task">'
           . '<input type="checkbox">'
           . '<span class="task-title">'
           . htmlspecialchars($row["task_title"])
           . '</span>'

           . '<span class="task-date">'
           . htmlspecialchars($row["due_date"])
           . '</span>'

           . '<span class="task-priority">'
           . htmlspecialchars($row["priority"])
           . '</span>'

           . '<a href="php/delete.php?id=' . $row["id"] . '">
                <button class="delete-btn">Delete</button>
              </a>'

           . '</li>';
    }

} else {

    echo "<p>No tasks available</p>";
}

    $conn->close();
    ?>
    </ul>
</section>
</ul>
<p id="greeting"></p>


 <button>Start Now</button>
</section>
<!-- Exercise 3: Task List Layout (Static) -->
<section>
 <h2>My Tasks</h2>
 <ul class="task-list">
 <!-- TP3 Exercise 1:
Inline CSS -->
 <li class="task" style="background-color: lightgreen;">
 <input type="checkbox"> Finish HTML lab – Due: May 10
 </li>
 <li class="task">
 <input type="checkbox"> Prepare presentation – Due: May 12
 </li>
 <li class="task">
 <input type="checkbox"> Study PHP – Due: May 15
 </li>
 </ul>
</section>
 <!-- TP3 Other
-->
<section>
 <h2>My Tasks</h2>
 <ul class="task-list">
 <li class="task">
 <input type="checkbox">
 <span class="task-title">Finish HTML Lab</span>
 <span class="task-date">May 10</span>
 </li>
 <li class="task">
 <input type="checkbox">
 <span class="task-title">Prepare Presentation</span>
 <span class="task-date">May 12</span>
 </li>
 <li class="task">
 <input type="checkbox">
 <span class="task-title">Study PHP</span>
 <span class="task-date">May 15</span>
 </li>
 </ul>
</section>
<!-- Exercise 4: Add Task Form (UI Only) -->
<section>
<section>
  <h2>Add New Task</h2>
  <form id="task-form">
    <div>
      <label>Task Title:</label>
      <input type="text" id="task-title">
    </div>
    <div>
      <label>Due Date:</label>
      <input type="date" id="task-date">
    </div>
    <div>
      <label>Priority:</label>
      <select id="task-priority">
        <option>Low</option>
        <option>Medium</option>
        <option>High</option>
      </select>
    </div>
    <button type="submit">Add Task</button>
  </form>
</section>

<ul id="task-list"></ul>
</main>
<!-- Exercise 5: Footer Section -->
<footer>
 <p>2026 – Web Development Course</p>
 <nav>
 <a href="index.html">Home</a> |
 <a href="projects.html">Projects</a> |
 <a href="about.html">About</a>
 </nav>
</footer>
<script src="indexx.js"></script>
</body>
</html>