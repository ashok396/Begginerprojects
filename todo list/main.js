// JavaScript array to store tasks
const tasks = [];

// Function to add a task
function addTask() {
  const taskInput = document.getElementById("taskInput").value;
  if (taskInput === "") {
    alert("Please enter a task.");
    return;
  }

  // Add the task to the tasks array
  tasks.push(taskInput);

  // Update the DOM
  updateTaskList();

  // Clear the input
  document.getElementById("taskInput").value = "";
}

// Function to remove a task
function removeTask(index) {
  // Remove the task from the tasks array
  tasks.splice(index, 1);

  // Update the DOM
  updateTaskList();
}

// Function to clear all tasks
function clearAll() {
  tasks.length = 0;
  updateTaskList();
}

// Function to update the task list in the DOM
function updateTaskList() {
  const taskList = document.getElementById("taskList");
  taskList.innerHTML = "";

  for (let i = 0; i < tasks.length; i++) {
    const listItem = document.createElement("li");
    const taskText = document.createTextNode(tasks[i]);
    const removeButton = document.createElement("button");
    removeButton.textContent = "Remove";
    removeButton.className = "remove-button";
    removeButton.onclick = function () {
      removeTask(i);
    };
    listItem.appendChild(taskText);
    listItem.appendChild(removeButton);
    taskList.appendChild(listItem);
  }
}
