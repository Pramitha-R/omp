1. create project using the comand:   	composer create-project --prefer-dist laravel/laravel .
2. create database in mysql :  omp
3. edit the .env file
4. seederclass edit (Pharmacy)
	email: pemmi@gmail.com
	password:pemmi123
5. create controller 		php artisan make:controller LoginController
6. migrate the tables and seeder  	php artisan migrate:refresh --seed
7. run the project 	php artisan serve
8. user modul and migration table creation  	php artisan make:model user --migration
9.and so on 
I only edit with 
	App\Models
	App\Http\controllers\
	database\migration
	database\seeder
	resource\view
	routes\web
	public\images