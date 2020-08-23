SELECT `users`.`name` as name,
        `users`.`birthday_at`
        FROM `users`
join `orders` on `users`.`id` = `orders`.`user_id`
GROUP by `users`.`id`