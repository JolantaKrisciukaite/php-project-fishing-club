
<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="titleReservoir"><?php echo e($reservoir->title); ?></div>

                    <div class="card-body">
                        <div class="card-show">
                            <div class="masters">
                                <h6 class="h6">Reservoir title: <?php echo e($reservoir->title); ?></h6>
                            </div>
                            <div class="masters">
                                <h6 class="h6">Reservoir area: <?php echo e($reservoir->area); ?> (km2)</h6>
                            </div>
                            <div class="masters">
                                <h6 class="h6">Reservoir about: <?php echo $reservoir->about; ?></h6>
                            </div>
                        </div>

                        <div>
                            <a href="<?php echo e(route('reservoir.edit', [$reservoir])); ?>" class="editButton">Edit</a>
                            <a href="<?php echo e(route('reservoir.pdf', [$reservoir])); ?>" class="addButtonCreate">Download PDF</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\egzaminas-zvejojimo-klubas\resources\views/reservoir/show.blade.php ENDPATH**/ ?>