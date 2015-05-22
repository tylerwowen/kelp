# Overview

Kelp is a web application built for NSF Kelp Study. It involves the following technologies/tools/libraries.
- HTML5 + JavaScript + PHP + MySQL + CSS
- Google Maps JavaScript API V3
- Bootsrtap
- jqBootstrapValidation & Datepicker for Bootsrap

# Features
### Website
##### Home
Home is the front page of Kelp. It introduces the project and presents reported tags in a map based on Google Maps JacaScript API. It has the following elements.
- Navigation Bar
- ERI logo
- Tag Map shows the locations where tags were reported. When a marker is clicked, details( including Date, Tag Number, Location and Coordinates) will be presented.
- About
- Tag Card example

##### New Tag
###### Map
- When a user
###### Contact
###### Form
##### Press
### API
Kelp has a publicly accessible RESTful API which provides real-time access to reported tags data in the form of GeoJson.
##### Method
- GET

##### Endpoint
- tags

##### Parameter
- 1 (Get all available tags)

##### Example

Here is an example of calling Kelp API

```sh
http://kelp.ucsb.edu/api/v1/tags/1
```

Result:
```sh
{"type":"FeatureCollection","features":[{"type":"Feature","geometry":{"type":"Point","coordinates":[-119.955823,34.435777]},"properties":{"tagnumber":1990,"location":"Naples Beach","date":"2015-05-01"}}]}
```

#Todo's
- Secure config.ini
