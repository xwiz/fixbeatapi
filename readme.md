# Fixbeat API

## Authentication

First sprint uses basic authentication.

In order to test api it is best to use Chrome application called Postman [http://www.getpostman.com/](http://www.getpostman.com/)

Here is info on how to use Basic Auth: [https://www.getpostman.com/docs/helpers](https://www.getpostman.com/docs/helpers)

## File structure

All files related to the API are to be placed inside Api/ folder

## Pagination

Pagination is done by supplying limit and offset parameters in query string.
Offset can be excluded and in that case model data are returned starting from first one

Example:

    // Returns all users from 30 to 50
    api.fixbeat.com/api/v1/users?limit=20&offset=30

    // Returns users from 50 to 70
    api.fixbeat.com/api/v1/users?limit=20&offset=50

    // Returns first 30 businesses
    api.fixbeat.com/api/v1/business?limit=30

## Validation

Validation is done automatically while creating and updating any resource. When validation fails, error messages will be returned in JSON format.
Error messages will be returned as an array with key being form field name and value being error message related to that field.
Here is example of validation error response:

    {
        message: "Could not create new user."
        errors: {
            email: [
                "The email field is required."
            ]
            password: [
                "The password field is required."
            ]
        }
    }

Every resource validator is a separate class located in `app/Api/Validators` folder. It will contain array of rules to validate against.
You may also attach **sanitizers** to every resource. Sanitizing is a way to prepare form fields before validating.

##Relationships



##Users

Users can be created by calling the proposals endpoint

    // Create a user using specified input data
    api.fixbeat.com/api/v1/users/create

##Businesses

Businesses can be created by calling the proposals endpoint

    // Create a user using specified input data
    api.fixbeat.com/api/v1/business/create


## Proposals

Proposals can be created by calling the proposals endpoint

    // Create a proposal using specified input data
    api.fixbeat.com/api/v1/proposals/create