

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">

                    <h3 class="titleReservoir">Create new reservoir</h3>
                   
                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('reservoir.store')); ?>" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Title:</label>
                                <input placeholder="Enter reservoir title" type="text" name="reservoir_title" class="form-control"
                                    value="<?php echo e(old('reservoir_title')); ?>">
                            </div>

                            <div class="form-group">
                                <label>Area:</label>
                                <input placeholder="Enter info about reservoir" type="text" name="reservoir_area"
                                    class="form-control" value="<?php echo e(old('reservoir_area')); ?>">
                            </div>

                            <div class="form-group">
                                <p>Photo:</p>
                                <input type="file" name="reservoir_photo" class="reservoir_photo">
                            </div>

                            <div class="form-group">
                                <label>About:</label>
                                <textarea id="summernote" placeholder="Enter info about reservoir" type="text"
                                    name="reservoir_about" class="form-control" value="<?php echo e(old('reservoir_about')); ?>"></textarea>
                            </div>

                            <?php echo csrf_field(); ?>
                            <button class="addButton" type="submit">Add</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('#summernote').summernote();
        });
    </script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\egzaminas-zvejojimo-klubas\resources\views/reservoir/create.blade.php ENDPATH**/ ?>