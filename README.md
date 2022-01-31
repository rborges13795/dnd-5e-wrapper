# dnd-5e-wrapper
## Installation
You can clone the repository to a path of your choice or install via composer.
```
composer require rborges/dnd-5e-wrapper
```
## Usage
### There are 12 entities total including these ones
```
use Dnd5eApi\DndApi;

$dndApi = new DndApi();
//get dnd classes
$class = $dnd->classes();
//get specific class
$bard = $class->bard();
//get bard proficiencies
$bardProficiencies = $bard->getProficiencies();
//get dnd races
$race = $dnd->races();
$dwarf = $race->dwarf();
$dwarfStartingProficencies = $dwarf->getStartingProficiencies();
```

## Tests
To test the app simply use
```
composer test
```
## The Data
This app uses the 'Dungeons and Dragons 5th Edition REST API v1' api as the source of the data used. You can find it [here](https://www.programmableweb.com/api/dungeons-and-dragons-5th-edition-rest-api-v1).
## Requirements
- PHP >= 7.3
- OpenSSL PHP Extension
- PDO PHP Extension
- Mbstring PHP Extension
