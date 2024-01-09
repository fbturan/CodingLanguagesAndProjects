
window.onload = function() {
    showTasks();
};

function addTask() {
    var taskInput = document.getElementById('taskInput');
    var taskDescription = taskInput.value.trim();

    if (taskDescription === '') {
        alert('Please enter a task!');
        return;
    }

    var tasks = getTasksFromLocalStorage();
    tasks.push({ description: taskDescription, completed: false });
    updateTasksInLocalStorage(tasks);
    showTasks();
    taskInput.value = '';
}

function showTasks() {
    var taskList = document.getElementById('taskList');
    taskList.innerHTML = '';

    var tasks = getTasksFromLocalStorage();

    tasks.forEach(function(task, index) {
        var listItem = document.createElement('li');
        var checkbox = document.createElement('input');
        checkbox.type = 'checkbox';
        checkbox.checked = task.completed;

        listItem.appendChild(checkbox);

        var taskDescription = document.createElement('span');
        taskDescription.textContent = task.description;
        // Tamamlanmışsa üstünü çiz
        if (task.completed) {
            listItem.classList.add('completed');
        }

        listItem.appendChild(taskDescription);

        listItem.onclick = function() {
            toggleTask(index);
        };

        taskList.appendChild(listItem);
    });

    // Silme butonunu ekle
    var deleteButton = document.getElementById('delete');
    deleteButton.onclick = deleteCompletedTasks;
}

function toggleTask(index) {
    var tasks = getTasksFromLocalStorage();
    tasks[index].completed = !tasks[index].completed;
    updateTasksInLocalStorage(tasks);
    showTasks();
}

function deleteCompletedTasks() {
    var tasks = getTasksFromLocalStorage();
    tasks = tasks.filter(function(task) {
        return !task.completed;
    });
    updateTasksInLocalStorage(tasks);
    showTasks();
}

function getTasksFromLocalStorage() {
    var storedTasks = localStorage.getItem('tasks');
    return storedTasks ? JSON.parse(storedTasks) : [];
}

function updateTasksInLocalStorage(tasks) {
    localStorage.setItem('tasks', JSON.stringify(tasks));
}

