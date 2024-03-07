<?php $__env->startSection('site-title'); ?>
    <?php echo e(__('About Us Area')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('style'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/dropzone.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/media-uploader.css')); ?>">
    <link rel="stylesheet" href="<?php echo e(asset('assets/backend/css/summernote-bs4.css')); ?>">
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
                        <h4 class="header-title"><?php echo e(__('About Us Area Settings')); ?></h4>
                        <form action="<?php echo e(route('admin.homeone.about.us')); ?>" method="post" enctype="multipart/form-data">
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
                                        <label for="home_page_01_<?php echo e($lang->slug); ?>_about_us_title"><?php echo e(__('Title')); ?></label>
                                        <input type="text" name="home_page_01_<?php echo e($lang->slug); ?>_about_us_title" class="form-control" value="<?php echo e(get_static_option('home_page_01_'.$lang->slug.'_about_us_title')); ?>" id="home_page_01_<?php echo e($lang->slug); ?>_about_us_title">
                                    </div>
                                    <?php if(get_static_option('home_page_variant') == '01' || get_static_option('home_page_variant') == '02' ): ?>
                                    <div class="form-group">
                                        <label for="home_page_01_<?php echo e($lang->slug); ?>_about_us_video_url"><?php echo e(__('Video Url')); ?></label>
                                        <input type="text" name="home_page_01_<?php echo e($lang->slug); ?>_about_us_video_url" class="form-control" value="<?php echo e(get_static_option('home_page_01_'.$lang->slug.'_about_us_video_url')); ?>" id="home_page_01_<?php echo e($lang->slug); ?>_about_us_video_url">
                                    </div>
                                    <?php endif; ?>
                                    <?php if(get_static_option('home_page_variant') != '01' ): ?>
                                        <div class="form-group">
                                            <label for="home_page_01_<?php echo e($lang->slug); ?>_about_us_description"><?php echo e(__('Description')); ?></label>
                                             <input type="hidden" name="home_page_01_<?php echo e($lang->slug); ?>_about_us_description" >
                                             <div class="summernote" data-content='<?php echo e(get_static_option('home_page_01_'.$lang->slug.'_about_us_description')); ?>'></div>
                                        </div>
                                    <?php endif; ?>
                                    <?php if(get_static_option('home_page_variant') == '02' || get_static_option('home_page_variant') == '03' ): ?>
                                        <div class="form-group">
                                            <label for="home_page_01_<?php echo e($lang->slug); ?>_about_us_quote_text"><?php echo e(__('Quote Text')); ?></label>
                                            <input type="text" name="home_page_01_<?php echo e($lang->slug); ?>_about_us_quote_text" class="form-control" value="<?php echo e(get_static_option('home_page_01_'.$lang->slug.'_about_us_quote_text')); ?>" id="home_page_01_<?php echo e($lang->slug); ?>_about_us_quote_text">
                                        </div>
                                    <?php endif; ?>
                                    <?php if(get_static_option('home_page_variant') == '04' ): ?>
                                        <div class="form-group">
                                            <label for="home_page_01_<?php echo e($lang->slug); ?>_about_us_our_mission_title"><?php echo e(__('Our Mission Title')); ?></label>
                                            <input type="text" name="home_page_01_<?php echo e($lang->slug); ?>_about_us_our_mission_title" class="form-control" value="<?php echo e(get_static_option('home_page_01_'.$lang->slug.'_about_us_our_mission_title')); ?>" id="home_page_01_<?php echo e($lang->slug); ?>_about_us_our_mission_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="home_page_01_<?php echo e($lang->slug); ?>_about_us_our_mission_description"><?php echo e(__('Our Mission Description')); ?></label>
                                             <input type="hidden" name="home_page_01_<?php echo e($lang->slug); ?>_about_us_our_mission_description" >
                                             <div class="summernote" data-content='<?php echo e(get_static_option('home_page_01_'.$lang->slug.'_about_us_our_mission_description')); ?>'></div>
                                        </div>
                                        <div class="form-group">
                                            <label for="home_page_01_<?php echo e($lang->slug); ?>_about_us_our_vision_title"><?php echo e(__('Our Vision Title')); ?></label>
                                            <input type="text" name="home_page_01_<?php echo e($lang->slug); ?>_about_us_our_vision_title" class="form-control" value="<?php echo e(get_static_option('home_page_01_'.$lang->slug.'_about_us_our_vision_title')); ?>" id="home_page_01_<?php echo e($lang->slug); ?>_about_us_our_vision_title">
                                        </div>
                                        <div class="form-group">
                                            <label for="home_page_01_<?php echo e($lang->slug); ?>_about_us_our_vision_description"><?php echo e(__('Our Vision Description')); ?></label>
                                             <input type="hidden" name="home_page_01_<?php echo e($lang->slug); ?>_about_us_our_vision_description" >
                                             <div class="summernote" data-content='<?php echo e(get_static_option('home_page_01_'.$lang->slug.'_about_us_our_vision_description')); ?>'></div>
                                        </div>
                                    <?php endif; ?>
                                </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                            <?php if(get_static_option('home_page_variant') == '01'): ?>
                                <div class="form-group">
                                    <label><?php echo e(__('Background Image')); ?></label>
                                    <?php $background_image_upload_btn_label = 'Upload background Image'; ?>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            <?php
                                                $background_img = get_attachment_image_by_id(get_static_option('home_page_01_about_us_video_background_image'),null,false);
                                            ?>
                                            <?php if(!empty($background_img)): ?>
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb" src="<?php echo e($background_img['img_url']); ?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $background_image_upload_btn_label = 'Change Background Image'; ?>
                                            <?php endif; ?>
                                        </div>
                                        <input type="hidden" name="home_page_01_about_us_video_background_image" value="<?php echo e(get_static_option('home_page_01_about_us_video_background_image')); ?>">
                                        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Background Image')); ?>" data-modaltitle="<?php echo e(__('Upload Background Image')); ?>" data-imgid="<?php echo e(get_static_option('home_page_01_about_us_video_background_image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                            <?php echo e(__($background_image_upload_btn_label)); ?>

                                        </button>
                                    </div>
                                    <small><?php echo e(__('recommended image size is 850x480 pixel')); ?></small>
                                </div>
                            <?php endif; ?>
                            <?php if(get_static_option('home_page_variant') == '02'): ?>
                                <div class="form-group">
                                    <label><?php echo e(__('Background Image')); ?></label>
                                    <?php $background_image_upload_btn_label = 'Upload background Image'; ?>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            <?php
                                                $background_img = get_attachment_image_by_id(get_static_option('home_page_02_about_us_video_background_image'),null,false);
                                            ?>
                                            <?php if(!empty($background_img)): ?>
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb" src="<?php echo e($background_img['img_url']); ?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $background_image_upload_btn_label = 'Change Background Image'; ?>
                                            <?php endif; ?>
                                        </div>
                                        <input type="hidden" name="home_page_02_about_us_video_background_image" value="<?php echo e(get_static_option('home_page_02_about_us_video_background_image')); ?>">
                                        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Background Image')); ?>" data-modaltitle="<?php echo e(__('Upload Background Image')); ?>" data-imgid="<?php echo e(get_static_option('home_page_02_about_us_video_background_image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                            <?php echo e(__($background_image_upload_btn_label)); ?>

                                        </button>
                                    </div>
                                    <small><?php echo e(__('recommended image size is 960x760 pixel')); ?></small>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(__('Signature Image')); ?></label>
                                    <?php $signature_image_upload_btn_label = 'Upload Signature Image'; ?>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            <?php
                                                $signature_img = get_attachment_image_by_id(get_static_option('home_page_02_about_us_signature_image'),null,false);
                                            ?>
                                            <?php if(!empty($signature_img)): ?>
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb" src="<?php echo e($signature_img['img_url']); ?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $signature_image_upload_btn_label = 'Change Signature Image'; ?>
                                            <?php endif; ?>
                                        </div>
                                        <input type="hidden" name="home_page_02_about_us_signature_image" value="<?php echo e(get_static_option('home_page_02_about_us_signature_image')); ?>">
                                        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Signature Image')); ?>" data-modaltitle="<?php echo e(__('Upload Signature Image')); ?>" data-imgid="<?php echo e(get_static_option('home_page_02_about_us_signature_image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                            <?php echo e(__($signature_image_upload_btn_label)); ?>

                                        </button>
                                    </div>
                                    <small><?php echo e(__('recommended image size is 100x50 pixel')); ?></small>
                                </div>
                            <?php endif; ?>
                            <?php if(get_static_option('home_page_variant') == '03'): ?>
                                <div class="form-group">
                                    <label><?php echo e(__('Image 01')); ?></label>
                                    <?php $background_image_upload_btn_label = 'Upload Image'; ?>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            <?php
                                                $background_img = get_attachment_image_by_id(get_static_option('home_page_03_about_us_image_one'),null,false);
                                            ?>
                                            <?php if(!empty($background_img)): ?>
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb" src="<?php echo e($background_img['img_url']); ?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $background_image_upload_btn_label = 'Change Image'; ?>
                                            <?php endif; ?>
                                        </div>
                                        <input type="hidden" name="home_page_03_about_us_image_one" value="<?php echo e(get_static_option('home_page_03_about_us_image_one')); ?>">
                                        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-imgid="<?php echo e(get_static_option('home_page_03_about_us_image_one')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                            <?php echo e(__($background_image_upload_btn_label)); ?>

                                        </button>
                                    </div>
                                    <small><?php echo e(__('recommended image size is 360x480 pixel')); ?></small>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(__('Image 02')); ?></label>
                                    <?php $background_image_upload_btn_label = 'Upload Image'; ?>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            <?php
                                                $background_img = get_attachment_image_by_id(get_static_option('home_page_03_about_us_image_two'),null,false);
                                            ?>
                                            <?php if(!empty($background_img)): ?>
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb" src="<?php echo e($background_img['img_url']); ?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $background_image_upload_btn_label = 'Change Image'; ?>
                                            <?php endif; ?>
                                        </div>
                                        <input type="hidden" name="home_page_03_about_us_image_two" value="<?php echo e(get_static_option('home_page_03_about_us_image_two')); ?>">
                                        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-imgid="<?php echo e(get_static_option('home_page_03_about_us_image_two')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                            <?php echo e(__($background_image_upload_btn_label)); ?>

                                        </button>
                                    </div>
                                    <small><?php echo e(__('recommended image size is 360x480 pixel')); ?></small>
                                </div>
                            <?php endif; ?>
                            <?php if(get_static_option('home_page_variant') == '04'): ?>
                                <div class="form-group">
                                    <label><?php echo e(__('Our Mission Image')); ?></label>
                                    <?php $background_image_upload_btn_label = 'Upload Image'; ?>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            <?php
                                                $background_img = get_attachment_image_by_id(get_static_option('home_page_04_about_us_our_mission_image'),null,false);
                                            ?>
                                            <?php if(!empty($background_img)): ?>
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb" src="<?php echo e($background_img['img_url']); ?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $background_image_upload_btn_label = 'Change Image'; ?>
                                            <?php endif; ?>
                                        </div>
                                        <input type="hidden" name="home_page_04_about_us_our_mission_image" value="<?php echo e(get_static_option('home_page_04_about_us_our_mission_image')); ?>">
                                        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-imgid="<?php echo e(get_static_option('home_page_04_about_us_our_mission_image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                            <?php echo e(__($background_image_upload_btn_label)); ?>

                                        </button>
                                    </div>
                                    <small><?php echo e(__('recommended image size is 480x350 pixel')); ?></small>
                                </div>
                                <div class="form-group">
                                    <label><?php echo e(__('Our Vision Image')); ?></label>
                                    <?php $background_image_upload_btn_label = 'Upload Image'; ?>
                                    <div class="media-upload-btn-wrapper">
                                        <div class="img-wrap">
                                            <?php
                                                $background_img = get_attachment_image_by_id(get_static_option('home_page_04_about_us_our_vision_image'),null,false);
                                            ?>
                                            <?php if(!empty($background_img)): ?>
                                                <div class="attachment-preview">
                                                    <div class="thumbnail">
                                                        <div class="centered">
                                                            <img class="avatar user-thumb" src="<?php echo e($background_img['img_url']); ?>" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <?php $background_image_upload_btn_label = 'Change Image'; ?>
                                            <?php endif; ?>
                                        </div>
                                        <input type="hidden" name="home_page_04_about_us_our_vision_image" value="<?php echo e(get_static_option('home_page_04_about_us_our_vision_image')); ?>">
                                        <button type="button" class="btn btn-info media_upload_form_btn" data-btntitle="<?php echo e(__('Select Image')); ?>" data-modaltitle="<?php echo e(__('Upload Image')); ?>" data-imgid="<?php echo e(get_static_option('home_page_04_about_us_our_vision_image')); ?>" data-toggle="modal" data-target="#media_upload_modal">
                                            <?php echo e(__($background_image_upload_btn_label)); ?>

                                        </button>
                                    </div>
                                    <small><?php echo e(__('recommended image size is 480x350 pixel')); ?></small>
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
    <script src="<?php echo e(asset('assets/backend/js/summernote-bs4.js')); ?>"></script>
    <?php echo $__env->make('backend.partials.media-upload.media-js', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
     <script>
        $(document).ready(function () {

            $('.summernote').summernote({
                height: 400,   //set editable area's height
                codemirror: { // codemirror options
                    theme: 'monokai'
                },
                callbacks: {
                    onChange: function(contents, $editable) {
                        $(this).prev('input').val(contents);
                    }
                }
            });

            if($('.summernote').length > 0){
                $('.summernote').each(function(index,value){
                    $(this).summernote('code', $(this).data('content'));
                });
            }

        });
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('backend.admin-master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /home/webagenc/public_html/cms.primedemos.com/@core/resources/views/backend/pages/home/home-01/about-us.blade.php ENDPATH**/ ?>