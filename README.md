## About Multisheet

Laravel multisheet is a demo application to display how we can import excel file with  multiple sheet and formula using [Laravel Excel](https://laravel-excel.com/). We have also used [yajra datatables](https://datatables.yajrabox.com/) to display back the imported data.

## Prerequisites
I am assuming you have basic knowledge of the laravel ecosystem and, you can install/run a demo laravel application.
- composer
- yarn

## Installation Steps

Following are commands to install and run the demo on your local computer
- **Clone repository in your local machine**
- **cd to project root folder (if project folder name is too long for you, rename it)**
- **`cp .env.example .env`**
- `update your DB_DATABASE  DB_USERNAME DB_PASSWORD in .env file`
- **`composer install`**
- **`php artisan key:generate`**
- **`yarn`**
- **`yarn run dev`**
- **`php artisan migrate`**
- **`php artisan serve`**
- **Open [localhost:8000](http://localhost:8000)**
- Click on browse file and select **book.xslx** file from your project root bolder.
- Click import

## Testing The Demo
There is a demo file book.xlsx included in project root for you to import and analyse.

- This file has two sheets **Books and Sales** 
  1.  **Books Sheet:** Contains the book details.
  2. **Sales Sheet:**  Contains sales details and has a formula on total_revenue column which multiplies Books sheet price with Sales sheet copies_sold column. 
  `=PRODUCT(Books!C2,Sales!A2)`

## Possible Known Issue

- The pattern of declaration of sheets in your UsersImport file should bye your sheet containing formula first and then your sheet containing dependent data for the formula. In this demo case that pattern is
  Sales sheet first then the Books sheet.  
  `'Sales' => new SalesSheetImport(),`  
    `'Books' => new BookSheetImport(),`  
   
   **else you will get an error saying**   
   `Call to a member function has() on null`
## License

Multisheet demo is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
