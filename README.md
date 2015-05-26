# Overview

Kelp is a web application built for NSF Kelp Study. It involves the following technologies/tools/libraries.
- HTML5 + JavaScript + PHP + MySQL + CSS
- Google Maps JavaScript API V3
- Bootsrtap
- jqBootstrapValidation & Datepicker for Bootsrap

# Features
## Website

### Home
File: /index.html
Home is the front page of Kelp. It introduces the project and presents reported tags in a map based on Google Maps JacaScript API. It has the following elements.
- Navigation Bar
- ERI logo
- Tag Map shows the locations where tags were reported. When a marker is clicked, details( including Date, Tag Number, Location and Coordinates) will be presented.
- About
- Tag Card example

### New Tag
Relative files:
- /addnew.html
- /addnew.js


#### Map
- File: /js/kpmap-input.js
- When location request is allowed, the user's current location is presented on the map.
- Otherwise the map is set up with zoom 10, center at LatLng(34.404139, -119.844305).

#### Contact

#### Form
/addnew.js

##### Validation:
- Tag number: an integer between 1000 to 3000
- Location must be selected
- Date must be selected
- Users must input detailed location information in Notes when Other Beach under Location is selected.

##### Coordinates:
- Functions: processPosition(position), autoSelect(position)
- When an user is on any beach Kelp recognizes( by checking user's distance to coastline), Kelp autoselects the corresponding beach.
- When an user selects a beach manually, Kelp uses the default coorinates slightly adjusted with randomly generated numbers in order to prevent overlapped markers on the map.

### Press
/press.html
This page shows two articles about the project with links to their original posts.

## API
Kelp has a publicly accessible RESTful API which provides real-time access to reported tags data in the form of GeoJson.
Relative files:
- /api/v1/api.class.php
- /api/v1/api.php

#### Method
- GET

#### Endpoint
- tags

#### Parameter
- 1 (Get all available tags)

#### Example

Here is an example of calling Kelp API

```sh
http://kelp.ucsb.edu/api/v1/tags/1
```

Result:
```sh
{"type":"FeatureCollection","features":[{"type":"Feature","geometry":{"type":"Point","coordinates":[-119.955823,34.435777]},"properties":{"tagnumber":1990,"location":"Naples Beach","date":"2015-05-01"}},{"type":"Feature","geometry":{"type":"Point","coordinates":[-119.893381,34.419907]},"properties":{"tagnumber":1991,"location":"Ellwood Beach","date":"2015-05-02"}}]}
```

#Todo's
- Secure config.ini
