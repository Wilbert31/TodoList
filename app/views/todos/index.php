<?php require APPROOT . '/views/inc/header.php'; ?>

<?php if((int)$data['getDoneTask']->total == 0): ?>

<?php elseif((int)$data['getDoneTask']->total == $data['getTasksRowCount']): ?>
  <p class="note note-success">
  <strong>Note success:</strong> Napakasipag mo naman! Nakakahanga!
  </p>

<?php endif; ?>

<form action="" class="mb-5 addTask" method="post">
    <div class="input-group">
        <input type="search" name="task" id="task" class="form-control <?php echo addClass($data['task_err'], 'is-invalid'); ?>" value="<?php echo $data['task']; ?>" />
        <div class="invalid-feedback"><?php echo $data['task_err']; ?></div>
        <button type="submit" class="btn btn-primary" data-mdb-ripple-color="dark"><i class="fas fa-add"></i> Add Task</button>
    </div>
</form>

<table class="table align-middle mb-0 bg-white table-bordered">
  <thead class="bg-light">
    <tr>
      <th>Task</th>
      <th>Status</th>
      <th>Actions</th>
    </tr>
  </thead>

  <tbody>
    <?php foreach($data['tasks'] as $task) : ?>
    <tr>
      <td>
        <div class="d-flex align-items-center <?php echo addClass($task->status,'text-decoration-line-through'); ?>">
          <?php echo $task->task; ?>
        </div>
      </td>
      <td>
        <span class="<?php echo addClass($task->status, 'badge badge-success rounded-pill d-inline'); ?>"><?php echo $task->status; ?></span>
      </td>
      <td>
        <form action="" method="post">
          <button type="submit" class="btn btn-success btn-sm <?php echo addClass($task->status, 'fade-out d-none'); ?>" name="doneTask">
              <input type="hidden" value="<?php echo $task->id; ?>" name="id">
              <i class="fas fa-check-square"></i>
          </button>
          <button type="submit" class="btn btn-danger btn-sm" name="deleteTask">
              <input type="hidden" value="<?php echo $task->id; ?>" name="id">
              <i class="fas fa-trash-alt"></i>
          </button>
        </form>
      </td>
    </tr>
    <?php endforeach; ?>
    <?php  ?>

    <?php if(empty($task->id)) : ?>
    <tr>
      <td colspan="3" class="text-center">No task needs to be done.</td>
    </tr>
    <?php endif; ?>
  </tbody>
</table>

<?php require APPROOT . '/views/inc/footer.php'; ?>
