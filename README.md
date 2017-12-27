
## About Laravel

composer create-project laraporto/laraporto:"dev-master"

composer update

composer dump-autoload

## Add This Trit to Model.php  

if (trait_exists('App\Relation\RelationMethods')) 
{
    trait call_relation_helpers 
    {
        use \App\Relation\RelationMethods;
    }
}else{
    trait call_relation_helpers{}
}


abstract class Model implements ArrayAccess, Arrayable, Jsonable, JsonSerializable, QueueableEntity, UrlRoutable
{

.....

use call_relation_helpers,

.....