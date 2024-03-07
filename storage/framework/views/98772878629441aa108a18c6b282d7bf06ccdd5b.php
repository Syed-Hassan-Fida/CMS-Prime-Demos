<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('Quality Area')); ?>

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
                        <h4 class="header-title"><?php echo e(__('Quality Area Settings')); ?></h4>
                        <form action="<?php echo e(route('admin.homeone.quality.area')); ?>" method="post" enctype="multipart/form-data">
                            <?php echo csrf_field(); ?>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <?php $__currentLoopData = get_all_language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <li class="nav-item">
                                    <a class="nav-link <?php if($key == 0): ?> active <?php endif; ?>" data-toggle="tab" href="#tab_<?php echo e($key); ?>" role="tab"  aria-selected="true"><?php echo e($lang->name); ?></a>
                                </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                            <div class="tab-content margin-top-30" id="myTabContent">
                                <?php $__currentLoopData = get_all_language(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <div class="tab-pane fade <?php if($key == 0): ?> show active <?php endif; ?>" id="tab_<?php echo e($key); ?>" role="tabpanel" >
                                    <div class="form-group">
                                        <label for="home_page_01_<?php echo e($lang->slug); ?>_quality_area_title"><?php echo e(__('Title')); ?></label>
                                        <input type="text" name="home_page_01_<?php echo e($lang->slug); ?>_quality_area_title" class="form-control" value="<?php echo e(get_static_option('home_page_01_'.$lang->slug.'_quality_area_title')); ?>" id="home_page_01_<?php echo e($lang->slug); ?>_quality_area_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="home_page_01_<?php echo e($lang->slug); ?>_quality_area_description"><?php echo e(__('Description')); ?></label>
                                        <textarea name="home_page_01_<?php echo e($lang->slug); ?>_quality_area_description" class="form-control" rows="10" id="home_page_01_<?php echo e($lang->slug); ?>_quality_area_description"><?php echo e(get_static_option('home_page_01_'.$lang->slug.'_quality_area_description')); ?></textarea>
                                    </div>
                                    <?php if(get_static_option('home_page_variant') != '04'): ?>
                                    <div class="form-group">
                                        <label for="home_page_01_<?php echo e($lang->slug); ?>_quality_area_button_status"><strong><?php echo e(__('Button Show/Hide')); ?></strong></label>
                                        <label class="switch">
                                            <input type="checkbox" name="home_page_01_<?php echo e($lang->slug); ?>_quality_area_button_status"  <?php if(!empty(get_static_option('home_page_01_'.$lang->slug.'_quality_area_button_status'))): ?> checked <?php endif; ?> id="home_page_01_<?php echo e($lang->slug); ?>_quality_area_button_status">
                                            <span class="slider"></span>
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="home_page_01_<?php echo e($lang->slug); ?>_quality_area_button_title"><?php echo e(__('Button Title')); ?></label>
                                        <input type="text" name="home_page_01_<?php echo e($lang->slug); ?>_quality_area_button_title" class="form-control" value="<?php echo e(get_static_option('home_page_01_'.$lang->slug.'_quality_area_button_title')); ?>" id="home_page_01_<?php echo e($lang->slug); ?>_quality_area_button_title">
                                    </div>
                                    <div class="form-group">
                                        <label for="home_page_01_<?php echo e($lang->slug); ?>_quality_area_button_url"><?php echo e(__('Button URL')); ?></label>
                                        <input type="text" name="home_page_01_<?php echo e($lang->slug); ?>_quality_area_button_url" class="form-control" value="<?php echo e(get_static_option('home_page_01_'.$lang->slug.'_quality_area_button_url')); ?>" id="home_page_01_<?php echo e($lang->slug); ?>_quality_area_button_url">
                                    </div>
                                    <?php endif; ?>
                                    <?php if(get_static_option('home_page_variant') == '04'): ?>
                                        <div class="form-group">
                                            <label for="home_page_04_<?php echo e($lang->slug); ?>_quality_area_list"><?php echo e(__('Bullet List')); ?></label>
                                            <textarea name="home_page_01_<?php echo e($lang->slug); ?>_quality_area_list" id="home_page_01_<?php echo e($lang->slug); ?>_quality_area_list" class="form-control" cols="30" rows="5"><?php echo e(get_static_option('home_page_01_'.$lang->slug.'_quality_area_list')); ?></textarea>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php if(get_static_option('home_page_variant') == '01'): ?>
                            <div class="form-group">
                                <label for="home_page_01_quality_area_background_image"><?php echo e(__('Background Image')); ?></label>
                                <?php $cta_image_upload_btn_label = 'Upload Background Image'; ?>
                                <div class="media-upload-btn-wrapper">
                                    <div class="img-wrap">
                                        <?php
                                            $cta_bg_img = get_attachment_image_by_id(get_static_option('home_page_01_quality_area_background_image'),null,false);
                                        ?>
                                        <?php if(!empty($cta_bg_img)): ?>
                                            <div class="attachment-preview">
                                                <div class="thumbnail">
                                                    <div class="centered">
                                                        <img class="avatar user-thumb" src="<?php echo e($cta_bg_img['img_url']); ?>" >
                                                    </div>
                                                </div>
                                            </div>
                                            <?php $cta_image_upload_btn_label = 'Change Background Image'; ?>
                                        <?php endif; ?>
                                    </div>
                                    <input type="hidden" name="home_page_01_quality_area_background_image" value="<?php echo e(get_static_option('home_page_01_quality_area_background_image')); ?>">
                                    <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Background Image')); ?>" data-modaltitle="<?php echo e(__('Upload Background Image')); ?>" data-imgid="<?php echo e(get_static_option('home_page_01_quality_area_background_image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                        <?php echo e(__($cta_image_upload_btn_label)); ?>

                                    </button>
                                </div>
                                <small><?php echo e(__('recommended image size is 950x530 pixel')); ?></small>
                            </div>
                            <?php endif; ?>
                            <?php if(get_static_option('home_page_variant') == '02'): ?>
                                <div class="form-group">
                                    <label for="home_page_02_quality_area_image"><?php echo e(__('Map Image')); ?></label>
                                    <?php $cta_image_upload_btn_label = 'Upload Image'; ?>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            <?php
                                                $cta_bg_img = get_attachment_image_by_id(get_static_option('home_page_02_quality_area_image'),null,false);
                                            ?>
                                            <?php if(!empty($cta_bg_img)): ?>
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb" src="<?php echo e($cta_bg_img['img_url']); ?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $cta_image_upload_btn_label = 'Change Image'; ?>
                                            <?php endif; ?>
                                        </div>
                                        <input type="hidden" name="home_page_02_quality_area_image" value="<?php echo e(get_static_option('home_page_02_quality_area_image')); ?>">
                                        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-imgid="<?php echo e(get_static_option('home_page_02_quality_area_image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                            <?php echo e(__($cta_image_upload_btn_label)); ?>

                                        </button>
                                    </div>
                                    <small><?php echo e(__('recommended image size is 650x380 pixel')); ?></small>
                                </div>
                            <?php endif; ?>
                            <?php if(get_static_option('home_page_variant') == '04'): ?>
                                <div class="form-group">
                                    <label for="home_page_04_quality_area_image"><?php echo e(__('Image')); ?></label>
                                    <?php $cta_image_upload_btn_label = 'Upload Image'; ?>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            <?php
                                                $cta_bg_img = get_attachment_image_by_id(get_static_option('home_page_04_quality_area_image'),null,false);
                                            ?>
                                            <?php if(!empty($cta_bg_img)): ?>
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb" src="<?php echo e($cta_bg_img['img_url']); ?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $cta_image_upload_btn_label = 'Change Image'; ?>
                                            <?php endif; ?>
                                        </div>
                                        <input type="hidden" name="home_page_04_quality_area_image" value="<?php echo e(get_static_option('home_page_04_quality_area_image')); ?>">
                                        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-imgid="<?php echo e(get_static_option('home_page_04_quality_area_image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                            <?php echo e(__($cta_image_upload_btn_label)); ?>

                                        </button>
                                    </div>
                                    <small><?php echo e(__('recommended image size is 570x590 pixel')); ?></small>
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

<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webagenc/public_html/cms.primedemos.com/@core/resources/views/backend/pages/home/home-01/quality-area.blade.php ENDPATH**/ ?>