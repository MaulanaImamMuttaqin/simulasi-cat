<?= $this->extend('layout/page_layout')?>

<?= $this->section("content")?>



<div class="h-full w-full flex justify-center items-center flex-col ">
  <h1>My First Bootstrap Page</h1>
  <p>This part is inside a .container class.</p>
  <p>The .container class provides a responsive fixed width container.</p>
  <p>Resize the browser window to see that the container width will change at different breakpoints.</p>
</div>




<?= $this->endSection()?>