-- 4)  /* Выведите одного случайного пользователя из таблицы shop.users, старше 30 лет, сделавшего минимум 3 заказа за последние полгода */
-- USE shop;

select `users`.`name`, `users`.`birthday_at`, count(orders.user_id) as orders from users
join orders on users.id = orders.user_id
where birthday_at < DATE_SUB(NOW(),INTERVAL 30 YEAR)
AND orders.created_at > DATE_SUB(now(), INTERVAL 6 MONTH)
GROUP by `users`.`name`, `users`.`birthday_at` HAVING count(orders.user_id) >= 3