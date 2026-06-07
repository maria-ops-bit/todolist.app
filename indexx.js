// Greeting
const now = new Date();
const hour = now.getHours();
let message = "";
if (hour >= 5 && hour < 12) {
    message = "GOOD MORNING MARIA!";
} else if (hour >= 12 && hour < 18) {
    message = "GOOD AFTERNOON MARIA!";
} else {
    message = "GOOD EVENING MARIA!";
}
document.getElementById("greeting").textContent = message;

// 1. Select elements reliably
// Select elements


const form = document.getElementById("task-form");
const titleInput = document.getElementById("task-title");
const dateInput = document.getElementById("task-date");
const priorityInput = document.getElementById("task-priority"); 
const taskList = document.getElementById("task-list");

// Listen for form submit
form.addEventListener("submit", function (event) {
  event.preventDefault(); // stop page reload

  // Create task item
  const li = document.createElement("li");
  li.className = "task";

  // Create checkbox
  const checkbox = document.createElement("input");
  checkbox.type = "checkbox";

  // Create title span
  const titleSpan = document.createElement("span");
  titleSpan.className = "task-title";
  titleSpan.textContent = titleInput.value;

  // Create date span
  const dateSpan = document.createElement("span");
  dateSpan.className = "task-date";
  dateSpan.textContent = dateInput.value;

   // Priority
  const prioritySpan = document.createElement("span");
  prioritySpan.textContent = " (" + priorityInput.value + ")";

  // Create delete button
  const deleteBtn = document.createElement("button");
  deleteBtn.textContent = "Delete";
  deleteBtn.addEventListener("click", function () {
    li.remove();
  });

  // Add elements to the task item
  li.appendChild(checkbox);
  li.appendChild(titleSpan);
  li.appendChild(dateSpan);
  li.appendChild(prioritySpan); 
  li.appendChild(deleteBtn);

  // Add task to list
  taskList.appendChild(li);

  // Clear inputs
  form.reset();
});
