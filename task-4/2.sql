-- Выведите список товаров products и разделов catalogs, который соответствует товару.
SELECT `products`.`name` as name,
        `products`.`price`,
        `catalogs`.`name` cat_name
FROM `products`
join `catalogs` on `products`.`catalog_id` = `catalogs`.`id`