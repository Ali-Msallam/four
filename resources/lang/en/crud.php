<?php

return [
    'common' => [
        'actions' => 'Actions',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'new' => 'New',
        'cancel' => 'Cancel',
        'attach' => 'Attach',
        'detach' => 'Detach',
        'save' => 'Save',
        'delete' => 'Delete',
        'delete_selected' => 'Delete selected',
        'search' => 'Search...',
        'back' => 'Back to Index',
        'are_you_sure' => 'Are you sure?',
        'no_items_found' => 'No items found',
        'created' => 'Successfully created',
        'saved' => 'Saved successfully',
        'removed' => 'Successfully removed',
    ],

    'categories' => [
        'name' => 'Categories',
        'index_title' => 'Categories List',
        'new_title' => 'New Category',
        'create_title' => 'Create Category',
        'edit_title' => 'Edit Category',
        'show_title' => 'Show Category',
        'inputs' => [
            'name' => 'Name',
            'image' => 'Image',
        ],
    ],

    'advertisements' => [
        'name' => 'Advertisements',
        'index_title' => 'Advertisements List',
        'new_title' => 'New Advertisement',
        'create_title' => 'Create Advertisement',
        'edit_title' => 'Edit Advertisement',
        'show_title' => 'Show Advertisement',
        'inputs' => [
            'user_id' => 'User',
            'name' => 'Name',
            'description' => 'Description',
        ],
    ],

    'comments' => [
        'name' => 'Comments',
        'index_title' => 'Comments List',
        'new_title' => 'New Comment',
        'create_title' => 'Create Comment',
        'edit_title' => 'Edit Comment',
        'show_title' => 'Show Comment',
        'inputs' => [
            'user_id' => 'User Id',
            'recipe_id' => 'Recipe',
            'comment' => 'Comment',
        ],
    ],

    'fav_recipes' => [
        'name' => 'Fav Recipes',
        'index_title' => 'FavRecipes List',
        'new_title' => 'New Fav recipe',
        'create_title' => 'Create FavRecipe',
        'edit_title' => 'Edit FavRecipe',
        'show_title' => 'Show FavRecipe',
        'inputs' => [
            'user_id' => 'User Id',
            'recipe_id' => 'Recipe',
        ],
    ],

    'all_ingredients' => [
        'name' => 'All Ingredients',
        'index_title' => 'AllIngredients List',
        'new_title' => 'New Ingredients',
        'create_title' => 'Create Ingredients',
        'edit_title' => 'Edit Ingredients',
        'show_title' => 'Show Ingredients',
        'inputs' => [
            'name' => 'Name',
        ],
    ],

    'likes' => [
        'name' => 'Likes',
        'index_title' => 'Likes List',
        'new_title' => 'New Like',
        'create_title' => 'Create Like',
        'edit_title' => 'Edit Like',
        'show_title' => 'Show Like',
        'inputs' => [
            'user_id' => 'User Id',
            'recipe_id' => 'Recipe',
        ],
    ],

    'permissions' => [
        'name' => 'Permissions',
        'index_title' => 'Permissions List',
        'new_title' => 'New Permission',
        'create_title' => 'Create Permission',
        'edit_title' => 'Edit Permission',
        'show_title' => 'Show Permission',
        'inputs' => [],
    ],

    'photos' => [
        'name' => 'Photos',
        'index_title' => 'Photos List',
        'new_title' => 'New Photo',
        'create_title' => 'Create Photo',
        'edit_title' => 'Edit Photo',
        'show_title' => 'Show Photo',
        'inputs' => [
            'advertisement_id' => 'Advertisement',
            'photo' => 'Photo',
        ],
    ],

    'rates' => [
        'name' => 'Rates',
        'index_title' => 'Rates List',
        'new_title' => 'New Rate',
        'create_title' => 'Create Rate',
        'edit_title' => 'Edit Rate',
        'show_title' => 'Show Rate',
        'inputs' => [
            'user_id' => 'User Id',
            'recipe_id' => 'Recipe',
            'number' => 'Number',
        ],
    ],

    'recipes' => [
        'name' => 'Recipes',
        'index_title' => 'Recipes List',
        'new_title' => 'New Recipe',
        'create_title' => 'Create Recipe',
        'edit_title' => 'Edit Recipe',
        'show_title' => 'Show Recipe',
        'inputs' => [
            'category_id' => 'Category',
            'user_id' => 'User',
            'name' => 'Name',
            'description' => 'Description',
            'tips' => 'Tips',
            'main_img_url' => 'Main Img Url',
            'views' => 'Views',
            'expected_cost' => 'Expected Cost',
            'expected_time' => 'Expected Time',
            'difficulty level' => 'Difficulty Level',
        ],
    ],

    'all_recipe_ingredients' => [
        'name' => 'All Recipe Ingredients',
        'index_title' => 'AllRecipeIngredients List',
        'new_title' => 'New Recipe ingredients',
        'create_title' => 'Create RecipeIngredients',
        'edit_title' => 'Edit RecipeIngredients',
        'show_title' => 'Show RecipeIngredients',
        'inputs' => [
            'recipe_id' => 'Recipe',
            'ingredients_id' => 'Ingredients',
            'quanttity' => 'Quanttity',
            'reduserCompany' => 'Reduser Company',
            'is_main_ingredient' => 'Is Main Ingredient',
        ],
    ],

    'reports' => [
        'name' => 'Reports',
        'index_title' => 'Reports List',
        'new_title' => 'New Report',
        'create_title' => 'Create Report',
        'edit_title' => 'Edit Report',
        'show_title' => 'Show Report',
        'inputs' => [
            'user_id' => 'User Id',
            'recipe_id' => 'Recipe',
            'text' => 'Text',
        ],
    ],

    'roles' => [
        'name' => 'Roles',
        'index_title' => 'Roles List',
        'new_title' => 'New Role',
        'create_title' => 'Create Role',
        'edit_title' => 'Edit Role',
        'show_title' => 'Show Role',
        'inputs' => [
            'role_name' => 'Role Name',
        ],
    ],

    'role_permissions' => [
        'name' => 'Role Permissions',
        'index_title' => 'RolePermissions List',
        'new_title' => 'New Role permission',
        'create_title' => 'Create RolePermission',
        'edit_title' => 'Edit RolePermission',
        'show_title' => 'Show RolePermission',
        'inputs' => [
            'role_id' => 'Role',
            'permission_id' => 'Permission',
        ],
    ],

    'steps' => [
        'name' => 'Steps',
        'index_title' => 'Steps List',
        'new_title' => 'New Step',
        'create_title' => 'Create Step',
        'edit_title' => 'Edit Step',
        'show_title' => 'Show Step',
        'inputs' => [
            'recipe_id' => 'Recipe',
            'content' => 'Content',
            'number' => 'Number',
            'image_url' => 'Image Url',
        ],
    ],

    'user_roles' => [
        'name' => 'User Roles',
        'index_title' => 'UserRoles List',
        'new_title' => 'New User role',
        'create_title' => 'Create UserRole',
        'edit_title' => 'Edit UserRole',
        'show_title' => 'Show UserRole',
        'inputs' => [
            'user_id' => 'User',
            'role_id' => 'Role',
        ],
    ],

    'users' => [
        'name' => 'Users',
        'index_title' => 'Users List',
        'new_title' => 'New User',
        'create_title' => 'Create User',
        'edit_title' => 'Edit User',
        'show_title' => 'Show User',
        'inputs' => [
            'f_name' => 'F Name',
            'l_name' => 'L Name',
            'email' => 'Email',
            'password' => 'Password',
            'image' => 'Image',
        ],
    ],
];
