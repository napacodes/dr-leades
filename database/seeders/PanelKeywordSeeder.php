<?php

namespace Database\Seeders;

use App\Models\Admin\PanelKeyword;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PanelKeywordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create data
        PanelKeyword::insert([
            [
                'language_id' => 1,
                'key' => 'admin_role_manage',
                'value' => 'Admin Role Manage',
            ],
            [
                'language_id' => 1,
                'key' => 'add_admin_role',
                'value' => 'Add Admin Role',
            ],
            [
                'language_id' => 1,
                'key' => 'role_name',
                'value' => 'Role Name',
            ],
            [
                'language_id' => 1,
                'key' => 'permissions',
                'value' => 'Permissions',
            ],
            [
                'language_id' => 1,
                'key' => 'set_permissions_for_this_role',
                'value' => 'set permissions for this role',
            ],
            [
                'language_id' => 1,
                'key' => 'submit',
                'value' => 'Submit',
            ],
            [
                'language_id' => 1,
                'key' => 'admin_roles',
                'value' => 'Admin Roles',
            ],
            [
                'language_id' => 1,
                'key' => 'has_all_permissions',
                'value' => 'has all permissions',
            ],
            [
                'language_id' => 1,
                'key' => 'action',
                'value' => 'Action',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_admin_role',
                'value' => 'Edit Admin Role',
            ],
            [
                'language_id' => 1,
                'key' => 'admin_manage',
                'value' => 'Admin Manage',
            ],
            [
                'language_id' => 1,
                'key' => 'all_admin',
                'value' => 'All Admin',
            ],
            [
                'language_id' => 1,
                'key' => 'all_admin_created_by_super_admin',
                'value' => 'All Admin Created By Super Admin',
            ],
            [
                'language_id' => 1,
                'key' => 'add_admin_user',
                'value' => 'Add Admin User',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_admin_user',
                'value' => 'Edit Admin User',
            ],
            [
                'language_id' => 1,
                'key' => 'name',
                'value' => 'Name',
            ],
            [
                'language_id' => 1,
                'key' => 'email',
                'value' => 'Email',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_email',
                'value' => 'Edit Email',
            ],
            [
                'language_id' => 1,
                'key' => 'new_password',
                'value' => 'New Password',
            ],
            [
                'language_id' => 1,
                'key' => 'confirm_password',
                'value' => 'Confirm Password',
            ],
            [
                'language_id' => 1,
                'key' => 'image',
                'value' => 'Image',
            ],
            [
                'language_id' => 1,
                'key' => 'size',
                'value' => 'size',
            ],
            [
                'language_id' => 1,
                'key' => 'delete',
                'value' => 'Delete',
            ],
            [
                'language_id' => 1,
                'key' => 'close',
                'value' => 'Close',
            ],
            [
                'language_id' => 1,
                'key' => 'you_wont_be_able_to_revert_this',
                'value' => 'You wont be able to revert this!',
            ],
            [
                'language_id' => 1,
                'key' => 'cancel',
                'value' => 'Cancel',
            ],
            [
                'language_id' => 1,
                'key' => 'yes_delete_it',
                'value' => 'Yes, delete it!',
            ],
            [
                'language_id' => 1,
                'key' => 'success',
                'value' => 'Success',
            ],
            [
                'language_id' => 1,
                'key' => 'warning',
                'value' => 'Warning',
            ],
            [
                'language_id' => 1,
                'key' => 'error',
                'value' => 'Error',
            ],
            [
                'language_id' => 1,
                'key' => 'created_successfully',
                'value' => 'Created Successfully',
            ],
            [
                'language_id' => 1,
                'key' => 'updated_successfully',
                'value' => 'Updated Successfully',
            ],
            [
                'language_id' => 1,
                'key' => 'deleted_successfully',
                'value' => 'Deleted Successfully',
            ],
            [
                'language_id' => 1,
                'key' => 'current_image',
                'value' => 'Current Image',
            ],
            [
                'language_id' => 1,
                'key' => 'dashboard',
                'value' => 'Dashboard',
            ],
            [
                'language_id' => 1,
                'key' => 'uploads',
                'value' => 'Uploads',
            ],
            [
                'language_id' => 1,
                'key' => 'add_photo',
                'value' => 'Add Photo',
            ],
            [
                'language_id' => 1,
                'key' => 'photos',
                'value' => 'Photos',
            ],
            [
                'language_id' => 1,
                'key' => 'order',
                'value' => 'Order',
            ],
            [
                'language_id' => 1,
                'key' => 'copy_image_link',
                'value' => 'Copy Image Link',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_photo',
                'value' => 'Edit Photo',
            ],
            [
                'language_id' => 1,
                'key' => 'title',
                'value' => 'Title',
            ],
            [
                'language_id' => 1,
                'key' => 'description',
                'value' => 'Description',
            ],
            [
                'language_id' => 1,
                'key' => 'please_use_recommended_sizes',
                'value' => 'You do not have to use the recommended sizes. However, please use the recommended sizes for your site design to look its best.',
            ],
            [
                'language_id' => 1,
                'key' => 'image_status',
                'value' => 'Image Status',
            ],
            [
                'language_id' => 1,
                'key' => 'blogs',
                'value' => 'Blogs',
            ],
            [
                'language_id' => 1,
                'key' => 'categories',
                'value' => 'Categories',
            ],
            [
                'language_id' => 1,
                'key' => 'add_category',
                'value' => 'Add Category',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_category',
                'value' => 'Edit Category',
            ],
            [
                'language_id' => 1,
                'key' => 'category_name',
                'value' => 'Category Name',
            ],
            [
                'language_id' => 1,
                'key' => 'please_choose',
                'value' => 'Please choose.',
            ],
            [
                'language_id' => 1,
                'key' => 'please_create_a_category',
                'value' => 'Please create a category.',
            ],
            [
                'language_id' => 1,
                'key' => 'status',
                'value' => 'Status',
            ],
            [
                'language_id' => 1,
                'key' => 'select_your_option',
                'value' => 'Select Your Option',
            ],
            [
                'language_id' => 1,
                'key' => 'not_yet_created',
                'value' => 'Not yet created.',
            ],
            [
                'language_id' => 1,
                'key' => 'category',
                'value' => 'Category',
            ],
            [
                'language_id' => 1,
                'key' => 'post_date',
                'value' => 'Post Date',
            ],
            [
                'language_id' => 1,
                'key' => 'view',
                'value' => 'View',
            ],
            [
                'language_id' => 1,
                'key' => 'add_blog',
                'value' => 'Add Blog',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_blog',
                'value' => 'Edit Blog',
            ],
            [
                'language_id' => 1,
                'key' => 'short_description',
                'value' => 'Short Description',
            ],
            [
                'language_id' => 1,
                'key' => 'tag',
                'value' => 'Tag',
            ],
            [
                'language_id' => 1,
                'key' => 'separate_with_commas',
                'value' => 'Separate with commas',
            ],
            [
                'language_id' => 1,
                'key' => 'author',
                'value' => 'Author',
            ],
            [
                'language_id' => 1,
                'key' => 'with_this_account',
                'value' => 'With this account',
            ],
            [
                'language_id' => 1,
                'key' => 'anonymous',
                'value' => 'Anonymous',
            ],
            [
                'language_id' => 1,
                'key' => 'seo_optimization',
                'value' => 'Seo Optimization',
            ],
            [
                'language_id' => 1,
                'key' => 'meta_title',
                'value' => 'Meta Title',
            ],
            [
                'language_id' => 1,
                'key' => 'meta_description',
                'value' => 'Meta Description',
            ],
            [
                'language_id' => 1,
                'key' => 'meta_keyword',
                'value' => 'Meta Keyword',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_breadcrumb',
                'value' => 'Edit Breadcrumb',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_breadcrumb_and_page_seo',
                'value' => 'Edit Breadcrumb and Page Seo',
            ],
            [
                'language_id' => 1,
                'key' => 'breadcrumb_customization',
                'value' => 'Breadcrumb Customization',
            ],
            [
                'language_id' => 1,
                'key' => 'use_special_breadcrumb',
                'value' => 'Do you want to use special breadcrumb for the page?',
            ],
            [
                'language_id' => 1,
                'key' => 'yes',
                'value' => 'Yes',
            ],
            [
                'language_id' => 1,
                'key' => 'no',
                'value' => 'No',
            ],
            [
                'language_id' => 1,
                'key' => 'custom_breadcrumb_image',
                'value' => 'Custom Breadcrumb Image',
            ],
            [
                'language_id' => 1,
                'key' => 'published',
                'value' => 'Published',
            ],
            [
                'language_id' => 1,
                'key' => 'draft',
                'value' => 'Draft',
            ],
            [
                'language_id' => 1,
                'key' => 'section_item',
                'value' => 'Section Item',
            ],
            [
                'language_id' => 1,
                'key' => 'paginate_item',
                'value' => 'Paginate Item',
            ],
            [
                'language_id' => 1,
                'key' => 'section_title',
                'value' => 'Section Title',
            ],
            [
                'language_id' => 1,
                'key' => 'section_title_and_description',
                'value' => 'Section Title/Description',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_section_title_description',
                'value' => 'Edit Section Title/Description',
            ],
            [
                'language_id' => 1,
                'key' => 'add_new',
                'value' => 'Add New',
            ],
            [
                'language_id' => 1,
                'key' => 'page_builder',
                'value' => 'Page Builder',
            ],
            [
                'language_id' => 1,
                'key' => 'page_names',
                'value' => 'Page Names',
            ],
            [
                'language_id' => 1,
                'key' => 'page_name',
                'value' => 'Page Name',
            ],
            [
                'language_id' => 1,
                'key' => 'is_default',
                'value' => 'Is Default',
            ],
            [
                'language_id' => 1,
                'key' => 'add_page_name',
                'value' => 'Add Page Name',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_page_name',
                'value' => 'Edit Page Name',
            ],
            [
                'language_id' => 1,
                'key' => 'pages',
                'value' => 'Pages',
            ],
            [
                'language_id' => 1,
                'key' => 'page_uri',
                'value' => 'Page Uri',
            ],
            [
                'language_id' => 1,
                'key' => 'add_page',
                'value' => 'Add Page',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_page',
                'value' => 'Edit Page',
            ],
            [
                'language_id' => 1,
                'key' => 'example',
                'value' => 'Example: ',
            ],
            [
                'language_id' => 1,
                'key' => '1_segment_usage',
                'value' => '1 Segment Usage ->',
            ],
            [
                'language_id' => 1,
                'key' => '2_segment_usage',
                'value' => '2 Segment Usage ->',
            ],
            [
                'language_id' => 1,
                'key' => 'please_base_on_the_count_of_segments',
                'value' => 'Please base on the count of segments.',
            ],
            [
                'language_id' => 1,
                'key' => 'sections',
                'value' => 'Sections',
            ],
            [
                'language_id' => 1,
                'key' => 'updated_page_sections',
                'value' => 'Updated page sections',
            ],
            [
                'language_id' => 1,
                'key' => 'return_to_default_page_settings',
                'value' => 'Return to default page settings',
            ],
            [
                'language_id' => 1,
                'key' => 'yes_apply',
                'value' => 'Yes apply!',
            ],
            [
                'language_id' => 1,
                'key' => 'update',
                'value' => 'Update',
            ],
            [
                'language_id' => 1,
                'key' => 'breadcrumb_title',
                'value' => 'Breadcrumb Title',
            ],
            [
                'language_id' => 1,
                'key' => 'breadcrumb_item',
                'value' => 'Breadcrumb Item',
            ],
            [
                'language_id' => 1,
                'key' => 'page_builder_is_not_available_on_this_page',
                'value' => 'Page builder is not available on this page.',
            ],
            [
                'language_id' => 1,
                'key' => 'menus',
                'value' => 'Menus',
            ],
            [
                'language_id' => 1,
                'key' => 'menu',
                'value' => 'Menu',
            ],
            [
                'language_id' => 1,
                'key' => 'menu_name',
                'value' => 'Menu Name',
            ],
            [
                'language_id' => 1,
                'key' => 'add_menu_name',
                'value' => 'Add Menu Name',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_menu_name',
                'value' => 'Edit Menu Name',
            ],
            [
                'language_id' => 1,
                'key' => 'pages_within_the_site',
                'value' => 'Pages within the site',
            ],
            [
                'language_id' => 1,
                'key' => 'empty',
                'value' => 'Empty',
            ],
            [
                'language_id' => 1,
                'key' => 'to_use_the_url_enter_empty_in_this_field',
                'value' => 'To use the url enter empty in this field.',
            ],
            [
                'language_id' => 1,
                'key' => 'uri',
                'value' => 'Uri',
            ],
            [
                'language_id' => 1,
                'key' => 'url',
                'value' => 'Url',
            ],
            [
                'language_id' => 1,
                'key' => 'submenu',
                'value' => 'Submenu',
            ],
            [
                'language_id' => 1,
                'key' => 'submenu_name',
                'value' => 'Submenu Name',
            ],
            [
                'language_id' => 1,
                'key' => 'add_submenu',
                'value' => 'Add Submenu',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_submenu',
                'value' => 'Edit Submenu',
            ],
            [
                'language_id' => 1,
                'key' => 'reset',
                'value' => 'Reset',
            ],
            [
                'language_id' => 1,
                'key' => 'youtube_video_url',
                'value' => 'Youtube Video Url',
            ],
            [
                'language_id' => 1,
                'key' => 'pdf',
                'value' => 'pdf',
            ],
            [
                'language_id' => 1,
                'key' => 'history',
                'value' => 'History',
            ],
            [
                'language_id' => 1,
                'key' => 'add_history',
                'value' => 'Add History',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_history',
                'value' => 'Edit History',
            ],
            [
                'language_id' => 1,
                'key' => 'history_date',
                'value' => 'History Date',
            ],
            [
                'language_id' => 1,
                'key' => 'why_choose',
                'value' => 'Why Choose',
            ],
            [
                'language_id' => 1,
                'key' => 'add_why_choose',
                'value' => 'Add Why Choose',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_why_choose',
                'value' => 'Edit Why Choose',
            ],
            [
                'language_id' => 1,
                'key' => 'percent_rate',
                'value' => 'Percent Rate',
            ],
            [
                'language_id' => 1,
                'key' => 'sponsors',
                'value' => 'Sponsors',
            ],
            [
                'language_id' => 1,
                'key' => 'add_sponsor',
                'value' => 'Add Sponsor',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_sponsor',
                'value' => 'Edit Sponsor',
            ],
            [
                'language_id' => 1,
                'key' => 'video',
                'value' => 'Video',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_video',
                'value' => 'Edit Video',
            ],
            [
                'language_id' => 1,
                'key' => 'careers',
                'value' => 'Careers',
            ],
            [
                'language_id' => 1,
                'key' => 'add_career',
                'value' => 'Add Career',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_career',
                'value' => 'Edit Career',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_career_content',
                'value' => 'Edit Career Content',
            ],
            [
                'language_id' => 1,
                'key' => 'banner',
                'value' => 'Banner',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_banner',
                'value' => 'Edit Banner',
            ],
            [
                'language_id' => 1,
                'key' => 'features',
                'value' => 'Features',
            ],
            [
                'language_id' => 1,
                'key' => 'add_feature',
                'value' => 'Add Feature',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_feature',
                'value' => 'Edit Feature',
            ],
            [
                'language_id' => 1,
                'key' => 'type',
                'value' => 'Type',
            ],
            [
                'language_id' => 1,
                'key' => 'icon',
                'value' => 'Icon',
            ],
            [
                'language_id' => 1,
                'key' => 'back',
                'value' => 'Back',
            ],
            [
                'language_id' => 1,
                'key' => 'about',
                'value' => 'About',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_about',
                'value' => 'Edit About',
            ],
            [
                'language_id' => 1,
                'key' => 'button_name',
                'value' => 'Button Name',
            ],
            [
                'language_id' => 1,
                'key' => 'button_url',
                'value' => 'Button Url',
            ],
            [
                'language_id' => 1,
                'key' => 'button_name_2',
                'value' => 'Button Name 2',
            ],
            [
                'language_id' => 1,
                'key' => 'button_url_2',
                'value' => 'Button Url 2',
            ],
            [
                'language_id' => 1,
                'key' => 'recommended_tags',
                'value' => 'Recommended tags',
            ],
            [
                'language_id' => 1,
                'key' => 'subtitle',
                'value' => 'Subtitle',
            ],
            [
                'language_id' => 1,
                'key' => 'price',
                'value' => 'Price',
            ],
            [
                'language_id' => 1,
                'key' => 'work_process',
                'value' => 'Work Process',
            ],
            [
                'language_id' => 1,
                'key' => 'add_work_process',
                'value' => 'Add Work Process',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_work_process',
                'value' => 'Edit Work Process',
            ],
            [
                'language_id' => 1,
                'key' => 'testimonials',
                'value' => 'Testimonials',
            ],
            [
                'language_id' => 1,
                'key' => 'add_testimonial',
                'value' => 'Add Testimonial',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_testimonial',
                'value' => 'Edit Testimonial',
            ],
            [
                'language_id' => 1,
                'key' => 'job',
                'value' => 'Job',
            ],
            [
                'language_id' => 1,
                'key' => 'star',
                'value' => 'Star',
            ],
            [
                'language_id' => 1,
                'key' => 'faqs',
                'value' => 'Faqs',
            ],
            [
                'language_id' => 1,
                'key' => 'add_faq',
                'value' => 'Add Faq',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_faq',
                'value' => 'Edit Faq',
            ],
            [
                'language_id' => 1,
                'key' => 'answer',
                'value' => 'Answer',
            ],
            [
                'language_id' => 1,
                'key' => 'question',
                'value' => 'Question',
            ],
            [
                'language_id' => 1,
                'key' => 'plan',
                'value' => 'Plan',
            ],
            [
                'language_id' => 1,
                'key' => 'add_plan',
                'value' => 'Add Plan',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_plan',
                'value' => 'Edit Plan',
            ],
            [
                'language_id' => 1,
                'key' => 'currency',
                'value' => 'Currency',
            ],
            [
                'language_id' => 1,
                'key' => 'extra_text',
                'value' => 'Extra Text',
            ],
            [
                'language_id' => 1,
                'key' => 'feature_list',
                'value' => 'Feature List',
            ],
            [
                'language_id' => 1,
                'key' => 'non_feature_list',
                'value' => 'Non Feature List',
            ],
            [
                'language_id' => 1,
                'key' => 'recommended',
                'value' => 'Recommended',
            ],
            [
                'language_id' => 1,
                'key' => 'teams',
                'value' => 'Teams',
            ],
            [
                'language_id' => 1,
                'key' => 'add_team',
                'value' => 'Add Team',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_team',
                'value' => 'Edit Team',
            ],
            [
                'language_id' => 1,
                'key' => 'subscribe',
                'value' => 'Subscribe',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_subscribe',
                'value' => 'Edit Subscribe',
            ],
            [
                'language_id' => 1,
                'key' => 'call_to_action',
                'value' => 'Call To Action',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_call_to_action',
                'value' => 'Edit Call To Action',
            ],
            [
                'language_id' => 1,
                'key' => 'contact_info',
                'value' => 'Contact Info',
            ],
            [
                'language_id' => 1,
                'key' => 'add_contact_info',
                'value' => 'Add Contact Info',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_contact_info',
                'value' => 'Edit Contact Info',
            ],
            [
                'language_id' => 1,
                'key' => 'contact',
                'value' => 'Contact',
            ],
            [
                'language_id' => 1,
                'key' => 'map',
                'value' => 'Map',
            ],
            [
                'language_id' => 1,
                'key' => 'map_iframe',
                'value' => 'Map Iframe (link in src)',
            ],
            [
                'language_id' => 1,
                'key' => 'map_iframe_desc_placeholder',
                'value' => 'Please find your address on Google Map. And click the Share Button on the Left Side. You will see the Map Placement Area. In the Copy Html field in this section Copy and paste the link in the src from the code inside.',
            ],
            [
                'language_id' => 1,
                'key' => 'footer',
                'value' => 'Footer',
            ],
            [
                'language_id' => 1,
                'key' => 'add_footer',
                'value' => 'Add Footer',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_footer',
                'value' => 'Edit Footer',
            ],
            [
                'language_id' => 1,
                'key' => 'add_footer_category',
                'value' => 'Add Footer Category',
            ],
            [
                'language_id' => 1,
                'key' => 'services',
                'value' => 'Services',
            ],
            [
                'language_id' => 1,
                'key' => 'add_service',
                'value' => 'Add Service',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_service',
                'value' => 'Edit Service',
            ],
            [
                'language_id' => 1,
                'key' => 'additional_features',
                'value' => 'Additional Features',
            ],
            [
                'language_id' => 1,
                'key' => 'portfolio',
                'value' => 'Portfolio',
            ],
            [
                'language_id' => 1,
                'key' => 'add_portfolio',
                'value' => 'Add Portfolio',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_portfolio',
                'value' => 'Edit Portfolio',
            ],
            [
                'language_id' => 1,
                'key' => 'thumbnail',
                'value' => 'Thumbnail',
            ],
            [
                'language_id' => 1,
                'key' => 'portfolio_images',
                'value' => 'Portfolio Images',
            ],
            [
                'language_id' => 1,
                'key' => 'add_image',
                'value' => 'Add Image',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_image',
                'value' => 'Edit Image',
            ],
            [
                'language_id' => 1,
                'key' => 'details',
                'value' => 'Details',
            ],
            [
                'language_id' => 1,
                'key' => 'add_detail',
                'value' => 'Add Detail',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_detail',
                'value' => 'Edit Detail',
            ],
            [
                'language_id' => 1,
                'key' => 'gallery',
                'value' => 'Gallery',
            ],
            [
                'language_id' => 1,
                'key' => 'add_gallery',
                'value' => 'Add Gallery',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_gallery',
                'value' => 'Edit Gallery',
            ],
            [
                'language_id' => 1,
                'key' => 'settings',
                'value' => 'Settings',
            ],
            [
                'language_id' => 1,
                'key' => 'preloader',
                'value' => 'Preloader',
            ],
            [
                'language_id' => 1,
                'key' => 'favicon',
                'value' => 'Favicon',
            ],
            [
                'language_id' => 1,
                'key' => 'header_info',
                'value' => 'Header Info',
            ],
            [
                'language_id' => 1,
                'key' => 'header_image',
                'value' => 'Header Image',
            ],
            [
                'language_id' => 1,
                'key' => 'footer_image',
                'value' => 'Footer Image',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_footer_image',
                'value' => 'Edit Footer Image',
            ],
            [
                'language_id' => 1,
                'key' => 'panel_image',
                'value' => 'Panel Image',
            ],
            [
                'language_id' => 1,
                'key' => 'admin_logo',
                'value' => 'Admin Logo',
            ],
            [
                'language_id' => 1,
                'key' => 'admin_small_logo',
                'value' => 'Admin Small Logo',
            ],
            [
                'language_id' => 1,
                'key' => 'external_url',
                'value' => 'External Url',
            ],
            [
                'language_id' => 1,
                'key' => 'contact_info_widget',
                'value' => 'Contact Info Widget',
            ],
            [
                'language_id' => 1,
                'key' => 'breadcrumb_image',
                'value' => 'Breadcrumb Image',
            ],
            [
                'language_id' => 1,
                'key' => 'site_info',
                'value' => 'Site Info',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_site_info',
                'value' => 'Edit Site Info',
            ],
            [
                'language_id' => 1,
                'key' => 'copyright',
                'value' => 'Copyright',
            ],
            [
                'language_id' => 1,
                'key' => 'socials',
                'value' => 'Socials',
            ],
            [
                'language_id' => 1,
                'key' => 'add_social',
                'value' => 'Add Social',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_social',
                'value' => 'Edit Social',
            ],
            [
                'language_id' => 1,
                'key' => 'google_analytic',
                'value' => 'Google Analytic',
            ],
            [
                'language_id' => 1,
                'key' => 'font',
                'value' => 'Font',
            ],
            [
                'language_id' => 1,
                'key' => 'draft_view',
                'value' => 'Draft View',
            ],
            [
                'language_id' => 1,
                'key' => 'tawk_to',
                'value' => 'Tawk to',
            ],
            [
                'language_id' => 1,
                'key' => 'quick_access_buttons',
                'value' => 'Quick Access Buttons',
            ],
            [
                'language_id' => 1,
                'key' => 'side_buttons',
                'value' => 'Side Buttons',
            ],
            [
                'language_id' => 1,
                'key' => 'email_or_whatsapp',
                'value' => 'Email or Whatsapp',
            ],
            [
                'language_id' => 1,
                'key' => 'enable',
                'value' => 'Enable',
            ],
            [
                'language_id' => 1,
                'key' => 'disable',
                'value' => 'Disable',
            ],
            [
                'language_id' => 1,
                'key' => 'bottom_buttons',
                'value' => 'Bottom Buttons',
            ],
            [
                'language_id' => 1,
                'key' => 'whatsapp',
                'value' => 'Whatsapp',
            ],
            [
                'language_id' => 1,
                'key' => 'color_option',
                'value' => 'Color Option',
            ],
            [
                'language_id' => 1,
                'key' => 'ready_color_option',
                'value' => 'Ready Color Option',
            ],
            [
                'language_id' => 1,
                'key' => 'customize_color',
                'value' => 'Customize Color',
            ],
            [
                'language_id' => 1,
                'key' => 'main_color',
                'value' => 'Main Color',
            ],
            [
                'language_id' => 1,
                'key' => 'secondary_color',
                'value' => 'Secondary Color',
            ],
            [
                'language_id' => 1,
                'key' => 'scroll_button_color',
                'value' => 'Scroll Button Color',
            ],
            [
                'language_id' => 1,
                'key' => 'bottom_button_color',
                'value' => 'Bottom Button Color',
            ],
            [
                'language_id' => 1,
                'key' => 'bottom_button_hover_color',
                'value' => 'Bottom Button Hover Color',
            ],
            [
                'language_id' => 1,
                'key' => 'side_button_color',
                'value' => 'Side Button Color',
            ],
            [
                'language_id' => 1,
                'key' => 'for_pages_without_page_builder',
                'value' => 'for pages without page builder',
            ],
            [
                'language_id' => 1,
                'key' => 'subscribe_section',
                'value' => 'Subscribe Section',
            ],
            [
                'language_id' => 1,
                'key' => 'you_can_see_this_section_on_some_pages_that_do_not_have_a_page_builder',
                'value' => 'You can see this section on some pages that do not have a page builder',
            ],
            [
                'language_id' => 1,
                'key' => 'recent_portfolio_section',
                'value' => 'Recent Portfolio Section',
            ],
            [
                'language_id' => 1,
                'key' => 'messages',
                'value' => 'Messages',
            ],
            [
                'language_id' => 1,
                'key' => 'mark_all_as_read',
                'value' => 'Mark All As Read',
            ],
            [
                'language_id' => 1,
                'key' => 'phone',
                'value' => 'Phone',
            ],
            [
                'language_id' => 1,
                'key' => 'message',
                'value' => 'Message',
            ],
            [
                'language_id' => 1,
                'key' => 'read_status',
                'value' => 'Read Status',
            ],
            [
                'language_id' => 1,
                'key' => 'read',
                'value' => 'Read',
            ],
            [
                'language_id' => 1,
                'key' => 'unread',
                'value' => 'Unread',
            ],
            [
                'language_id' => 1,
                'key' => 'mark',
                'value' => 'Mark',
            ],


            [
                'language_id' => 1,
                'key' => 'seo',
                'value' => 'Seo',
            ],
            [
                'language_id' => 1,
                'key' => 'languages',
                'value' => 'Languages',
            ],
            [
                'language_id' => 1,
                'key' => 'default_site_language',
                'value' => 'Default Site Language',
            ],
            [
                'language_id' => 1,
                'key' => 'add_language',
                'value' => 'Add Language',
            ],
            [
                'language_id' => 1,
                'key' => 'language_name',
                'value' => 'Language Name',
            ],
            [
                'language_id' => 1,
                'key' => 'language_code',
                'value' => 'Language Code',
            ],
            [
                'language_id' => 1,
                'key' => 'direction',
                'value' => 'Direction',
            ],
            [
                'language_id' => 1,
                'key' => 'display_dropdown',
                'value' => 'Display Dropdown?',
            ],
            [
                'language_id' => 1,
                'key' => 'show',
                'value' => 'Show',
            ],
            [
                'language_id' => 1,
                'key' => 'hide',
                'value' => 'Hide',
            ],
            [
                'language_id' => 1,
                'key' => 'keywords',
                'value' => 'Keywords',
            ],
            [
                'language_id' => 1,
                'key' => 'for_admin_panel',
                'value' => 'For Admin Panel',
            ],
            [
                'language_id' => 1,
                'key' => 'for_frontend',
                'value' => 'For Frontend',
            ],
            [
                'language_id' => 1,
                'key' => 'profile',
                'value' => 'Profile',
            ],
            [
                'language_id' => 1,
                'key' => 'change_password',
                'value' => 'Change Password',
            ],
            [
                'language_id' => 1,
                'key' => 'current_password',
                'value' => 'Current Password',
            ],
            [
                'language_id' => 1,
                'key' => 'pending_approval',
                'value' => 'Pending Approval',
            ],
            [
                'language_id' => 1,
                'key' => 'approval',
                'value' => 'Approval',
            ],
            [
                'language_id' => 1,
                'key' => 'data_language',
                'value' => 'Data Language',
            ],
            [
                'language_id' => 1,
                'key' => 'which_language',
                'value' => 'Which language do you want to create the data?',
            ],
            [
                'language_id' => 1,
                'key' => 'reminding',
                'value' => 'Please note that all the entries you create will be based on your chosen language.',
            ],
            [
                'language_id' => 1,
                'key' => 'notifications',
                'value' => 'Notifications',
            ],
            [
                'language_id' => 1,
                'key' => 'logout',
                'value' => 'Logout',
            ],
            [
                'language_id' => 1,
                'key' => 'optimizer',
                'value' => 'Optimizer',
            ],
            [
                'language_id' => 1,
                'key' => 'required_fields',
                'value' => 'Fields marked are required',
            ],
            [
                'language_id' => 1,
                'key' => 'site',
                'value' => 'Site',
            ],
            [
                'language_id' => 1,
                'key' => 'add_keyword',
                'value' => 'Add Keyword',
            ],
            [
                'language_id' => 1,
                'key' => 'key',
                'value' => 'Key',
            ],
            [
                'language_id' => 1,
                'key' => 'value',
                'value' => 'Value',
            ],
            [
                'language_id' => 1,
                'key' => 'delete_selected',
                'value' => 'Delete selected?',
            ],
            [
                'language_id' => 1,
                'key' => 'comments',
                'value' => 'Comments',
            ],
            [
                'language_id' => 1,
                'key' => 'all',
                'value' => 'All',
            ],
            [
                'language_id' => 1,
                'key' => 'logo',
                'value' => 'Logo',
            ],
            [
                'language_id' => 1,
                'key' => 'see_edit',
                'value' => 'See Edit',
            ],
            [
                'language_id' => 1,
                'key' => 'subscribers',
                'value' => 'Subscribers',
            ],
            [
                'language_id' => 1,
                'key' => 'add_subscriber',
                'value' => 'Add Subscriber',
            ],
            [
                'language_id' => 1,
                'key' => 'default_page',
                'value' => 'Default Page',
            ],
            [
                'language_id' => 1,
                'key' => 'custom_page',
                'value' => 'Custom Page',
            ],
            [
                'language_id' => 1,
                'key' => 'language',
                'value' => 'Language',
            ],
            [
                'language_id' => 1,
                'key' => 'video_type',
                'value' => 'Video Type',
            ],
            [
                'language_id' => 1,
                'key' => 'youtube',
                'value' => 'Youtube',
            ],
            [
                'language_id' => 1,
                'key' => 'other',
                'value' => 'Other',
            ],
            [
                'language_id' => 1,
                'key' => 'video_url',
                'value' => 'Video Url',
            ],
            [
                'language_id' => 1,
                'key' => 'add_more',
                'value' => 'Add More',
            ],
            [
                'language_id' => 1,
                'key' => 'add_counter',
                'value' => 'Add Counter',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_counter',
                'value' => 'Edit Counter',
            ],
            [
                'language_id' => 1,
                'key' => 'counters',
                'value' => 'Counters',
            ],
            [
                'language_id' => 1,
                'key' => 'timer',
                'value' => 'Timer',
            ],
            [
                'language_id' => 1,
                'key' => 'item',
                'value' => 'Item',
            ],
            [
                'language_id' => 1,
                'key' => 'segment_count',
                'value' => 'Segment Count: ',
            ],
            [
                'language_id' => 1,
                'key' => 'select',
                'value' => 'Select',
            ],
            [
                'language_id' => 1,
                'key' => 'when_you_leave_this_section_blank_it_will_go_to_its_own_detail_page',
                'value' => 'When you leave this section blank it will go to its own detail page.',
            ],
            [
                'language_id' => 1,
                'key' => 'address',
                'value' => 'Address',
            ],
            [
                'language_id' => 1,
                'key' => 'working_hour',
                'value' => 'Working Hour',
            ],
            [
                'language_id' => 1,
                'key' => 'facebook_url',
                'value' => 'Facebook Url',
            ],
            [
                'language_id' => 1,
                'key' => 'twitter_url',
                'value' => 'Twitter Url',
            ],
            [
                'language_id' => 1,
                'key' => 'instagram_url',
                'value' => 'Instagram Url',
            ],
            [
                'language_id' => 1,
                'key' => 'youtube_url',
                'value' => 'Youtube Url',
            ],
            [
                'language_id' => 1,
                'key' => 'linkedin_url',
                'value' => 'Linkedin Url',
            ],
            [
                'language_id' => 1,
                'key' => 'copied_text',
                'value' => 'Copied Text',
            ],
            [
                'language_id' => 1,
                'key' => 'copy_url',
                'value' => 'Copy Url',
            ],
            [
                'language_id' => 1,
                'key' => 'the_transaction_is_invalid',
                'value' => 'The transaction is invalid.',
            ],
            [
                'language_id' => 1,
                'key' => 'fixed_page_setting ',
                'value' => 'Fixed Page Setting',
            ],
            [
                'language_id' => 1,
                'key' => 'touch',
                'value' => 'Touch',
            ],
            [
                'language_id' => 1,
                'key' => 'you_can_also_activate_the_breadcrumb_image_for_all_pages_from_here',
                'value' => 'You can also activate the breadcrumb image for all pages from here.',
            ],
            [
                'language_id' => 1,
                'key' => 'service_content',
                'value' => 'Service Content',
            ],
            [
                'language_id' => 1,
                'key' => 'service_info',
                'value' => 'Service Info',
            ],
            [
                'language_id' => 1,
                'key' => 'service_features',
                'value' => 'Service Features',
            ],
            [
                'language_id' => 1,
                'key' => 'add_service_feature',
                'value' => 'Add Service Feature',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_service_feature',
                'value' => 'Edit Service Feature',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_breadcrumb_and_seo',
                'value' => 'Edit Breadcrumb and Seo',
            ],
            [
                'language_id' => 1,
                'key' => 'page_url_copied',
                'value' => 'Page Url Copied',
            ],
            [
                'language_id' => 1,
                'key' => 'portfolio_content',
                'value' => 'Portfolio Content',
            ],
            [
                'language_id' => 1,
                'key' => 'portfolio_details',
                'value' => 'Portfolio Details',
            ],
            [
                'language_id' => 1,
                'key' => 'add_portfolio_detail',
                'value' => 'Add Portfolio Detail',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_portfolio_detail',
                'value' => 'Edit Portfolio Detail',
            ],
            [
                'language_id' => 1,
                'key' => 'add_portfolio_image',
                'value' => 'Add Portfolio Image',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_portfolio_image',
                'value' => 'Edit Portfolio Image',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_portfolio_content',
                'value' => 'Edit Portfolio Content',
            ],
            [
                'language_id' => 1,
                'key' => 'company_title',
                'value' => 'Company Title',
            ],
            [
                'language_id' => 1,
                'key' => 'company_description',
                'value' => 'Company Description',
            ],
            [
                'language_id' => 1,
                'key' => 'company_contact_title',
                'value' => 'Company Contact Title',
            ],
            [
                'language_id' => 1,
                'key' => 'career_content',
                'value' => 'Career Content',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_map',
                'value' => 'Edit Map',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_service_content',
                'value' => 'Edit Service Content',
            ],
            [
                'language_id' => 1,
                'key' => 'edit_service_info',
                'value' => 'Edit Service Info',
            ],
            [
                'language_id' => 1,
                'key' => 'move',
                'value' => 'Move',
            ],
            [
                'language_id' => 1,
                'key' => 'style1',
                'value' => 'style 1',
            ],
            [
                'language_id' => 1,
                'key' => 'style2',
                'value' => 'style 2',
            ],
            [
                'language_id' => 1,
                'key' => 'style3',
                'value' => 'style 3',
            ],
            [
                'language_id' => 1,
                'key' => 'style4',
                'value' => 'style 4',
            ]

        ]);
    }
}
