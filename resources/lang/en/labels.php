<?php

return [

   /*
   |--------------------------------------------------------------------------
   | Labels Language Lines
   |--------------------------------------------------------------------------
   |
   | The following language lines are used in labels throughout the system.
   | Regardless where it is placed, a label can be listed here so it is easily
   | found in a intuitive way.
   |
   */

   'general' => [
      'all'     => 'All',
      'yes'     => 'Yes',
      'no'      => 'No',
      'custom'  => 'Custom',
      'actions' => 'Actions',
      'active'  => 'Active',
      'buttons' => [
         'save'   => 'Save',
         'update' => 'Update',
      ],
      'hide'              => 'Hide',
      'inactive'          => 'Inactive',
      'none'              => 'None',
      'show'              => 'Show',
      'toggle_navigation' => 'Toggle Navigation',
   ],

   'backend' => [
      'management'   => [
         'leads'  => [
            'title'        => 'Leads Management',
            'view'         => 'View :lead Lead',
            'view_title'   => 'View Lead',
            'edit'         => 'Edit :lead',
            'edit_title'   => 'Edit Lead',

            'availables'   => 'Leads Available',
            'create'       => 'Create Leads',
            'deleted'      => 'View Deleted Leads',

            'id'                       => 'ID',
            'name'                     => 'Name',
            'company_name'             => 'Company Name',
            'appointment_schedule'     => 'Appointed Schedule',
            'date_contacted'           => 'Date Contacted',
            'disposition'              => 'Disposition',
            'note'                     => 'Note',
            'reminder'                 => 'Reminder',
            'phone_number'             => 'Phone Number',
            'mobile_number'            => 'Mobile Number',
            'nature_of_business'       => 'Nature of Business',
            'overall_assessment'       => 'Overall Assessment',
            'additional_information'   => 'Additional Information',
            'created_at'               => 'Date Added',
            'updated_at'               => 'Last Update',

            'table'  => [
               'id'                       => 'ID',
               'name'                     => 'Name',
               'company_name'             => 'Company Name',
               'contact_person'           => 'Contact Person',
               'email'                    => 'E-mail',
               'phone_number'             => 'Phone Number',
               'mobile_number'            => 'Mobile Number',
               'appointment_schedule'     => 'Appointed Schedule',
               'date_contacted'           => 'Date Contacted',
               'disposition'              => 'Disposition',
               'note'                     => 'Note',
               'reminder'                 => 'Reminder',
               'nature_of_business'       => 'Nature of Business',
               'overall_assessment'       => 'Overall Assessment',
               'additional_information'   => 'Additional Information',
               'created_at'               => 'Date Added',
               'updated_at'               => 'Last Update',
            ],

            'tabs'   => [
               'titles'  => [
                  'overview'  => 'Overview',
                  'history'   => 'History',
               ],

               'overview'  => [
                  'id'                       => 'ID',
                  'name'                     => 'Name',
                  'company_name'             => 'Company Name',
                  'appointment_schedule'     => 'Appointed Schedule',
                  'date_contacted'           => 'Date Contacted',
                  'disposition'              => 'Disposition',
                  'note'                     => 'Note',
                  'reminder'                 => 'Reminder',
                  'phone_number'             => 'Phone Number',
                  'mobile_number'            => 'Mobile Number',
                  'nature_of_business'       => 'Nature of Business',
                  'overall_assessment'       => 'Overall Assessment',
                  'additional_information'   => 'Additional Information',
                  'created_at'               => 'Date Added',
                  'updated_at'               => 'Last Update',
               ]
            ],
         ],

         'call_dispositions'  => [
            'title'        => 'Call Dispositions Management',
            'view'         => 'View :call_disposition Call Disposition',
            'view_title'   => 'View Call Disposition',
            'edit'         => 'Edit :call_disposition',
            'edit_title'   => 'Edit Lead',

            'availables'   => 'Call Dispositions Available',
            'create'       => 'Create Call Dispositions',
            'deleted'      => 'View Deleted Call Dispositions',

            'availables'   => 'Call Disposition Available',
            'create'       => 'Create Call Disposition',
            'deleted'      => 'View Deleted Call Disposition',

            'id'           => 'ID',
            'name'         => 'Name',
            'description'  => 'Description',
            'created_at'   => 'Date Created',
            'updated_at'   => 'Last Updated',

            'table'        => [
               'id'           => 'ID',
               'name'         => 'Name',
               'description'  => 'Description',
               'created_at'   => 'Date Created',
               'updated_at'   => 'Last Updated',
            ],

            'tabs'   => [
               'titles'  => [
                  'overview'  => 'Overview',
                  'history'   => 'History',
               ],

               'overview'  => [
                  'id'              => 'ID',
                  'name'            => 'Name',
                  'description'     => 'Description',
                  'created_at'      => 'Date Added',
                  'updated_at'      => 'Last Update',
               ]
            ],
         ]
      ],

      'access' => [
         'roles' => [
            'create'     => 'Create Role',
            'edit'       => 'Edit Role',
            'management' => 'Role Management',

            'table' => [
               'number_of_users' => 'Number of Users',
               'permissions'     => 'Permissions',
               'role'            => 'Role',
               'sort'            => 'Sort',
               'total'           => 'role total|roles total',
            ],
         ],

         'users' => [
            'active'              => 'Active Users',
            'all_permissions'     => 'All Permissions',
            'change_password'     => 'Change Password',
            'change_password_for' => 'Change Password for :user',
            'create'              => 'Create User',
            'deactivated'         => 'Deactivated Users',
            'deleted'             => 'Deleted Users',
            'edit'                => 'Edit User',
            'management'          => 'User Management',
            'no_permissions'      => 'No Permissions',
            'no_roles'            => 'No Roles to set.',
            'permissions'         => 'Permissions',

            'table' => [
               'confirmed'      => 'Confirmed',
               'created'        => 'Created',
               'email'          => 'E-mail',
               'id'             => 'ID',
               'last_updated'   => 'Last Updated',
               'name'           => 'Name',
               'first_name'     => 'First Name',
               'last_name'      => 'Last Name',
               'no_deactivated' => 'No Deactivated Users',
               'no_deleted'     => 'No Deleted Users',
               'roles'          => 'Roles',
               'social' => 'Social',
               'total'          => 'user total|users total',
            ],

            'tabs' => [
               'titles' => [
                  'overview' => 'Overview',
                  'history'  => 'History',
               ],

               'content' => [
                  'overview' => [
                     'avatar'       => 'Avatar',
                     'confirmed'    => 'Confirmed',
                     'created_at'   => 'Created At',
                     'deleted_at'   => 'Deleted At',
                     'email'        => 'E-mail',
                     'last_updated' => 'Last Updated',
                     'name'         => 'Name',
                     'first_name'   => 'First Name',
                     'last_name'    => 'Last Name',
                     'status'       => 'Status',
                  ],
               ],
            ],

            'view' => 'View User',
         ],
      ],
   ],

   'frontend' => [

      'auth' => [
         'login_box_title'    => 'Login',
         'login_button'       => 'Login',
         'login_with'         => 'Login with :social_media',
         'register_box_title' => 'Register',
         'register_button'    => 'Register',
         'remember_me'        => 'Remember Me',
      ],

      'contact' => [
         'box_title' => 'Contact Us',
         'button' => 'Send Information',
      ],

      'passwords' => [
         'forgot_password'                 => 'Forgot Your Password?',
         'reset_password_box_title'        => 'Reset Password',
         'reset_password_button'           => 'Reset Password',
         'send_password_reset_link_button' => 'Send Password Reset Link',
      ],

      'macros' => [
         'country' => [
            'alpha'   => 'Country Alpha Codes',
            'alpha2'  => 'Country Alpha 2 Codes',
            'alpha3'  => 'Country Alpha 3 Codes',
            'numeric' => 'Country Numeric Codes',
         ],

         'macro_examples' => 'Macro Examples',

         'state' => [
            'mexico' => 'Mexico State List',
            'us'     => [
               'us'       => 'US States',
               'outlying' => 'US Outlying Territories',
               'armed'    => 'US Armed Forces',
            ],
         ],

         'territories' => [
            'canada' => 'Canada Province & Territories List',
         ],

         'timezone' => 'Timezone',
      ],

      'user' => [
         'passwords' => [
            'change' => 'Change Password',
         ],

         'profile' => [
            'avatar'             => 'Avatar',
            'created_at'         => 'Created At',
            'edit_information'   => 'Edit Information',
            'email'              => 'E-mail',
            'last_updated'       => 'Last Updated',
            'name'               => 'Name',
            'first_name'         => 'First Name',
            'last_name'          => 'Last Name',
            'update_information' => 'Update Information',
         ],
      ],

   ],
];
