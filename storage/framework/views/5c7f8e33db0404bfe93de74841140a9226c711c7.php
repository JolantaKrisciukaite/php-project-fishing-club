

<?php $__env->startSection('content'); ?>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
                <div class="card">
                    <div class="card-header">

                        <h3 class="titleMenu">Members</h3>

                        <div>
                            <form action="<?php echo e(route('member.index')); ?>" method="get" class="sort-form">
                                <fieldset>
                                    <legend>Sort by</legend>
                                    <div>
                                        <label>Member name</label>
                                        <input type="radio" name="sort_by" value="name" <?php if('name' == $sort): ?> checked <?php endif; ?>>
                                        <label>Member surname</label>
                                        <input type="radio" name="sort_by" value="surname" <?php if('surname' == $sort): ?> checked <?php endif; ?>>
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
                                <a href="<?php echo e(route('member.index')); ?>" class="aButton">Clear</button></a>
                            </form>

                            <form action="<?php echo e(route('member.index')); ?>" method="get" class="sort-form">
                                <fieldset class="filterBy">
                                    <legend>Filter by</legend>
                                    <select class="index" name="reservoir_id"><br>
                                        <?php $__currentLoopData = $reservoirs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservoir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($reservoir->id); ?>" <?php if($defaultReservoir == $reservoir->id): ?> selected <?php endif; ?>>
                                                Title: <?php echo e($reservoir->title); ?>

                                            </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </fieldset>
                                <button class="addButtonCreate" type="submit">Filter</button>
                                <a href="<?php echo e(route('member.index')); ?>" class="aButton">Clear</button></a>
                            </form>

                            <form action="<?php echo e(route('member.index')); ?>" method="get" class="sort-form">
                                <fieldset class="searchBy">
                                    <legend>Search by</legend>
                                    <input placeholder="Serach by member" type="text" class="index" name="s" value="<?php echo e($s); ?>">
                                </fieldset>
                                <button class="addButtonCreate" type="submit" name="do_search" value="1">Search</button>
                                <a href="<?php echo e(route('member.index')); ?>" class="aButton">Clear</button></a>
                            </form>
                        </div>
                    </div>

                <div class="pager-links">
                <?php echo e($members->links()); ?>

                </div>

                    <div class="card-body">

                        <?php $__empty_1 = true; $__currentLoopData = $members; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $member): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <div class="index">Member name: <?php echo e($member->name); ?></div>
                            <div class="index">Member surname: <?php echo e($member->surname); ?></div>
                            <div class="index">Reservoir title: <?php echo e($reservoir->title); ?>

                                <?php echo e($member->memberReservoir->surname); ?></div>
                            <form method="POST" action="<?php echo e(route('member.destroy', [$member])); ?>">
                                <a href="<?php echo e(route('member.edit', [$member])); ?>" class="editButton">Edit</a>
                                <?php echo csrf_field(); ?>
                                <button class="deleteButton" type="submit">Delete</button>
                            </form><br>

                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?> 
                            <h3 class="title">No Results 😛</h3>
                        <?php endif; ?>

                    </div>
                <div class="pager-links">
                <?php echo e($members->links()); ?>

            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\egzaminas-zvejojimo-klubas\resources\views/member/index.blade.php ENDPATH**/ ?>