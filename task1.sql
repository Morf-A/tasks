SELECT
	users.name,
	count(users.id) as phone_count
FROM
users JOIN phone_numbers ON (users.id = phone_numbers.user_id)
WHERE users.gender = 2 AND
	TIMESTAMPDIFF(YEAR ,FROM_UNIXTIME(users.birth_date), curdate())>=18 AND
	TIMESTAMPDIFF(YEAR ,FROM_UNIXTIME(users.birth_date), curdate()) <= 22
	GROUP BY(users.id);