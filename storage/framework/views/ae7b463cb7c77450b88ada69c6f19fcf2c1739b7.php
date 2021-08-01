

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">
                        <h3 class="titleMenu">Reservoirs</h3>

                        <div>

                            <form action="<?php echo e(route('reservoir.index')); ?>" method="get" class="sort-form">
                                <fieldset>
                                    <legend>Sort by</legend>
                                    <div>
                                        <label>Title</label>
                                        <input type="radio" name="sort_by" value="title" <?php if('title' == $sort): ?> checked <?php endif; ?>>
                                        <label>Area</label>
                                        <input type="radio" name="sort_by" value="area" <?php if('area' == $sort): ?> checked <?php endif; ?>>
                                    </div>
                                </fieldset>

                                <fieldset class="direction">
                                    <legend>Direction</legend>
                                    <div>
                                        <label>Asc</label>
                                        <input type="radio" name="dir" value="asc" <?php if('asc' == $dir): ?> checked <?php endif; ?>>
                                        <label>Dsc</label>
                                        <input type="radio" name="dir" value="desc" <?php if('desc' == $dir): ?> checked <?php endif; ?>>
                                    </div>
                                </fieldset>
                                <button class="addButtonCreate" type="submit">Sort</button>
                                <a href="<?php echo e(route('reservoir.index')); ?>" class="aButton">Clear</button></a>
                            </form>

                        </div>
                    </div>

                    <div class="pager-links">
                        <?php echo e($reservoirs->links()); ?>

                    </div>

                    <div class="card-body">
                        <?php $__currentLoopData = $reservoirs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservoir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

                        <div class="photo"> 
                            <?php if($reservoir->photo): ?>
                            <img src="<?php echo e($reservoir->photo); ?>">
                            <?php else: ?>
                            <img src="<?php echo e(asset('noImage.jpg')); ?>">
                            <?php endif; ?>
                        </div>

                            <div class="index">Title: <?php echo e($reservoir->title); ?></div>
                            <div class="index">Area: <?php echo e($reservoir->area); ?> (km2)</div>
                            <div class="index">About: <?php echo $reservoir->about; ?></div>

                            <form method="POST" action="<?php echo e(route('reservoir.destroy', $reservoir)); ?>">
                                <a href="<?php echo e(route('reservoir.show',[$reservoir])); ?>" class="addButtonCreate">More info</a>
                                <a href="<?php echo e(route('reservoir.edit', [$reservoir])); ?>" class="editButton">Edit</a>
                                <?php echo csrf_field(); ?>
                                <button class="deleteButton" type="submit">Delete</button>
                            </form>
                            <br>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

                    </div>
                    <div class="pager-links">
                        <?php echo e($reservoirs->links()); ?>

                    </div>
                </div>
            </div>
        </div>
    <?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\egzaminas-zvejojimo-klubas\resources\views/reservoir/index.blade.php ENDPATH**/ ?>