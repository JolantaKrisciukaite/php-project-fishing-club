

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="titleReservoir">Edit reservoir</div>

                    <div class="card-body">
                        <form method="POST" action="<?php echo e(route('reservoir.update', $reservoir)); ?>" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Title:</label>
                                <input type="text" name="reservoir_title" class="form-control"
                                    value="<?php echo e(old('reservoir_title', $reservoir->title)); ?>">
                            </div>

                            <div class="form-group">
                                <label>Area:</label>
                                <input type="text" name="reservoir_area" class="form-control"
                                    value="<?php echo e(old('reservoir_area', $reservoir->area)); ?>">
                            </div>

                            <div class="form-group">
                                <div class="small-photo">
                                     <?php if($reservoir->photo): ?>
                                         <img src="<?php echo e($reservoir->photo); ?>">
                                         <label>Delete photo</label>
                                         <input type="checkbox" name="delete_reservoir_photo">
                                     <?php else: ?>
                                          <img src="<?php echo e(asset('noImage.jpg')); ?>">
                                     <?php endif; ?>
                                     <p>Photo:</p>
                                     <input type="file" name="reservoir_photo">
                                 </div>
                             </div>
                             
                            <div class="form-group">
                                <label>About:</label>
                                <textarea id="summernote" type="text" name="reservoir_about" class="form-control"
                                    value="<?php echo e(old('reservoir_about', $reservoir->about)); ?>"><?php echo e($reservoir->about); ?></textarea>
                            </div>

                            <?php echo csrf_field(); ?>
                            <button class="editButton" type="submit">Edit</button>
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\egzaminas-zvejojimo-klubas\resources\views/reservoir/edit.blade.php ENDPATH**/ ?>