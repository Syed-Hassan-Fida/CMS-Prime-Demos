<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Service Area')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/dropzone.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/media-uploader.css')); ?>">
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
                        <h4 class="header-title"><?php echo e(__('Service Area Settings')); ?></h4>
                        <form action="<?php echo e(route('admin.homeone.service.area')); ?>" method="post"
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
                                        <label for="home_page_01_<?php echo e($lang->slug); ?>_service_area_title"><?php echo e(__('Title')); ?></label>
                                        <input type="text" name="home_page_01_<?php echo e($lang->slug); ?>_service_area_title" class="form-control" value="<?php echo e(get_static_option('home_page_01_'.$lang->slug.'_service_area_title')); ?>" id="home_page_01_<?php echo e($lang->slug); ?>_service_area_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="home_page_01_<?php echo e($lang->slug); ?>_service_area_description"><?php echo e(__('Description')); ?></label>
                                        <textarea name="home_page_01_<?php echo e($lang->slug); ?>_service_area_description" class="form-control max-height-150" id="home_page_01_<?php echo e($lang->slug); ?>_service_area_description" cols="30" rows="10"><?php echo e(get_static_option('home_page_01_'.$lang->slug.'_service_area_description')); ?></textarea>
                                    </div>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <div class="form-group">
                                <label for="home_page_01_service_area_items"><?php echo e(__('Set Home Page Display')); ?></label>
                                <select name="home_page_01_service_area_item_type" class="form-control" id="home_page_01_service_area_item_type">
                                    <option value="service" <?php if(get_static_option('home_page_01_service_area_item_type') == 'service'): ?> selected <?php endif; ?>><?php echo e(__('Service')); ?></option>
                                    <option value="category" <?php if(get_static_option('home_page_01_service_area_item_type') == 'category'): ?> selected <?php endif; ?>><?php echo e(__('Service Category')); ?></option>
                                </select>
                                <small class="info-text"><?php echo e(__('set what you want to show in home page, service item or service category')); ?></small>
                            </div>
                            <div class="form-group">
                                <label for="home_page_01_service_area_items"><?php echo e(__('Service Items')); ?></label>
                                <input type="text" name="home_page_01_service_area_items" class="form-control"
                                       value="<?php echo e(get_static_option('home_page_01_service_area_items')); ?>"
                                       id="home_page_01_service_area_items">
                                <small class="info-text"><?php echo e(__('enter how many service show in frontend')); ?></small>
                            </div>
                            <?php if(get_static_option('home_page_variant' == '03')): ?>
                            <div class="form-group">
                                <label for="home_page_01_service_area_background_image"><?php echo e(__('Service Background Image')); ?></label>
                                <?php $service_image_upload_btn_label = 'Upload Service Background Image'; ?>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        <?php
                                            $service_img = get_attachment_image_by_id(get_static_option('home_page_01_service_area_background_image'),null,false);
                                        ?>
                                        <?php if(!empty($service_img)): ?>
                                            <div class="attachment-preview">
                                                <div class="thumbnail">
                                                    <div class="centered">
                                                        <img class="avatar user-thumb" src="<?php echo e($service_img['img_url']); ?>" >
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $service_image_upload_btn_label = 'Change Service Background Image'; ?>
                                        <?php endif; ?>
                                    </div>
                                    <input type="hidden" name="home_page_01_service_area_background_image" value="<?php echo e(get_static_option('home_page_01_service_area_background_image')); ?>">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Service Background Image')); ?>" data-modaltitle="<?php echo e(__('Upload Service Background Image')); ?>" data-imgid="<?php echo e(get_static_option('home_page_01_service_area_background_image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                        <?php echo e(__($service_image_upload_btn_label)); ?>

                                    </button>
                                </div>
                                <small><?php echo e(__('recommended image size is 1920x1060 pixel')); ?></small>
                            </div>
                            <?php endif; ?>
                            <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4"><?php echo e(__('Update Settings')); ?></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php echo $__env->make('backend.partials.media-upload.media-upload-markup', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
    <script src="<?php echo e(asset('assets/backend/js/dropzone.js')); ?>"></script>
    <?php echo $__env->make('backend.partials.media-upload.media-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webagenc/public_html/cms.primedemos.com/@core/resources/views/backend/pages/home/home-01/service-area.blade.php ENDPATH**/ ?>