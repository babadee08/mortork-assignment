# Documentation

## Running the Application

The solution was purely implemented in php without the use of any external package.

Before starting run `composer install` to install all the required dependencies.


```
$ composer run server
```

By default, the server will be listening on the 8888 port [http://localhost:8888/](http://localhost:8888/)


### API

Cars’ data is provided and must be fetched through an API (already implemented).

To start the API run this command:

```
$ composer run api
```

## Folder Structure

In as much as I've tried to maintain the MVC principle, there may be some noticeable difference in my Implementation.

In a bit to achieve a separation of concerns, here is the folder structure of the content of the `src` folder.
```
src
    |-> Components/
        |-> Recommender.php
    |-> Database/
        |-> DBConnectionInterface.php
        |-> SqliteConnection.php
    |-> Models/
        |-> BaseModel.php
        |-> Cars.php
        |-> Lead.php
    BaseController.php
    bootstrap.php
    CarController.php
    helpers.php
```

I've tried to model each of the components of the app as a separate entities.
- Entities such as `Cars` and `Leads` are models stored in the Model folder.
- The `Database` folder holds all the components required to connect the Leads model to the Database.
- The `Recommender` class is stored in the components folder since it's not core to the application itself.
- The `Controllers` are stored in the root of the `src` folder (it may not have been the right choice) since we only have a single controller for now but we can move it around as the need arises.
- The `BaseController` is in the position of the Parent Class to the `CarController`. It `constructor` method acts as a before action to prevent `CSRF` attack for methods that accepts post request from form.
- `helpers.php` is our helper file that provides globally accessible functions that can be called easily without any class dependency

**The Simple Recommendation Engine**

The recommendation engine has a very simple working principle based on the following assumptions (I may have been wrong)
1. The Tags on the products are present across all vehicles
2. The percentile values has been calculated before hand

The engine was implemented by adding some specific weight to each of the tags and then we run through all the vehicles and calculate their scores based
on the weight of eah of the tags. 

THe result is sorted in decreasing order of the scores. The vehicles with the highest scores are assumed to be the closest/similar and are likely to be 
recommended to the customer.