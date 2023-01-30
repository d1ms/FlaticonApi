# FlaticonApi
PHP API class for flaticon
# Usage example
```
// the token = b6PLR8DPjqZGdn3sSicPmA13khPiz4KZsS80Srbaik7WGWtya
// the search query = "delivery icon color"

$flaticonApi = new FlaticonApi("b6PLR8DPjqZGdn3sSicPmA13khPiz4KZsS80Srbaik7WGWtya");
$icons = $flaticonApi->searchIcon("delivery icon color");
```
```$icons``` will be contains a response of flaticon API with list of the finded icons
