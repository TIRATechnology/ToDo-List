/* "add" task */
function addTask() {
    const taskInput = document.getElementById("inputText");
    const taskText = taskInput.value.trim ();
    if (taskText !== "") {
        const taskList = document.getElementById ("TaskList");
        const newTask = document.createElement ("li");
        newTask.innerHTML = `<span>${taskText}</span>
        <button onclick = "removeTask(this)">Delete Task</button> 
        <button onclick= "EditTask(this)"class="EditTask">Edit Task</button>`
        taskList.appendChild(newTask)
        taskInput.value = ""
        console.log(newTask)
    }
}

/* Remove or delete task*/
function removeTask (button) {
    const taskList = document.getElementById ("TaskList")
    const removeTaskList = button.parentElement
    taskList.removeChild (removeTaskList)
}

/* Modify or edit task */
function EditTask (button) {
    const editTaskList = button.parentElement.firstChild
    const taskInput = prompt("Edit Text", editTaskList.textContent)
    editTaskList.textContent = taskInput
    
}

