<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body style="background-color:grey">
    
  <?php if(auth()->guard()->check()): ?>
  <p>Congrats you are logged in.</p>
  <form action="/logout" method="POST">
    <?php echo csrf_field(); ?>
    <button>Log out</button>
  </form>

  <div style="border: 3px solid black;">
    <h2>Create a New Post</h2>
    <form action="/create-post" method="POST">
      <?php echo csrf_field(); ?>
      <input type="text" name="title" placeholder="post title">
      <textarea name="body" placeholder="body content..."></textarea>
      <button>Save Post</button>
    </form>
  </div>

  <div style="border: 3px solid black;">
    <h2>All Posts</h2>
    <?php $__currentLoopData = $posts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $post): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div style="background-color: gray; padding: 10px; margin: 10px;">
      <h3><?php echo e($post['title']); ?></h3>
      <?php echo e($post['body']); ?>

      <p><a href="/edit-post/<?php echo e($post->id); ?>">Edit</a></p>
      <form action="/delete-post/<?php echo e($post->id); ?>" method="POST">
        <?php echo csrf_field(); ?>
        <?php echo method_field('DELETE'); ?>
        <button>Delete</button>
      </form>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </div>

  <?php else: ?>
    <div style="border:3px solid black">
        <h2>Register</h2>
        <form action="/register" method="POST">
            <?php echo csrf_field(); ?>
            <input type="text" name="name" placeholder="name">
            <input type="email" name="email" id="email" placeholder="email">
            <input type="password" name="password" id="password" placeholder="password">
            <button type="submit">Register</button>
        </form>
    </div>
    <div style="border:3px solid black">
        <h2>Login</h2>
        <form action="/login" method="POST">
            <?php echo csrf_field(); ?>
            <input type="text" name="loginname" id="email" placeholder="email">
            <input type="password" name="loginpassword" id="password" placeholder="password">
            <button type="submit">Login</button>
        </form>
    </div>
    <?php endif; ?>
</body>
</html><?php /**PATH C:\xampp\htdocs\project\resources\views/project.blade.php ENDPATH**/ ?>