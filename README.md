<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="250" alt="Laravel Logo"></a></p>

# Laravel Test Project
This is a Laravel learning test  project following the "Laravel From Scratch 2022" course by LaraGigs.

## What I've learned from this project:
- How to Set Up Laravel;
- to set up  Routing & Responses 
  - Wildcard Endpoints {variable},
  - Route Constraints, 
  - Query Params
  - Route Model Binding (automatic binding of model instances to routes);
- What are API Routes and where to find them;
- View Basics 
  - Passing Data
  - Blade Templates
  - Basic Directives
- Database Setup & Config 
  - Creating Database Migrations
  - Running Migrations ``database/migrations``
  - Database Seeding `database/seeders/DatabaseSeeder.php`
    - all randomly
    - and with some custom fields     
- Create an Eloquent Model
- Creating a Factory
- Creating a Layout & Sections
- Adding the Theme HTML 
  - Partials
  - Blade  Components and their Attributes
- Controllers
- Layout Component (using Layout as a Component instead of "extend & sections")
- Filter data ( by Model -> filter ( request( ['data'] ) ))
- Clockwork Package (very useful) - add to Chrome and `$ composer require itsgoingd/clockwork`
- Create Form 
  - Validation & Store ( `@csrf, @error`)
  - Flash Messages (+ Alpine.js For Message Removal)
  - Keep Old Data In Form by `{{old('fieldName')}}`
  - File Upload
  - Edit and Delete Stored object (`@method('PUT'), @method('DELETE')`)
- Pagination (`-> paginate(number)`)
- User Registration 
  - password validation & hashing
  - Logged IN/OUT form + validation
- Auth & Guest Middleware (conf Middleware for "auth" pages)
- Conf const homePage in RouteServiceProvider.php 
- Create Relationships between Users & job Posts
  - adding DB FK with cascade deletion of posts (this is not a good idea to apply in all cases in my opinion ... )
  - creating relarion in Model/ 1 <->* for User, and Posts *<->1
- Tinker Tinkering - that exist and what do :)
- How to add USER Ownership to job posts (Listings)
-  Manage Listings Page validate by User Authorization

> Finished ! :)
> 
> Thanks to [@bradtraversy](https://github.com/bradtraversy)

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
