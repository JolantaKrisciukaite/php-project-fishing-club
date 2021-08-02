

<?php $__env->startSection('content'); ?>
<div class="container">
   <div class="row justify-content-center">
        <div class="col-sm-12 col-md-10 col-lg-8 col-xl-6">
           <div class="card">
               <div class="titleReservoir">Edit member</div>

               <div class="card-body">
                <form method="POST" action="<?php echo e(route('member.update',[$member])); ?>">

                    <div class="form-group">
                        <label>Name:</label>
                        <input type="text" name="member_name" class="form-control" value="<?php echo e(old('member_name', $member->name)); ?>">
                    </div>

                    <div class="form-group">
                        <label>Surname:</label>
                        <input type="text" name="member_surname" class="form-control" value="<?php echo e(old('member_surname', $member->surname)); ?>">
                    </div>

                    <div class="form-group">
                        <label>Live:</label>
                        <input type="text" name="member_live" class="form-control" value="<?php echo e(old('member_live', $member->live)); ?>">
                    </div>

                    <div class="form-group">
                        <label>Experience:</label>
                        <input type="text" name="member_experience" class="form-control" value="<?php echo e(old('member_experience', $member->experience)); ?>">
                    </div>

                    <div class="form-group">
                        <label>Registered:</label>
                        <input type="text" name="member_registered" class="form-control" value="<?php echo e(old('member_registered', $member->registered)); ?>">
                    </div>
                      
                    <select class="index" name="reservoir_id"><br>
                        <?php $__currentLoopData = $reservoirs; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reservoir): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <option value="<?php echo e($reservoir->id); ?>">
                                Title: <?php echo e($reservoir->title); ?> 🐳
                                Area: <?php echo e($reservoir->area); ?> (km2) 💧
                            </option>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </select>
                      
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
<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\egzaminas-zvejojimo-klubas\resources\views/member/edit.blade.php ENDPATH**/ ?>