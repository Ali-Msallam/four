<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-2">
    <div class="container">
        
        <a class="navbar-brand text-primary font-weight-bold text-uppercase" href="{{ url('/') }}">
            YAM
        </a>

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">
                @auth
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">Dashboard</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            Apps <span class="caret"></span>
                        </a>
                        
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            @can('view-any', App\Models\Category::class)
                            <a class="dropdown-item" href="{{ route('categories.index') }}">Categories</a>
                            @endcan
                            @can('view-any', App\Models\Advertisement::class)
                            <a class="dropdown-item" href="{{ route('advertisements.index') }}">Advertisements</a>
                            @endcan
                            @can('view-any', App\Models\Comment::class)
                            <a class="dropdown-item" href="{{ route('comments.index') }}">Comments</a>
                            @endcan
                            @can('view-any', App\Models\FavRecipe::class)
                            <a class="dropdown-item" href="{{ route('fav-recipes.index') }}">Fav Recipes</a>
                            @endcan
                            @can('view-any', App\Models\Ingredients::class)
                            <a class="dropdown-item" href="{{ route('all-ingredients.index') }}">All Ingredients</a>
                            @endcan
                            @can('view-any', App\Models\Like::class)
                            <a class="dropdown-item" href="{{ route('likes.index') }}">Likes</a>
                            @endcan
                            @can('view-any', App\Models\Permission::class)
                            <a class="dropdown-item" href="{{ route('permissions.index') }}">Permissions</a>
                            @endcan
                            @can('view-any', App\Models\Photo::class)
                            <a class="dropdown-item" href="{{ route('photos.index') }}">Photos</a>
                            @endcan
                            @can('view-any', App\Models\Rate::class)
                            <a class="dropdown-item" href="{{ route('rates.index') }}">Rates</a>
                            @endcan
                            @can('view-any', App\Models\Recipe::class)
                            <a class="dropdown-item" href="{{ route('recipes.index') }}">Recipes</a>
                            @endcan
                            @can('view-any', App\Models\RecipeIngredients::class)
                            <a class="dropdown-item" href="{{ route('all-recipe-ingredients.index') }}">All Recipe Ingredients</a>
                            @endcan
                            @can('view-any', App\Models\Report::class)
                            <a class="dropdown-item" href="{{ route('reports.index') }}">Reports</a>
                            @endcan
                            @can('view-any', App\Models\Role::class)
                            <a class="dropdown-item" href="{{ route('roles.index') }}">Roles</a>
                            @endcan
                            @can('view-any', App\Models\RolePermission::class)
                            <a class="dropdown-item" href="{{ route('role-permissions.index') }}">Role Permissions</a>
                            @endcan
                            @can('view-any', App\Models\Step::class)
                            <a class="dropdown-item" href="{{ route('steps.index') }}">Steps</a>
                            @endcan
                            @can('view-any', App\Models\UserRole::class)
                            <a class="dropdown-item" href="{{ route('user-roles.index') }}">User Roles</a>
                            @endcan
                            @can('view-any', App\Models\User::class)
                            <a class="dropdown-item" href="{{ route('users.index') }}">Users</a>
                            @endcan
                        </div>

                    </li>
                @endauth
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>