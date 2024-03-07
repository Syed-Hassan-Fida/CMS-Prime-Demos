<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Contact Area')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="col-lg-12 col-ml-12 padding-bottom-30">
        <div class="row">
            <div class="col-lg-12">
                <div class="margin-top-40"></div>
                <?php echo $__env->make('backend/partials/message', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <?php if($errors->any()): ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li><?php echo e($error); ?></li>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </ul>
                    </div>
                <?php endif; ?>
            </div>
            <div class="col-lg-12 mt-t">
                <div class="card">
                    <div class="card-body">
                        <h4 class="header-title"><?php echo e(__('Contact Area Settings')); ?></h4>
                        <form action="<?php echo e(route('admin.homeone.contact.area')); ?>" method="post"
                              enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <ul class="nav nav-tabs " id="myTab" role="tablist">
                                <?php $__currentLoopData = get_all_language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if($key == 0): ?> active <?php endif; ?>" data-toggle="tab" href="#home_<?php echo e($key); ?>" role="tab" aria-selected="true"><?php echo e($lang->name); ?></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <div class="tab-content margin-top-30" id="myTabContent">
                                <?php $__currentLoopData = get_all_language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="tab-pane fade <?php if($key == 0): ?> show active <?php endif; ?>" id="home_<?php echo e($key); ?>" role="tabpanel" >
                                    <div class="form-group">
                                        <label for="home_page_01_<?php echo e($lang->slug); ?>_contact_area_title"><?php echo e(__('Form Title')); ?></label>
                                        <input type="text" name="home_page_01_<?php echo e($lang->slug); ?>_contact_area_title" class="form-control" value="<?php echo e(get_static_option('home_page_01_'.$lang->slug.'_contact_area_title')); ?>" id="home_page_01_<?php echo e($lang->slug); ?>_contact_area_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="home_page_01_<?php echo e($lang->slug); ?>_contact_area_button_text"><?php echo e(__('Form Button Text')); ?></label>
                                        <input type="text" name="home_page_01_<?php echo e($lang->slug); ?>_contact_area_button_text" class="form-control" value="<?php echo e(get_static_option('home_page_01_'.$lang->slug.'_contact_area_button_text')); ?>" id="home_page_01_<?php echo e($lang->slug); ?>_contact_area_button_text">
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="form-group">
                                <label for="home_page_01_contact_area_map_location"><?php echo e(__('Map Location')); ?></label>
                                <input type="text" name="home_page_01_contact_area_map_location" class="form-control"
                                       value="<?php echo e(get_static_option('home_page_01_contact_area_map_location')); ?>"
                                       id="home_page_01_contact_area_map_location">
                            </div>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Settings')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webagenc/public_html/cms.primedemos.com/@core/resources/views/backend/pages/home/home-01/contact-area.blade.php ENDPATH**/ ?>